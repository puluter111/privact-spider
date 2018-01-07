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


$data_all=array();
$pattern_all=array();

include ("modules/modules_main.php");
include ("modules/QZone.php");
include ("lib/net.func.php");
function data_save($name,$type,$data){
    global $data_all;
    array_push($data_all,array("name"=>$name,"type"=>$type,"data"=>$data));
    data_search($data);
}


function pattern_search($pattern,$data){
    //requests::set_cookies("RK=wQEHNDEf5Z; eas_sid=y1Q4S998h122f0P3V9Q8y8v4e1; LW_uid=M125H0e0l2M761f7w1t8N4Q0s4; LW_sid=71b5Z0O0V2T7i4j0s6t8V453J6; tvfe_boss_uuid=4fcbbb7d7b264d45; pac_uid=1_1076685141; pgv_pvi=3633802240; pgv_pvid=539247588; o_cookie=1076685141; pgv_si=s4217824256; _qpsvr_localtk=0.5293961097678992; pgv_info=ssid=s7403249953; ptui_loginuin=1076685141; ptcz=b7ecbe849fa7ffd47ad38303f57873d54add910391f55b12da3964e91f878a54; uin=o1076685141; skey=@iGYP1zVKn; pt2gguin=o1076685141; p_uin=o1076685141; pt4_token=FWJd7EsPvsKT3-dBWCKahcvOlAOXLTK38NdCtmZEmCI_; p_skey=pJ3KUgduUz1puyjpqt8NPSPpoWzsQVgMwHSWOdNuXJE_; Loading=Yes; QZ_FE_WEBP_SUPPORT=1; cpu_performance_v8=22; rv2=800CCCA61CD69A12D7B8C32042BC68941ADB6B6360BF4978A3; property20=483259BA669672705D5BE419B926E0F7781BBC38B5F1F014B1917F090FDEF2CDC0AEE01915DC2251; __Q_w_s__QZN_TodoMsgCnt=1");
    var_dump(requests::get_cookies());
    $html=requests::get(str_replace("%%",$data,$pattern["url"]));
    var_dump($html);
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
                break;
            }
        }
    }
}

data_search(array(
    "name"=>"qqn",
    "type"=>"qqNumber",
    "value"=>"1076685141"
));
var_dump($data_all);











