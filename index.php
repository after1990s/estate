<?php

define('WEBURL','http://localhost/estate/');
define('APP_DEBUG', true);
//保存用户头像的文件夹
define('UPLOAD_USER_PHOTO_PATH', 'C:\Program Files (x86)\Zend\Apache2\htdocs\estate\upload\UserPhoto\\');
//保存用户名片的文件夹
define('UPLOAD_BUSINESSCARD_PHOTO_PATH', 'C:\Program Files (x86)\Zend\Apache2\htdocs\estate\upload\BusinessCardPhoto\\');

require 'ThinkPHP/ThinkPHP.php';
/*
$_SESSION['user_name'] ;
$_SESSION['user_id'] ;
*/
//todo:检查上传是否过滤了\x00
?>