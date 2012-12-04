<?php
class UserAction extends Action
{
	public function Home()
	{
		$this->username = $_SESSION['user_name'];
		
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