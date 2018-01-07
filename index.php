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
use phpspider\core;


$dataa=array();
$pat=array(
    array(
        "name"=>"bala",
        "inputType"=>"nickname",
        "url"=>"http://www.ss.s/s.php?nick=%%",
        "output"=>array(
            array(
                "name"=>"aaa",
                "outputType"=>"birth",
                "isArray"=>false,
                "outputxpath"=>"//div(contains(@class,'birth')/a",
            )
        ),
    ),
    array(
        "name"=>"bala",
        "inputType"=>"birth",
        "url"=>"http://www.ss.s/s.php?nick=%%",
        "output"=>array(
            array(
                "name"=>"aaa",
                "outputType"=>"birth",
                "isArray"=>false,
                "outputxpath"=>"//div(contains(@class,'birth')/a",
            )
        ),
    ),
    array(
        "name"=>"bala",
        "inputType"=>"nickname",
        "url"=>"http://www.ss.s/s.php?nick=%%",
        "output"=>array(
            array(
                "name"=>"aaa",
                "outputType"=>"birth",
                "isArray"=>false,
                "outputxpath"=>"//div(contains(@class,'birth')/a",
            )
        ),
    )
    );
$patt1=array(
    "name"=>"bala",
    "inputType"=>"nickname",
    "url"=>"http://www.ss.s/s.php?nick=%%",
    "output"=>array(
        array(
            "name"=>"aaa",
            "outputType"=>"birth",
            "isArray"=>false,
            "outputxpath"=>"//div(contains(@class,'birth')/a",
        )
    ),
);
$dat_ex=array(
    "name"=>"balalla",
    "type"=>"balaal",
    "val" =>"abaladl"
);

/**
 * @param $type
 * @return array
 */
function pattern_search($type){
    global $pat;
    $cnt=count($pat);
    $i=0;
    $ans=array();
    while($i<$cnt){
        $tmp=$pat[$i];
        if($tmp["inputType"]==$type) array_push($ans,$i);
        $i++;
    }
    return $ans;
}

/**
 * @param $name
 * @param $type
 * @param $dat
 */
function data_save($name,$type,$dat){
    global $dataa;
    array_push($dataa,array("name"=>$name,"type"=>$type,"val"=>$dat));
}

/**
 * @param $patt
 * @param $dat
 */
function data_search($patt,$dat){
    $url=str_replace("%%",$dat,$patt["url"]);
    $html=requests::get($url);
    foreach($dat["output"] as $u){
        $ans=selector::select($html,$u["outputxpath"]);
        data_save($u["name"],$u["outputType"],$ans);
    }
}

/**
 * @param $mainData
 */
function main_func($mainData){
    global $pat;
    foreach ($pat as $u){
        data_search($u,$mainData);
    }
}

var_dump($patt1);














