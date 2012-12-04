<?php
class UserModel extends Model{
	protected $_map = array(// 'form'=>'database'
			'username'=>'user_name',
			'password'=>'user_pass',
			'mail'=>'user_mail',
			'city'=>'user_city',
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