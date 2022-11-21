<?php
include "header.php";
include "action.php";

if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    if (check_autorize($login, $password)) {
        echo "Hello, $login!";
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Viewing a Report</a>";
        }
    } else {
        echo "You are not registred!";
    }
}
$str_form = '
<div class="container">
  <h1 class= "my-2">Sign in</h1><hr>
  <form class="form-inline" action="profile.php" method="post" onsubmit="return verify(this)">
    <label for="login" class="m-2">Login:</label>
    <input type="text" name="login" class="form-control my-2 input-field" id="login" placeholder="Enter login">
    <label for="pass" class="m-2">Password:</label>
    <input type="password" name="pass" id="pass" class="form-control my-2 input-field" placeholder="Enter password" >
    <input type="submit" value="OK" name="go" class="btn btn-secondary m-2">
  </form>
  <span id="massage"></span>
</div><hr>';
echo $str_form;

include "footer.php";