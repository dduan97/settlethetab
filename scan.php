<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Scan Receipt | Settle the Tab</title>
  <link rel="shortcut icon" href="SettletheTabIcon.png">
  <meta name="description" content="Settle the Tab">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>
  <!--<script src="js/scripts.js"></script>-->
  <div id="header"><a href="index.php"><img src="SettletheTabLogo.png"></a></div>
  <div class="border"></div>

  <div class="block">

  <h2>SCAN A RECEIPT</h2>
  <br>
  <form action="http://api.ocrapiservice.com/1.0/rest/ocr" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
        Choose a file to upload:
        <br><br>
        <input name="image" id="choosefile" type="file" />
        <br><br>
      <input type="hidden" name="language" value="en" />
      <input type="hidden" name="apikey" value="PcykqFnVrW" />

      <input type="submit" value="Upload File" />
  </form> 
  </div>

</body>
</html>