
<script>
    function calculateBills(arg){
        var final = 0;

        var bill = Number(document.getElementById("bill").value);
        var people = Number(document.getElementById("people").value);
        var tip = Number(document.getElementById("tip").value);
        var perPerson = bill * (1 + (tip / 100)) / people;
        final = Math.floor(perPerson * 100) / 100;
        document.getElementById("perPerson").innerHTML = final;
        if(arg == 1){
            var button = document.getElementById("chargePeople");
            button.setAttribute("style", "display: block");
        }
        else{
            var javascriptVariable = final;
            window.location.href = "/public/process_owemoney.php?amount=" + javascriptVariable; 
        }
    }
    
    function charge(final) { 
          var javascriptVariable = final;
          alert(final);
          window.location.href = "/public/process_owemoney.php?amount=" + javascriptVariable; 
        }
</script>

<body>
    
    <div class="bodywrap">
    <div class="container center" id="register-form">
    
    <h2>BILL SPLITTER</h2>
    <form method="POST">
       <div class="container center" id="bill-form">
        <label for="bill" id="bill_label" class="form-group">Bill &nbsp;</label>
        <input type="text" id="bill" name="bill">
        <br>
        <label for="people">Number of people &nbsp; </label>
        <input type="text" id="people" name="people" placeholder="">
        <br>
        <label for="tip">Tip &nbsp; %</label>
        <input type="text" id="tip" name="tip" placeholder="">
        <br>
        <input type="button" value="Calculate" onClick="calculateBills(1)">
    </div>
    </form>
    
    <p>Total per person:</p>
    <p id="perPerson"></p>
    <input type="button" id="chargePeople" value="Charge People!!!" style="display:none" onClick="calculateBills(2)">
    
    </div>
    </div>
    
    </body>
</html>
 
