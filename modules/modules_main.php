<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/12/28
 * Time: 20:28
 */

/**
 * @param $name
 * @param $inputType
 * @param $url
 * @param $output
 */
function add_pattern($name,$inputType,$url,$output){
    global $pattern_all;
    array_push($pattern_all,array(
        "name"=>$name,
        "inputType"=>$inputType,
        "url"=>$url,
        "output"=>$output
    ));
    var_dump(array(
        "name"=>$name,
        "inputType"=>$inputType,
        "url"=>$url,
        "output"=>$output
    ));
}

/**
 * @param $bigName
 * @param $name
 * @param $outputType
 * @param $loc
 * @param $locType
 * @return array
 */
function generate_outputArray($bigName,$name,$outputType,$loc,$locType){
    return array(
        "name"=>$bigName . $name,
        "outputType"=>$outputType,
        "loc"=>$loc,
        "locType"=>$locType
    );
}