<?php
ob_start();
include "header.php";
include "action.php";
echo "\n<h2>Secret information</h2>\n";
if (isset($_GET['login']) && $_GET['login'] != "") {
    $admin = $_GET['login'];
    if (check_log("admin") == true) {
        echo "<p>Hello, $admin</p>";
        echo "<p>Something secret happens here!</p>";
    }
} else {
    header("Location: index.php");
    ob_end_flush();
}
include "footer.php";