<div class="bodywrap">
<div class="block">
<table id="debtlist">
<br><br><br><br>
    <thead>
        <tr>
            <th>Ower</th>
            <th>Owed</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Note</th>
        </tr>
    </thead>
     <?php 
        if (!empty($positions))
        {
            print("<tbody>");
            foreach ($positions as $position)
            {
                print("<tr>");
                print("<td>{$position["owername"]}</td>");
                print("<td>{$position["owedname"]}</td>");
                print("<td>{$position["amount"]}</td>");
                print("<td>{$position["date"]}</td>");
                print("<td>{$position["note"]}</td>");
                print("</tr>");
           }
           print("</tbody>");
        }
        else 
        {
            print("<h3>Yo! Use our website!</h3>");
        }
 ?>        
</table>

</div>
</div>