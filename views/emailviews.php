<form action="email.php" method="post">
    <fieldset>
        <div class="form-group"><br>
            <label for="recipient">To:  </label>
            <?php
                print("<input autocomplete='off' autofocus class='form-control' name='email' placeholder='ID of receiver' type='text' value='{$recipientemail}'/>");
            ?>
        </div><br>
        <div class="type_input" class="form-group">
            <label for="message">Message</label>
            <br><textarea rows="10" cols="50" class="form-control" name="body" placeholder="Hey! Please check out your tab at Settle the Tab!" type="text"></textarea>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
               send!
            </button>
        </div>
    </fieldset>
</form>
