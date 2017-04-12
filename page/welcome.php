<?php
    echo 'Welcome';
    if(isset($_POST['sendButton'])){
        $name = htmlentities($_POST['name']);
        $query = "SELECT * FROM user WHERE name = '$name'";
    }
?>
<div style="float: left">
    <input style="width: 300px; height: auto;" id="textinput" name="name" type="text" placeholder="Input your code" class="form-control input-xs">
</div>
<div style="float: left"><input style="height: 35px;" type="submit" name="sendButton" value="Submit">
<br>

<a href="index.php?page=registration">Registration</a><br>
<a href="index.php?page=thanks">thanks</a>