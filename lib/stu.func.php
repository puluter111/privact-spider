<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/3/15
 * Time: 9:57
 */

global $sqlConnect;

function getClassEN($stuID){
    //abb
    $str=array(0,"1","2","3","4");//10101
    return "Grade ".$str[(int)floor($stuID/100)]." Class ".(int)(floor($stuID/1)%100)."";
}

//1(grade)MT1(mtNum)xx

function ezGetClass($stuID,$mode=1){
    $str=array(0,"一","二","三","4");//10101
    $str2=array(0,"数学","生化","理工","人文","经济","外语");
    $str3=array(0,"数学","自然","人文","外语","工程","经济");
    $grade=(int)substr($stuID,0,1);
    $GRADE=$str[(int)$grade];
    if ($grade == 1){
        $class=(int)substr($stuID,3,1);
        $CLASS="高一".$str2[$class]."MT";
    }
    else if($grade == 2){
        $class=(int)substr($stuID,3,1);
        $CLASS="高二".$str3[$class]."MT";
    }
    else if($grade == 3){
        //GCCNN
        $class=(int)substr($stuID,1,2);
        $c1=substr($stuID,1,2);
        $CLASS="高三{$class}班";
    }
    if($mode==2){
        if($grade==1||$grade==2){
            return $grade."0".$class;
        }
        else return $grade.$c1;
    }
    if($mode==3){
        if($grade==1) return "高一".$str2[(int)substr($stuID,2,1)]."MT";
        if($grade==2) return "高二".$str3[(int)substr($stuID,2,1)]."MT";
        if($grade==3) return "高三".substr($stuID,1,2)."班";
    }
    return $CLASS;
}


function getClass($stuID,$mode=1){
    //abb
    if(false){
        if($mode==1){
            $str=array(0,"一","二","三","4");//10101
            $str2=array(0,"数学","自然","人文","外语","工程","经济");
            $str3=array(0,"数学","生化","理工","人文","经济","外语");
            $grade=(int)substr($stuID,0,1);
            $GRADE=$str[(int)$grade];
            if ($grade == 1){
                $class=(int)substr($stuID,3,1);
                $CLASS="高一".$str2[$class]."MT";
            }
            else if($grade == 2){
                $class=(int)substr($stuID,3,1);
                $CLASS="高二".$str3[$class]."MT";
            }
            else if($grade == 3){
                //GCCNN
                $class=(int)substr($stuID,1,2);
                $CLASS="高三{$class}班";
            }
            return $CLASS;
        }
        else {
            //abbcc
            return (int)floor($stuID/100);
        }
    }
    if($mode==1){
        $str=array(0,"1","2","3","4");//10101
        return "Grade ".$str[(int)floor($stuID/10000)]." Class ".(int)(floor($stuID/100)%100)."";
    }
    else {
        //abbcc
        return (int)floor($stuID/100);
    }
}

function getName($stuId){
    global $sqlConnect;
    $qt="SELECT * FROM `ydh_player` WHERE `playerID`='{$stuId}'";
    return mysqli_fetch_assoc(mysqli_query($sqlConnect,$qt));
}

function getGrade($stuID){
    return (int)substr($stuID,0,1);
}