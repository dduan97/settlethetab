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
  <form action="action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname">
    <br>
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname">
    <br>
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <br>
    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>