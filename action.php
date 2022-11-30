<?php
include "db.php";

// function check_autorize($log)
// {
//     global $users;
//     return array_key_exists($log, $users);
// }

function check_autorize($log, $pas) {
    global $users;
    return array_key_exists($log, $users) && $pas == $users[$log];
}

function check_admin($log, $pas)
{
    global $users;
    return array_key_exists($log, $users) && $pas == $users["admin"];
}

function check_log($log)
{
    return $log == "admin";
}

function print_table_start(){
    return "<tr><td>№</td><td>Film</td><td>Producer
    </td><td>Genre</td><td>Date</td><td>Rate</td><td class=\"slogan\">Slogan</td><td>Studio</td><td colspan=\"3\">Sessions</td><td>Price UAH</td><td>Places</td><td>Discounts</td></tr>";
}

function out_arr()
{
    global $films;
    $arr_out = [];
    $arr_out[] = "<div class=\"table-films\" id=\"sessions\"> <table class=\"table text-white-50\">";
    $arr_out[] = print_table_start();
    foreach ($films as $film) {
        static $i = 1;
        //статическая глобальная переменная-счетчик
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($film as $key => $value) {
            if (!is_array($value)) {
                if($key === "name"){
                    $str .= "<td><a href=\"./order.php?film=$value\">$value</a></td>";
                }
                elseif($key === "rating"){
                    $str .= "<td>$value/10</td>";
                }
                else{
                    $str .= "<td>$value</td>";
                }
            }
            else {
                foreach ($value as $k => $v) {
                    $str .= "<td>$v</td>";
                }
            }

        }
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table></div>";
    return $arr_out;
}

//Sort functions
function name($a, $b)
{
    return $a["name"] <=> $b["name"];
}
function price($a, $b)
{
    return $a["price"] <=> $b["price"];
}
function year($a, $b)
{
    return $a["year"] <=> $b["year"];
}
function slogan($a, $b){
    return $a["slogan"] <=> $b["slogan"];
}
function rating($a, $b){
    return $a["rating"] <=> $b["rating"];
}
function producer($a, $b){
    return $a["producer"] <=> $b["producer"];
}
function studio($a, $b)
{
    return $a["studio"] <=> $b["studio"];
}
function sessions($a, $b){
    return $a["showTime"] <=> $b["showTime"];
}
function places($a, $b){
    return $a["places"] <=> $b["places"];
}
function discount($a, $b){
    return $a["discount"] <=> $b["discount"];
}
function sorting($p)
{
    global $films;
    uasort($films, $p);
}
//sort end
function out_arr_search(array $arr_index = null)
{
    global $films;
    $arr_out = [];
    $arr_out[] = "<div class=\"table-films\"><table class=\"table-films table text-white-50\">";
    $arr_out[] = print_table_start();
    foreach ($films as $index => $country) {
        if ($arr_index != null && in_array($index, $arr_index)) {
            static $i = 1;
            $str = "<tr>" . "<td>" . $i . "</td>";
            foreach ($country as $key => $value) {
                if (!is_array($value)) {
                    if($key === "name")
                        $str .= "<td><a href=\"./order.php?film=$value\">$value</a></td>";
                    elseif($key === "rating"){
                        $str .= "<td>$value/10</td>";
                    }
                    else
                        $str .= "<td>$value</td>";
                } 
                else {
                    foreach ($value as $k => $v) {
                        $str .= "<td>$v</td>";
                    }
                }
            }
            $arr_out[] = $str;
            $i++;
        }
    }
    $arr_out[] = "</table></div>";
    return $arr_out;
}

function out_search($data)
{
    global $films;
    $arr_index = array();
    foreach ($films as $country_number => $country) {
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                if (stristr($value, $data)) {
                    $arr_index[] = $country_number;
                }
            } else {
                foreach ($value as $k => $v) {
                    if (stristr($v, $data) || strstr($k, $data)) {
                        $arr_index[] = $country_number;
                    }
                }
            }
        }
    }
    return out_arr_search(array_unique($arr_index));
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}