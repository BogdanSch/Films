<?php
include "header.php";
include "action.php";
require "db.php";

function get_film_object($film_name){
    global $films;
    foreach ($films as $key => $film_v) {
        if ($film_v["name"] == $film_name) {
            return $film_v;
        }
    }
}

if(isset($_GET['film'])){
    $film_name = $_GET['film'];
    $film = get_film_object($film_name);

    echo "<h2>$film_name</h2><hr>";
    $str = "<div><h3>Price {$film['price']} UAH</h3><h4>Sessions: </h4><ul>";
    $select_sessions = "";

    foreach ($film['showTime'] as $k => $v) {
        $str .= "<li>$v</li>";
        $select_sessions .= "<option value=\"{$v}\">{$v}</option>";
    } 
    $str .= "</ul></div><hr>";
    echo $str;
    echo "<h5>You can pay right here!</h5><h6> After the payout you will receive your tickets by email</h6><hr>";

    $order_form = '
        <form action="order.php" method="post">
            <label for="email">
                Enter your name:
                <input type="text" name="name" class="input-field">
            </label><br>
            <label for="email">
                Enter your email:
                <input type="email" name="email" class="input-field">
            </label><br>
            <label for="sessions">Select your time:</label>        
            <select name="sessions" id="sessions" size="1">'.$select_sessions.'</select><br>
            <label for="amountPeople">
                Enter amount of people:
                <input type="number" name="amountPeople" class="input-field">
            </label><br>
            <label for="cardID">
                Enter your card number:
                <input type="text" name="cardID" class="input-field">
            </label><br>
            <label for="couponNumber">
                Enter your coupon number:
                <input type="text" name="couponNumber" class="input-field">
            </label><br>
            <input type="hidden" name="price" value="'.$film["price"].'">
            <input type="hidden" name="discount" value="'.$film["discount"].'">
            <input type="submit" name="submit" value="Pay" class="btn btn-secondary m-2">
        </form><hr>';
    echo $order_form;
}
if(isset($_POST['submit'])){
    $total_price;
    if(array_intersect($coupons, ["value" => $_POST['couponNumber']])){
        $total_price = $_POST['price'] * $_POST['amountPeople'] - $_POST['discount'];
    }
    else{
        $total_price = $_POST['price'] * $_POST['amountPeople'];
    }
    echo "
    <hr><h2>Thank you {$_POST['name']} for the payment!</h2>
    <h3>You paid $total_price UAH</h3>
    <h3> We sent your tickets via your email {$_POST['email']}</h3>
    <h3>Your session is {$_POST['sessions']}</h3><hr>
    ";
}

include "footer.php";?>