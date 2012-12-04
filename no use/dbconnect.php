<?php
include ('config.php');
function dbconnect()
{//这个函数保证返回的数据库连接可用
	$mysqli = new mysqli(DBURL, DBUSER, DBPASS, 'estate');
	if (mysqli_connect_errno())
	{
		die ('database config error');
	}
	return $mysqli;
}
?>