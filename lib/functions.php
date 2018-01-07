<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/3/17
 * Time: 12:35
 */

function redirect($url){
    return header("Location: {$url}");
}

function runJs($js){
    echo "<script>{$js}</script>";
}

function alert($txt){
    runJs("alert('{$txt}');");
}