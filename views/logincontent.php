
<body>
  <!--<script src="js/scripts.js"></script>-->

  <div class="container center" id="register-form">
    <?php if(isset($_GET["error"])){
      echo("<p>Error logging in!</p>");
      }?>
  <form action="/public/process_login.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>