<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Settle the Tab</title>
  <link rel="shortcut icon" href="images/SettletheTabIcon1.png" alt="Settle the Tab">
  <meta name="description" content="Settle the Tab">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--<script src="js/scripts.js"></script>-->
  <div id="header">
    <a href="/dashboard.php"><img src="/images/SettletheTabLogo1.png" alt="Settle the Tab"></a>
    <a href="/logout.php" id="tab"><img class="tab" src="/images/tab1.png" alt="Logout"></a>
    <?php if (!empty($_SESSION["id"]))
        {
         echo "<h2 id='welcome'>Welcome, "; echo($_SESSION["username"]); echo "!</h2>";
        }
    ?>
  </div>
  <div class="border"></div>
</head>

