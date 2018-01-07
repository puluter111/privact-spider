<?php
/**
 * Created by PhpStorm.
 * User: yuzhu
 * Date: 2017/12/28
 * Time: 20:25
 */

$op1=array(
    generate_outputArray("qqzone_","nickname_1","nickname",'"nickname":"(.*?)",',"regex"),
    generate_outputArray("qqzone_","nickname_2","nickname",'"spacename":"(.*?)",',"regex"),
    generate_outputArray("qqzone_","gender","gender",'"sex_type":(.*?),"sex"',"regex"),
    generate_outputArray("qqzone_","age","age",'"age":(.*?),"islunar"',"regex"),
    generate_outputArray("qqzone_","birth_year","birth_year",'"birthyear":(.*?),"birthday',"regex"),
    generate_outputArray("qqzone_","birth_date","birth_date",'"birthday":(.*?),"bloodtype',"regex"),
    generate_outputArray("qqzone_","country","country",'"country":"(.*?)",',"regex"),
    generate_outputArray("qqzone_","province","province",'"province":"(.*?)",',"regex"),
    generate_outputArray("qqzone_","marriage","marriage",'"marriage":(.*?),',"regex"),
    generate_outputArray("qqzone_","career","career",'"career":(.*?),',"regex"),
    generate_outputArray("qqzone_","company","company",'"company":(.*?),',"regex"),
    generate_outputArray("qqzone_","mailname","mailname",'"mailname":(.*?),',"regex"),
    generate_outputArray("qqzone_","mailcellphone","mailcellphone",'"mailcellphone":(.*?),',"regex"),
    generate_outputArray("qqzone_","mailaddr","mailaddr",'"mailaddr":(.*?),',"regex"),
    generate_outputArray("qqzone_","constellation","constellation",'"constellation":(.*?),',"regex"),
    generate_outputArray("qqzone_","111","111",'"constellation":(.*?),',"regex"),
);

add_pattern("qqzone","qqNumber","https://h5.qzone.qq.com/proxy/domain/base.qzone.qq.com/cgi-bin/user/cgi_userinfo_get_all?uin=%%&vuin=1076685141&fupdate=1&rd=0.04921998969127217&g_tk=1400382187",$op1);
echo "1";

//https://h5.qzone.qq.com/proxy/domain/base.qzone.qq.com/cgi-bin/user/cgi_userinfo_get_all?uin=2595430384&vuin=1076685141&fupdate=1&rd=0.04921998969127217&g_tk=1400382187&qzonetoken=b9eb45a2051a3af53b63c2c09dec7521cd90b8bbda8630eaa0879c462c80b3f45605d517aa8a83ae0710