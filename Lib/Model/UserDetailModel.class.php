<?php
class UserDetailModel extends Model
{
	protected $_map = array(// 'form'=>'database'
			'realname'=>'user_realname ',
			'id_number'=>'id_card_number',
			'detail_address'=>'user_detail_address',
			'cellphone'=>'user_cellphone',
			'fixphone'=>'user_fixphone',
			'company'=>'user_company'
			);
}
?>