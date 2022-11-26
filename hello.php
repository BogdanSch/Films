<?php
ob_start();
include "header.php";
include "action.php";
require "db.php";
echo "\n<h2>Secret information</h2>\n";
if (isset($_GET['login']) && $_GET['login'] != "") {
    $admin = $_GET['login'];
    if (check_log("admin")) {
        echo "<p>Hello, $admin</p>";
        echo "<p>Today our income is {$stat_income['soldTicketsPrice']} UAH</p>";
        echo "<p>We sold {$stat_income['soldTickets']} tickets</p>";
        echo "<p>There are {$stat_income['freePlaces']} places available</p>";
    }
} else {
    header("Location: index.php");
    ob_end_flush();
}
include "footer.php";