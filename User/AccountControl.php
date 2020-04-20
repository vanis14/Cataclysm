<?php
	class User
	{
		private $_db;
		
		public function __construct($db=NULL)
		{
			if(is_object($db))
			{
				$this->_db = $db;
			}
			else
			{
				$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            	$this->_db = new PDO($dsn, DB_USER, DB_PASS);
			}
		}

		/*
		constructor
		-------------
		methods
		*/
		public function accountLogin()
    	{
        	$sql = "SELECT Username,Role as theRole
            	    FROM user
                	WHERE Username=:user
                	AND Password=:pass
                    LIMIT 1";

            $username = trim($_POST['username']);
            $pass = trim($_POST['pass']);
                       
            
        	try
        	{
            	$stmt = $this->_db->prepare($sql);
            	$stmt->bindParam(':user', $username, PDO::PARAM_STR);
                $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetch();
            	if($stmt->rowCount()==1)
            	{
               		$_SESSION['Username'] = htmlentities($_POST['username'], ENT_QUOTES);
               		$_SESSION['Role'] = $row['theRole'];
                    $_SESSION['LoggedIn'] = 1;
                	return TRUE;
            	}
            	else
            	{
                	return FALSE;
            	}
        	}
        	catch(PDOException $e)
        	{
                echo $e->getMessage();
            	return FALSE;
        	}
    	}
        /*
        -------------
        */
        public function createAccount()
        {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $cpass = trim($_POST['cpass']);
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $phone = trim($_POST['phone']);
            $nid = trim($_POST['nid']);
            $add = trim($_POST['add']);
            $sanswer = trim($_POST['sanswer']);


            $sql = "SELECT COUNT(Username) AS theCount
                    FROM user
                    WHERE Username=:username
                    and Email=:email
                    and Password=:pass";
            try
            {
                if($stmt = $this->_db->prepare($sql))
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
                    $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
                    $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
                    $stmt->bindParam(":phone", $phone, PDO::PARAM_INT);
                    $stmt->bindParam(":nid", $nid, PDO::PARAM_INT);
                    $stmt->bindParam(":add", $add, PDO::PARAM_STR);
                    $stmt->bindParam(":sanswer", $sanswer, PDO::PARAM_STR);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    if($row['theCount']!=0)
                    {
                        return "<h2> Error </h2>"
                            . "<p> Sorry, those credentials are already in use. "
                            . "Please try again. </p>";
                    }
                    $stmt->closeCursor();
                }
 
                if($pass===$cpass){
                $sql = "INSERT INTO user(Username, Fname,Lname,Email,Phone,NationalID,Address, Password,SecurityAnswer)
                        VALUES(:username,:fname,:lname, :email, :phone, :nid, :add, :pass, :sanswer)";
                if($stmt = $this->_db->prepare($sql)) 
                {
                    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
                    $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
                    $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
                    $stmt->bindParam(":phone", $phone, PDO::PARAM_INT);
                    $stmt->bindParam(":nid", $nid, PDO::PARAM_INT);
                    $stmt->bindParam(":add", $add, PDO::PARAM_STR);
                    $stmt->bindParam(":sanswer", $sanswer, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt->closeCursor();
                    
                    return "<h2 style='color:white'> Success! </h2>"
                            . "<p style='color:white'> Your account was successfully "
                            . "created with the username <strong>$username</strong></p>"
                            .header( "refresh:5; url=userlogin.php" );
                }
                else
                {
                    return "<h2> Error </h2><p> Couldn't insert the "
                        . "user information into the database. </p>";
                }
            }else{
                return "<p> Confirm password did not match. </p>";
            }
        }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }
        /*
        -------------
        */
        public function forgotPassword()
        {
            $username = trim($_POST['name']);
            $email = trim($_POST['email']);

             $sql = "SELECT Password AS theCount
                    FROM user
                    WHERE Username=:username
                    and Email=:email";

            if($stmt = $this->_db->prepare($sql))
            {
                $stmt->bindParam(":username", $username, PDO::PARAM_STR);   
                $stmt->bindParam(":email", $email, PDO::PARAM_STR);

                $stmt->execute();
                $row = $stmt->fetch();
                $stmt->closeCursor();
                if($row['theCount']!=NULL)
                {
                    return "<p style='color:white'>".$row['theCount']."</p>".header( "refresh:5; url=userlogin.php" );
                }
                else
                {
                    return "<p>Couldn't find your account, try again.</p>";
                }
            }

        }
	}
