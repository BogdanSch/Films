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

function out_arr()
{
    global $countries;
    // делаем переменную $countries глобальной
    $arr_out = [];
    $arr_out[] = "<table class=\"table-films table text-white-50\">";
    $arr_out[] = "<tr><td>№</td><td>Film</td><td>Producer
    </td><td>Genre</td><td>Date</td><td>Rate</td><td>Slogan</td><td>Studio</td><td colspan=\"3\">Sessions</td><td>Price</td><td>Places</td></tr>";
    foreach ($countries as $country) {
        static $i = 1;
        //статическая глобальная переменная-счетчик
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                $str .= "<td>$value</td>";
            } else {
                foreach ($value as $k => $v) {
                    $str .= "<td>$v</td>";
                }

            }

        }
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table>";
    return $arr_out;
}

function name($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["capital"] < $b["capital"]) {
        return -1;
    } elseif ($a["capital"] == $b["capital"]) {
        return 0;
    } else {
        return 1;
    }
}

function area($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["area"] < $b["area"]) {
        return -1;
    } elseif ($a["area"] == $b["area"]) {
        return 0;
    } else {
        return 1;
    }

}
function population($a, $b)
{ // функция, определяющая способ сортировки (по населению)
    if ($a["population"]["2000"] + $a["population"]["2010"] < $b["population"]["2000"] + $b["population"]["2010"]) {
        return -1;
    } elseif ($a["population"]["2000"] + $a["population"]["2010"] == $b["population"]["2000"] + $b["population"]["2010"]) {
        return 0;
    } else {
        return 1;
    }

}

function sorting($p)
{
    global $countries;
    uasort($countries, $p);
}

function out_arr_search(array $arr_index = null)
{
    global $countries; // делаем переменную $countries глобальной
    $arr_out = [];
    $arr_out[] = "<table  class=\"table text-white-50\">";
    $arr_out[] = "<tr><td>№</td><td>Film</td><td>Producer
    </td><td>Genre</td><td>Date</td><td>Rate</td><td>Slogan</td><td>Studio</td><td colspan=\"3\">Sessions</td><td>Price</td><td>Places</td></tr>";
    foreach ($countries as $index => $country) {
        if ($arr_index != null && in_array($index, $arr_index)) {
            static $i = 1;
            $str = "<tr>" . "<td>" . $i . "</td>";
            foreach ($country as $key => $value) {
                if (!is_array($value)) {
                    $str .= "<td>$value</td>";
                } else {
                    foreach ($value as $k => $v) {
                        $str .= "<td>$v</td>";
                    }
                }
            }
            $str .= "<td>" . (array_sum($country['population']) / count($country['population'])) . "</td></tr>";
            $arr_out[] = $str;
            $i++;
        }
    }
    $arr_out[] = "</table>";
    return $arr_out;
}

function out_search($data)
{
    global $countries; // делаем переменную $countries глобальной
    $arr_index = array();
    foreach ($countries as $country_number => $country) {
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