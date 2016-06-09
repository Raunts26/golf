<?php
  $page_file = "admin.php";
  require_once("../inc/functions.php");

  if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $hash = hash("sha512", $password);

    $login = $User->logInUser($user, $hash);
  }

 ?>
 <html lang="en"><head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Logi sisse</title>

     <link rel="stylesheet" href="../css/admin.css">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->

 </head>
 <body>

 <div id="container">
   <div id="modal">

     <div id="logo">
       <img src="../images/TallEst_logo.png" class="img-resp">
     </div>

     <form method="post" action="index.php" class="login-panel" autocomplete="off">
       <div class="form-group inner-addon left-addon to-login">
         <i class="glyphicon glyphicon-user"></i>
         <input class="login" type="text" name="user" placeholder="Kasutajanimi">
       </div>

       <div class="form-group inner-addon left-addon to-login">
         <i class="glyphicon glyphicon-lock"></i>
         <input class="login" type="password" name="password" placeholder="Parool">
       </div>

       <!--<div class="form-group">
         <button type="button" name="register" class="btn login-btn btn-sm">
           <span class="glyphicon glyphicon-list-alt"></span> Registreeru
         </button>-->

         <button type="submit" name="login" class="btn login-btn btn-sm">
           <span class="glyphicon glyphicon-log-in"></span> Logi sisse
         </button>
       </div>


     </form>

   </div>
 </div>




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

 </body>
 </html>
