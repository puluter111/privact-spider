<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/3/14
 * Time: 12:26
 */
header("<meta charset=\"utf-8\">");
$sqlConnect = $GLOBALS["sqlConnect"] = mysqli_connect($GLOBALS["sqlHost"], $GLOBALS['mysqlUser'], $GLOBALS['mysqlPass'], $GLOBALS['sqlMainDB'], $GLOBALS["sqlPort"]);
mysqli_query($sqlConnect,"SET NAMES UTF8");

function mthx($string, $censored_words = 1) {
    global $sqlConnect;
    $string = trim($string);
    $string = mysqli_real_escape_string($sqlConnect, $string);
    $string = htmlspecialchars($string, ENT_QUOTES);
    $string = str_replace('\\n', " <br>", $string);
    $string = str_replace('\\r', " <br>", $string);
    $string = str_replace('\\r\\n', " <br>", $string);
    $string = str_replace('\\n\\r', " <br>", $string);
    $string = stripslashes($string);
    $string = str_replace('&amp;#', '&#', $string);
    return $string;
}
