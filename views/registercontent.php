
<body>
  <!--<script src="js/scripts.js"></script>-->

  <div class="container center" id="register-form">
      <?php if(isset($_GET["error"])){
              switch($_GET["error"]){
                case "validemail":
                  echo("<p>Please enter a valid email address!</p>");
                  break;
                case "email":
                  echo("<p>A user with that email already exists!</p>");
                  break;
                case "username":
                  echo("<p>A user with that username already exists!</p>");
                  break;
                case "donegoofed62":
                  echo("<p>Someone done goofed with the database! (line 62)");
                  break;
                case "donegoofed69":
                  echo("<p>Someone done goofed with the database! (line 69)");
                  break;
                case "donegoofed81":
                  echo("<p>Someone done goofed with the database! (line 81)");
                  break;
              }
      }?>
  <form action="/public/process_register.php" method="post">
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <br>
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