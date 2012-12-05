<?php
class UserModel extends Model{
	protected $_map = array(// 'form'=>'database'
			'username'=>'user_name',
			'password'=>'user_pass',
			'mail'=>'user_mail',
			'city'=>'user_city',
			);
	public $sql_column = array(
			0=>'',
			1=>'',
			2=>'',
			3=>'',
			4=>'',
			5=>'',
			6=>'',
			7=>'',
			8=>'',
			9=>'',
			10=>'',
			11=>''
			);

}
/*
 'sex',
'realname',
'id_number',

'detail_address',
'cellphone',
'fixedphone',
'company'*/
?>