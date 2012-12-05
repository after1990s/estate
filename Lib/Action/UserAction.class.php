<?php
class UserAction extends Action
{
	public function Home()
	{
		$this->username = $_SESSION['user_name'];
		if ($this->username==null)
		{
			echo '<script type="text/javascript">href.location="'.WEBURL.'/index.php/Index"</script>';
		}
		$user = D('User');
		$condition['user_id'] = $_SESSION['user_id'];
		$UserArray = $user->where($condition)->select();
		
		//写入模板上的各个URL
		$this->edit_userprofile_path=WEBURL.'index.php/User/EditInfo.html';
		$this->opened_website = WEBURL.'index.php/User/OpenedWebsite.html';
		$this->push_log = WEBURL.'index.php/User/PushLog.html';
		$this->rent_house_management = WEBURL.'index.php/User/RentHouseManagement.html';
		$this->sell_house_management = WEBURL.'index.php/User/SellHouseManagement.html';
		$this->add_rent_house = WEBURL.'index.php/AddHouse/AddRentHouse.html';
		$this->add_sell_house = WEBURL.'index.php/AddHouse/AddSellHouse.html';
		
		$this->display();
	}
	public function EditInfo()
	{
		if ($_SESSION['user_id']==null)
		{
			log::write('session[\'user_id\']:'.$_SESSION['user_id']);
			$url = '/estate/index.php/Index';
			header("location:$url");
			return;
		} 
		$User = D('UserDetail');
		$conditions['user_id'] = $_SESSION['user_id'];
		$UserDetail = $User->where($conditions)->select();
		if ($this->_post('submit') == '提交')
		{//更新数据
			log::write('开始更新数据');
			$User->create();
			//设置主键
			$data['user_detail_id'] = $UserDetail[0]['user_detail_id'];
			$result = $User->where($data)->save();
			if ($result)
			{
				$this->notice = "更新成功";
			}
			else
			{
				$this->notice = "更新失败，内部错误";
			}

		}

		$UserDetail = $User->where($conditions)->select();
		//检查
		$this->user_realname = $UserDetail[0]['user_realname'];
		$this->user_company = $UserDetail[0]['user_company'];
		$this->user_idcard_number = $UserDetail[0]['user_idcard_number'];
		$this->user_detail_address = $UserDetail[0]['user_detail_address'];
		$this->user_cellphone = $UserDetail[0]['user_cellphone'];
		$this->user_fixphone = $UserDetail[0]['user_fixphone'];
		$this->user_qq = $UserDetail[0]['user_qq'];
		$this->user_msn = $UserDetail[0]['user_msn'];
		$this->user_describe = $UserDetail[0]['user_describe'];
		log::write($this->user_idcard_number);
		$this->display();
	}
	public function UploadPhoto()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		//$upload->allowTypes = array('jpg', 'gif', 'png', 'jpeg');
		$upload->maxSize = 2048*1024;
		$upload->savePath = UPLOAD_USER_PHOTO_PATH;
		if ($upload->upload()==false)
		{
			log::write($upload->getErrorMsg());
			$this->script = '<script type="text/javascript">alert("上传失败，请重试");location.href="'.WEBURL.'index.php/User/EditInfo";</script>';
			$this->display();
			return;
		}
		else
		{
			$uploadInfo = $upload->getUploadFileInfo();
			$UserDetail = D('UserDetail');
			$conditions['user_id'] = $_SESSION['user_id'];
			$UserDetailInfo = $UserDetail->where($conditions)->select();
			if ($UserDetailInfo[0]['user_detail_id'] == null)
			{
				$this->script = '<script type="text/javascript">alert("请重新登录");location.href="'.WEBURL.'index.php/Index";</script>';
				$this->display();
				return;
			}
			else
			{
				$UserDetail->create();
				$data['user_photo'] = $uploadInfo[0]['savepath'].'\\'.$uploadInfo[0]['savename'];
				$conditions = array();
				$conditions['user_detail_id'] = $UserDetailInfo[0]['user_detail_id'];
				$UserDetail->where($conditions)->save($data);
				$this->script = '<script type="text/javascript">alert("上传成功");location.href="'.WEBURL.'index.php/User/EditInfo";</script>';
				$this->display();
			}
		}
		
	}
	public function UploadBusinesscardPhoto()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		$upload->maxSize = 2048*1024;
		$upload->savePath = UPLOAD_BUSINESSCARD_PHOTO_PATH;
		if($upload->upload()==false)
		{
			$this->script='<script type="text/javascript">alert("上传失败");location.href="'.WEBURL.'index.php/User/EditInfo";</script>';
		}
		else 
		{
			$uploadInfo = $upload->getUploadFileInfo();
			$UserDetail = D('UserDetail');
			$conditions['user_id'] = $_SESSION['user_id'];
			$UserDetailInfo = $UserDetail->where($conditions)->select();
			if ($UserDetailInfo[0]['user_id']==null)
			{
				$this->script = '<script type="text/javascript">alert("请重新登录");location.href="'.WEBURL.'index.php/Index";</script>';
				$this->display();
				return;
			}
			else
			{
				$conditions = array();
				$conditions['user_detail_id'] = $UserDetailInfo[0]['user_detail_id'];
				$UserDetail->create();
				$data['user_businesscard_photo'] = $uploadInfo[0]['savepath'].'\\'.$uploadInfo[0]['savename'];
				$UserDetail->where($conditions)->save($data);
				$this->script = '<script type="text/javascript">alert("上传成功");location.href="'.WEBURL.'index.php/User/EditInfo";</script>';
				$this->display();
			}
		}
		$this->display();
	}
	public function OpenedWebsite()
	{
		
		$this->display();
	}
	public function PushLog()
	{
		$this->display();
	}
	public function RentHouseManagement()
	{
		$this->display();
	}
	public function SellHouseManagement()
	{
		$this->display();
	}
}
?>