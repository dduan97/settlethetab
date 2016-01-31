<body>
  
  <div class="bodywrap">
  <div class="block">

  <h2>SCAN A RECEIPT</h2>
  <br>
  <form action="../public/process_scan.php" method="POST" enctype="multipart/form-data">
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
  </div>

</body>
