<?php

/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/12/19
 * Time: 19:43
 */

require_once __DIR__ . './spider/autoloader.php';
use phpspider\core\requests;
use phpspider\core\selector;
include ("modules/modules_main.php");

$data_all=array();
$pattern_all=array();

function data_save($name,$type,$data){
    global $data_all;
    array_push($data_all,array("name"=>$name,"type"=>$type,"data"=>$data));
    data_search($data);
}


function pattern_search($pattern,$data){
    $html=requests::get(str_replace("%%",$data,$pattern["url"]));
    foreach ($pattern["output"] as $pat){
        data_save($pat["name"],$pat["outputType"],selector::select($html,$pat["loc"],$pat["locType"]));
    }
}
/*
 * data_input=array(name,type,value)
 */
function data_search($data_input){
    global $pattern_all, $data_all;
    $cnt=0;
    while(true){
        foreach ($pattern_all as $pat){
            if($pat["inputType"]==$data_input["type"]){
                pattern_search($pat,$data_input["value"]);
                $cnt++;
            }
        }
    }
}












