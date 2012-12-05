<?php
class RegesterAction extends Action
{
	
	public function Reg()
	{
		$this->error_msg = '';
		$reg_name_array = array(
				1=>'username',
				2=>'password',
				3=>'mail',
				4=>'sex',
				5=>'realname',
				6=>'id_number',
				7=>'city',
				8=>'detail_address',
				9=>'cellphone',
				10=>'fixedphone',
				11=>'company',
				12=>'confirm_password'
				);
		$input_name_array = array(
				1=>'input_username',
				2=>'input_password',
				3=>'input_mail',
				4=>'input_sex',
				5=>'input_realname',
				6=>'input_id_number',
				7=>'input_city',
				8=>'input_detail_address',
				9=>'input_cellphone',
				10=>'input_fixedphone',
				11=>'input_company',
				12=>'input_confirm_password'
				);

		
		if ($this->_post('submit'))
		{
			for($i=1; $i<=12; $i++)
			{
				$input_name = 'input_'.$reg_name_array[$i];
				$this->$input_name = $this->_post($reg_name_array[$i]);
			//	log::write($input_name.$this->$input_name);
			}
			if (strlen($this->input_username)<3)
			{
				$this->error_msg .='用户名过短<br />';
			}
			if (strlen($this->input_password)<6)
			{
				$this->error_msg .='密码长度过短<br />';
			}			
			if (strcmp($this->input_password, $this->input_confirm_password) != 0)
			{
				$this->error_msg .='密码不一致<br />';	
			}
			if (preg_match('(^[a-z0-9]+@[a-z0-9]+\.[a-z0-9]+$)i',$this->input_mail) != 1)
			{
				$this->error_msg .= '邮箱格式错误<br />';
			}
		//	Log::write($this->input_mail);

			$newUser = D('User');
			$oldUser = $newUser->where('user_name=\''.$this->input_username.'\'')->select();
			if ($oldUser != null)
			{
				$this->error_msg .='用户已存在';
			}
			if (strcmp($this->error_msg, '') != 0 )
			{
				$this->display();
				return;
			}
				
		//	Log::write('OldUser:'.$oldUser);
			$newUser->create();                                      
			$newUser->user_privileges = 'normal';
			$newUser->user_pass = hash('sha256',$this->input_password);
			$newUserId=0;
			if (($newUserId = $newUser->add())==false)
			{
				$this->error_msg = '内部错误';
			}
			else
			{//插入user_detail数据库
				$newUserDetail = D('UserDetail');
				$newUserDetail->create();
				$newUserDetail->user_id = $newUserId;
				$newUserDetail->add();//即使出现错误也忽略
				$this->success_msg = '<script type="text/javascript">alert(\'注册成功，请登录\');location.href=\''.WEBURL.'index.php/Index\'; </script>';
			}
		}
		$this->display();
	}
	private function check_mutil_username($username)
	{
		
	}
}

?>