<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Register | Settle the Tab</title>
  <meta name="description" content="Register for Settle the Tab">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>
  <!--<script src="js/scripts.js"></script>-->
  <div id="header"><h1>Settle the Tab</h1></div>
  <div class="border"></div>

  <div class="container center" id="register-form">
  <form action="/public/process_register.php" method="post">
    <label for="fname">Email</label>
    <input type="text" id="fname" name="email">
    <br>
    <label for="lname">Username</label>
    <input type="text" id="lname" name="username">
    <br>
    <label for="email">Password</label>
    <input type="password" id="email" name="password">
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>