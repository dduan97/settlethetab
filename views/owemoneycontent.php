<script type="text/javascript">
    function iOwe(){
        var whoOwes = document.getElementById("whoOwes");
        document.getElementById("type_iowesomeone").innerHTML = "User I owe &nbsp;";
        whoOwes.setAttribute("value", "me");
        var iOweButton = document.getElementById("owesomeone");
        iOweButton.setAttribute("class", "red2 button2");
        var theyOweButton = document.getElementById("owesme");
        theyOweButton.setAttribute("class", "green button2");
        var col = document.getElementById("register-form");
        col.setAttribute("class", "container center rcolor")
    }
    function theyOwe(){
        var whoOwes = document.getElementById("whoOwes");
        document.getElementById("type_iowesomeone").innerHTML = "User who owes me &nbsp; &nbsp;";
        whoOwes.setAttribute("value", "them");
        var theyOweButton = document.getElementById("owesme");
        theyOweButton.setAttribute("class", "green2 button2");
        var iOweButton = document.getElementById("owesomeone");
        iOweButton.setAttribute("class", "red button2");
        var col = document.getElementById("register-form");
        col.setAttribute("class", "container center gcolor")
    }
</script>


<body>
    
<div class="bodywrap">
<div class="container center">

<form action="/public/process_owemoney.php" method="post">
    <button id="owesme" type="button" class="green button2" onClick="theyOwe()">Request money from user</button>
    <button id="owesomeone" type="button" class="red2 button2" onClick="iOwe()">Anti-request money from user</button>
  <div class="container center rcolor" id="register-form">
    <input type="text" id="whoOwes" name="whoOwes" value="me" style="display: none">
    <label for="owed" id="type_iowesomeone"class="form-group">User I owe &nbsp;</label>
    <input type="text" id="owed" name="username">
    <br>
    <label for="amount">Amount Owed &nbsp; $</label>
    <?php if(empty($amount))
    {
        print("<input type='text' id='amt' name='amt' placeholder='00.00'>");
    } else
    {
        print("<input type='text' id='amt' name='amt' value={$amount}>");
    }
    ?>
    <br>
    <label for="event">Event &nbsp;</label>
    <input type="text" id="note" name="note" placeholder="Description">
    <br>
    <input type="submit" value="Submit">
</div>
</form>

</div>
</div>

</body>
</html>
 