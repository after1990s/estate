<?php
class indexAction extends Action{
	public function login()
	{
		
	}
	public function index()
	{
		if ($_SESSION['user_name']!=null)
		{
			echo '<script type="text/javascript">location.href="'.WEBURL.'index.php/User/Home"</script>';
		}
		$this->display();
	}
}
?>