<?php
include ('config.php');
function dbconnect()
{//���������֤���ص����ݿ����ӿ���
	$mysqli = new mysqli(DBURL, DBUSER, DBPASS, 'estate');
	if (mysqli_connect_errno())
	{
		die ('database config error');
	}
	return $mysqli;
}
?>