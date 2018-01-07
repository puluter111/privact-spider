<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/2/9
 * Time: 8:35
 */
function ret(){echo "<br/>";}
function http($url, $data='', $method='GET'){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    if($method=='POST'){
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        if ($data != ''){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        }
    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}
function login($url,$cookie){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_HEADER, "User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.1.1; MI 5 Build/NMF26V)");
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;

}

function get($url,$cookie=""){
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    //curl_setopt($ch, CURLOPT_HEADER, "User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.1.1; MI 5 Build/NMF26V)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function post($url,$params,$cookie=""){
//$post_data = array ("username" => "bob","key" => "12345");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, "User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.1.1; MI 5 Build/NMF26V)");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}