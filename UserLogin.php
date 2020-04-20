<!doctype html>
<html>
  <?php
	include_once "DB/connect.php";
	?>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Styles/login.css">
<title>User Login</title>
</head>

<body>
  <div class="container">
  <div class="logo">
    <center>  <img src="Pictures/LOGO.png" alt="logo" Style=" margin-top: 30px;"></center>
  </div>

	<h1>Welcome to Cataclysm!</h1>
	<main>
	<section class="login_container flexcol">

      <?php
        function redirect($url, $statusCode = 303)
        {
          
           header('Location: ' . $url, true, $statusCode);
           die();
        }
        

        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):
          if($_SESSION['Role']=="Admin"){
          redirect('index2Master.php', false);
        }
          elseif(($_SESSION['Role']=="User")){
          redirect('index2.php', false);
          }
          else{
          redirect('logout.php', false);
          }

      ?>
      <?php
          elseif(!empty($_POST['username']) && !empty($_POST['pass'])):
            include_once 'User/AccountControl.php';
            $user = new User($db);
            if($user->accountLogin()===TRUE):
              echo "<meta http-equiv='refresh' content='0;/'>";
              exit;
            else:
      ?>

      <h1 class="fail">Incorrect username or password</h1>

      <form method="post" action="UserLogin.php" name="loginform" id="loginform">
        <div class="loginForm">
          <input id="loginUname" class="flexrow user_fail" type="text"  name="username" required="required" placeholder="Username">
        </div>
        <div class="loginForm">
          <input id="loginPass" class="flexrow pass_fail" type="password"  name="pass" required="required" placeholder="Password">
        </div>
        <div id="Btns" class="flexrow button_center">
          <a href="register.php"><button type="button" class="signup" required="">Sign Up</button></a>
          <input class="login" type="submit" value="Login"></a>
        </div>
      </form>
        <a href="ForgotPassword.php" class="link"><p>Forgot password?</p></a>
      <?php
      
          endif;
        else:
      ?>

      <form method="post" action="UserLogin.php" name="loginform" id="loginform">
        <div class="loginForm">
          <input id="loginUname" class="flexrow  user" type="text"  name="username" required="required" placeholder="Username">
        </div>
        <div class="loginForm">
          <input id="loginPass" class="flexrow  pass" type="password"  name="pass" required="required" placeholder="Password">
        </div>
        <div  id="Btns" class="flexrow button_center">
          <a href="register.php"><button type="button" class="signup" required="">Sign Up</button></a>
          <input class="login" type="submit" value="Login"></a>
        </div>

        <a href="ForgotPassword.php" class="link"><p>Forgot password?</p></a>
      </form>
      <?php
        endif;
      ?>
    </section>
	</main>
</div>
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<script src="js/jquery.cycle2.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
