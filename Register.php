<!doctype html>
<html>
	<?php
	include_once "DB/connect.php";
	?>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Styles/signup.css">
<title>Account Registration</title>
</head>

<body>
	<?php
    if((!empty($_POST['username'])) && (!empty($_POST['pass'])) && (!empty($_POST['cpass'])) && (!empty($_POST['email']))):
        include_once "user/AccountControl.php";
        $user = new User($db);
        echo $user->createAccount();
    else:
?>
<div class="row">
<div class="container">
	<div class="logo">
		<img src="Pictures/LOGO.png" alt="logo" Style="margin-top:20px; margin-bottom:20px;">
	</div>
    <form method="post" action="register.php">
		<div class="row">
            <div class="col">
                <input type="text" class="regis" id="username"  required="required" name="username" placeholder="Enter your Username">
            </div>
        </div>
		<div class="row">
            <div class="col">
                <input type="text" class="regis" id="email"  required="required" name="email" placeholder="Enter your Email">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="password" class="regis" id="pass" required="required" name="pass" placeholder="Enter your password">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="password" class="regis" id="cpass" required="required" name="cpass" placeholder="Confirm your password">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="regis" id="fname" required="required" name="fname" placeholder="Enter your First name">
            </div>
        </div>
		<div class="row">
            <div class="col">
                <input type="text" class="regis" id="lname" required="required" name="lname" placeholder="Enter your Last name">
            </div>
        </div><div class="row">
            <div class="col">
                <input type="text" class="regis" id="phone" required="required" name="phone" placeholder="Enter your Phone number">
            </div>
        </div>
		<div class="row">
            <div class="col">
                <input type="text" class="regis" id="nid" required="required" name="nid" placeholder="Enter your National Id number">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="regis" id="add" required="required" name="add" placeholder="Enter your Address">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <select required id="squestion" name="squestion">
                    <option value="The city you was born">The city you were born</option>
                    <option value="The name of your first pet">The name of your first pet</option>
                    <option value="First name of your mother">The first name of your mother</option>
                    <option value="Your favourite artist">Your favourite artist</option>
                </select>
            </div>
        </div>
		<div class="row">
            <div class="col">
                <input type="text" class="regis" id="sanswer" required="required" name="sanswer" placeholder="Enter your security answer">
            </div>
        </div>
        <div class="register">
            <div class="row1">
                <input id="regBtn" type="submit" value="Register">
            </div>
        </div>
    </form>
<?php
    endif;
?>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<script src="js/jquery.cycle2.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
