<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/3/4
 * Time: 9:59
 */

$inited=false;

function init(){
    global $inited;
    $inited=true;
    getToken();
}

function cck($target){
    global $sqlConnect;
    $qt="UPDATE `ydh_users` SET `times`=`times`+1 WHERE `openId`='{$target}'";
    mysqli_query($sqlConnect,$qt);
    //if(mysqli_assoc_fetch(mysqli_query($sqlConnect,"SELECT * from `ydh_users` where `openId`='{$target}'"))["times"]>=19){
       sendTxtMsg2("请您确认是否要继续收取成绩，回复“否”为停止，回复其他任意字符为继续。在您回复此条消息前我们不会再次向您推送新的信息。",$target);
    //}
}

function getUsers(){
    global $inited;
    if($inited==false) init();
    $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token={$GLOBALS["token"]}&next_openid=";
    $res=http($url);
    $re_json=json_decode($res,true);
    $userList=$re_json["data"]["openid"];
    if($GLOBALS["debug"]==true) var_dump($userList);
    return $userList;
}

function getToken(){
    $GLOBALS["token"]=explode(",",file_get_contents("http://puluter.xyz/ydh/tokens"))[1];
    return $GLOBALS["token"];
}

function sendTxtMsg2($txt,$usr){
    global $inited;
    if($inited==false) init();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$GLOBALS["token"]}";
        $str='{"touser":"'.$usr.'","msgtype":"text","text":{ "content":"'.$txt.'"}}';
        $res=http($url, $str, "POST");
        if($GLOBALS["debug"]==true) var_dump($res);
}

function sendTxtMsg($txt,$user=0){
    global $inited;
    if($inited==false) init();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$GLOBALS["token"]}";
    cck($user);
    if($user==0){
        $userList=getUsers();
        $cnt=count($userList);
        foreach($userList as $usr) {
            $str='{"touser":"'.$usr.'","msgtype":"text","text":{ "content":"'.$txt.'"}}';
            $res=http($url, $str, "POST");
            if($GLOBALS["debug"]==true) var_dump($res);
        }
    }
    else {
        foreach ($user as $usr){
            $str='{"touser":"'.$usr.'","msgtype":"text","text":{ "content":"'.$txt.'"}}';
            $res=http($url, $str, "POST");
            if($GLOBALS["debug"]==true) var_dump($res);
        }
    }
}

function scorePublish($game,$player){//100k/d 33/p
    global $inited;
    if($inited==false) init();
    $url   = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$GLOBALS["token"];
    $userList=getUsers();
    $cnt=count($userList);
    foreach($userList as $usr) {
        $str = '{"touser":"' . $usr . '","template_id":"' . $GLOBALS['mainTemplate'] . '","url":"","data":{"game":{"value":"' . $game . '"},"player":{"value":"' . $player . '"}}}';
        $res=http($url, $str, "POST");
        if($GLOBALS["debug"]==true) var_dump($res);
    }
}

function scorePublish2($game,$player){//500k/d 150/d
    global $inited;
    if($inited==false) init();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$GLOBALS["token"]}";
    $userList=getUsers();
    $cnt=count($userList);
    foreach($userList as $usr) {
        $str='{"touser":"'.$usr.'","msgtype":"text","text":{ "content":"最新成绩:\n在'.$game.'中，'.$player.'同学获得了第一名！\n恭喜！"}}';
        $res=http($url, $str, "POST");
        if($GLOBALS["debug"]==true) var_dump($res);
    }
}

function scorePublish3($game,$txt){//500k/d 150/d
    global $inited,$sqlConnect;
    if($inited==false) init();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$GLOBALS["token"]}";
    $userList=getUsers();
    $cnt=count($userList);
    foreach($userList as $usr) {
        $str='{"touser":"'.$usr.'","msgtype":"text","text":{ "content":"最新成绩:\n在'.$game.'中，'.$txt.'\n恭喜!"}}';
        $res=http($url, $str, "POST");
        var_dump($str);
        var_dump($res);
    }
}


function scorePublish4($target,$txt){//500k/d 150/d
    global $inited,$sqlConnect;
    if($inited==false) init();
    $url  = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$GLOBALS["token"]}";
    $str='{"touser":"'.$target.'","msgtype":"text","text":{ "content":"'.$txt.'\n成绩以纸质为准"}}';
    $res=http($url, $str, "POST");
    //cck($target);
}
