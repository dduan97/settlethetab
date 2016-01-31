<body>
    
  <div class="bodywrap">
      <div class="block" style="min-height: 450px;">
          
          <div class="container" style="float: left;">
              <a href="calculate.php"><button class="button green" id="scan">Bill Splitter</button></a>
              <a href="owemoney.php"><button class="button red" id="charge">Manual Charge</button></a>
          </div>
        
          <div class="container" id="friends">
              <h2>FRIENDS</h2>
              <div class="content">
                  <h3>NET BALANCE &nbsp; &nbsp; &nbsp; &nbsp;<b>
                  <?php 
                  if($ispositive)
                  {
                    print("<span style='color: #228764;'>" . "$" . abs($nbalance) . "</span>");
                  }
                  else
                  {
                    print("<span style='color: #912626;'>" . "-$" . abs($nbalance) . "</span>");
                  }
                ?>
                    </b></h3>
              </div>
              
              <table>
                <tr>
                   <?php 
                   $red = "#8c341c";
                   $green = "#1D7E47";
                   $p1 = abs($positions[0]['balance']);
                   if($p1 == $positions[0]['balance']){
                     $s1 = "";
                     $c1 = $green; //green
                   }
                   else{
                     $s1 = "-";
                     $c1 = $red;
                   }
                   $p2 = abs($positions[1]['balance']);
                   if($p2 == $positions[1]['balance']){
                     $s2 = "";
                     $c2 = $green; //green
                   }
                   else{
                     $s2 = "-";
                     $c2 = $red;
                   }
                   $p3 = abs($positions[2]['balance']);
                   if($p3 == $positions[2]['balance']){
                     $s3 = "";
                     $c3 = $green; //green
                   }
                   else{
                     $s3 = "-";
                     $c3 = $red;
                   }
                   print("<td><img src='images/person3.png'></th>
                  <td><a href='https://settlethetab-dduan97.c9users.io/public/email.php?email=annie.chen@yale.edu'>{$positions[0]['name']}</a></th>
                  <td class='money' style='color: " . $c1 . "'>" . $s1 . "$" . "{$p1}</th>
                </tr>
                <tr>
                  <td><img src='images/person1.png'></td>
                  <td><a href='https://settlethetab-dduan97.c9users.io/public/email.php?email=dennis.duan@yale.edu'>{$positions[1]['name']}</a></td>
                  <td class='money style='color: " . $c2 . "'>" . $s2 . "$" . "{$p2}</td>
                </tr>
                <tr>
                  <td><img src='images/person2.png'></td>
                  <td><a href='https://settlethetab-dduan97.c9users.io/public/email.php?email=whhuang@princeton.edu'>{$positions[2]['name']}</a></td>
                  <td class='money' style='color: " . $c3 . "'>" . $s3 . "$" . "{$p3}</td>
                </tr>")
                ?>

              </table>
              
          </div>
      
      </div>
  </div>
    
    
</body>
