<?php

define('WEBURL','http://localhost/estate/');
define('APP_DEBUG', true);
//�����û�ͷ����ļ���
define('UPLOAD_USER_PHOTO_PATH', 'C:\Program Files (x86)\Zend\Apache2\htdocs\estate\upload\UserPhoto\\');
//�����û���Ƭ���ļ���
define('UPLOAD_BUSINESSCARD_PHOTO_PATH', 'C:\Program Files (x86)\Zend\Apache2\htdocs\estate\upload\BusinessCardPhoto\\');

require 'ThinkPHP/ThinkPHP.php';
/*
$_SESSION['user_name'] ;
$_SESSION['user_id'] ;
*/
//todo:����ϴ��Ƿ������\x00
?>