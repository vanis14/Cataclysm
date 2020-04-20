<?php
  include_once "DB/connect.php";
?>
<head>
<title>Forgot Password</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Styles/forgot.css">
</head>
<body>
    <div class="container">
      <div class="logo">
          <img src="Pictures/LOGO.png" alt="logo">
      </div>
      <div class="divform">
        <div id="passwd">
<?php
    if((!empty($_POST['name'])) && (!empty($_POST['email']))):
        include_once "User/AccountControl.php";
        $user = new User($db);
        echo $user->forgotPassword();
    else:
?>
</div>
        <form id="forgotPassForm" method="post" action="ForgotPassword.php">
          <div class="row">
            <div class="col">
              <input class="forgot" type="text" name="name" id="name" required="required" placeholder="Enter your username..">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <input class="forgot" name="email" id="email" type="text" required="required" placeholder="Enter your e-mail..">
            </div>
          </div>
          <div class="row">

              <input id="forgotBtn" type="submit" value="Submit" onclick="show(document.getElementById('passwd'))">

            <script type="text/javascript">
              var show = function(elem) {
                elem.style.display = 'block';
              };

              var hide = function(elem) {
                elem.style.display = 'none';
              };

              window.onload(hide(document.getElementById('passwd')));
            </script>
          </div>
        </form>
<?php
    endif;
?>
        <span id="sucessMessage"> </span>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  	<script src="js/jquery.cycle2.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
