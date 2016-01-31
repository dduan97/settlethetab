
<body>
  <!--<script src="js/scripts.js"></script>-->

  <div class="container center" id="register-form">
  <form action="/public/process_owemoney.php" method="post">
    <label for="email">person to pay</label>
    <input type="text" id="owed" name="username">
    <br>
    <label for="username">amount owed</label>
    <input type="text" id="amt" name="amt" value="00.00">
    <br>
    <label for="password">Event</label>
    <input type="text" id="note" name="note" value="description">
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>