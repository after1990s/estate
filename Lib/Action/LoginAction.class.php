<?php
class LoginAction extends Action
{
	public function login()
	{
		$user=D('User');
		$condition['user_name'] = htmlentities($this->_post('username'));
		$condition['user_pass'] = hash('sha256',$this->_post('password'));
		$condition['_logic'] = 'AND';
		$UserArray = $user->where($condition)->select();
		if ($UserArray == false)
		{
			$this->notice = '<script type="text/javascript">alert(\'用户名或密码错误，请重新登录\');location.href="'.WEBURL.'index.php/Index";</script>';
		}
		else
		{
			//log::write($UserArray[0]['user_name']);
			//log::write($UserArray[0]['user_id']);
			$_SESSION['user_name'] =  $UserArray[0]['user_name'];
			$_SESSION['user_id'] = $UserArray[0]['user_id'];
			$this->notice = '<script type="text/javascript">alert(\'登录成功\');location.href="'.WEBURL.'index.php/User/Home";</script>';
		}
		$this->display();
	}
}
?>