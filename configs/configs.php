<?php
    session_start();
    $GLOBALS["onlineMode"]=1;
    $GLOBALS["token"]="dame";
    $GLOBALS["Users"]="dame";
    $GLOBALS["debug"]=true;
    if(1) {
        $GLOBALS["mysqlUser"]="root";
        $GLOBALS["mysqlPass"]="root";
        $GLOBALS["sqlMainDB"]="ydh";
        $GLOBALS["sqlHost"]="localhost";
        $GLOBALS["sqlPort"]=3306;
        $GLOBALS["jqLoc"]="./script/jquery.js";
        $GLOBALS["jsLoc"]="./script/material.js";
        $GLOBALS["cssLoc"]="./css/material.css";
        $GLOBALS["jqLoc1"]="../script/jquery.js";
        $GLOBALS["jsLoc1"]="../script/material.js";
        $GLOBALS["cssLoc1"]="../css/material.css";
    }
?>