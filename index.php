<?php
include "header.php";
include "action.php";

echo "<h1>All the films right on Film+</h1><hr>";

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
  <h3 class= "my-2">Sign in:</h3>
  <form class="form-inline" action="index.php" method="post" onsubmit="return verify(this)">
    <label for="login" class="m-2">Login:</label>
    <input type="text" name="login" class="form-control my-2" id="login" placeholder="Enter login">
    <label for="pass" class="m-2">Password:</label>
    <input type="password" name="pass" id="pass" class="form-control my-2" placeholder="Enter password" >
    <input type="submit" value="OK" name="go" class="btn btn-secondary m-2">
  </form>
  <span id="massage"></span>
</div><hr>';
echo $str_form;

$str_form_s = '
<div class="container">
  <h3 class= "my-2">Sort by:</h3>
  <form action="index.php" method="post" name="sort_form">
  <select name="sort" id="sort" size="1">
    <option value="name">name</option>
    <option value="area">area</option>
    <option value="population">average population</option>
  </select>
  <input type="submit" name="submit" value="OK" class="btn btn-secondary my-2" >
  </form>
</div>';
echo $str_form_s;

if (isset($_POST['sort'])) {
    $how_to_sort = $_POST['sort'];
    sorting($how_to_sort);
}

$out = out_arr();

if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
} else {
    echo "No data...";
}

// $str_form_search = "
// <div class=\"container\">
//   <h3>Search:</h3>
// 	<form  name='searchForm' action='index.php' method='post' onSubmit='return overify_login(this);' >
//  		<input type='text' name='search' class='form-control' >
//  		<input type='submit' name='gosearch' value='Confirm'  class='btn btn-secondary my-2'>
//  		<input type='reset' name='clear' value='Reset'  class='btn btn-secondary my-2'>
//  	</form>
// </div>";

// echo $str_form_search;

include "footer.php";