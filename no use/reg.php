<html>
<title>reg</title>
<body>
<?php
include('config.php');
include ('dbconnect.php');
class reg{
	static public $errstr='';
	static private $PRIVILEGES = array('normal'=>0,'VIP'=>1);
	private function check_reg(){
		if ($_POST["submit"]=="提交")
		{
			if (strlen($_POST['username']) == 0)
				reg::$errstr ='用户名不能为空<br />';
			if (strlen($_POST['password']) == 0)
				reg::$errstr .= '密码不能为空';
			if (!strncmp($_POST['password'], $_POST['confirm_password'], 256))
				reg::$errstr .='两次输入密码不一致<br />';
			if (!ereg('^([a-zA-Z0-9])+@([a-zA-Z0-9])+\.([a-zA-Z0-9])+$', $_POST['mail']))
				reg::$errstr .= '错误的电子邮箱地址<br />';		
		}
		return strncmp(reg::$errstr,'',1);
	}
	private function insert_user()
	{
		$mysqli = dbconnect();
		$insert_user = 'insert into estate_user(user_name, user_pass, user_mail, user_privileges, user_city, user_sex) values (?,?,?,?,?,?)';
		$stmt = $mysqli->prepare($insert_user);
		$user_name=$_POST['username'];
		$user_pass=$_POST['password'];
		$user_mail=$_POST['mail'];
		$user_privileges = reg::$PRIVILEGES['normal'];
		$user_city = $_POST['city'];
		$user_sex = $_POST['sex'];
		$stmt->bind_param('sssssi', $user_name, $user_pass, $user_mail, $use_privileges, $user_city, $user_sex);
		if ($stmt->execute()==false)
			reg::$errstr .= '内部错误';
		$stmt->close();
		return strncmp(reg::$errstr,'',1);
	}
	private function check_user()//检查是否有重名用户
	{
		$mysqli = dbconnect();
		$select_user =  "SELECT user_id FROM estate_user WHERE user_name=? LIMIT 0,1";
		$stmt = $mysqli->prepare($select_user);
		$user_name = $_POST['username'];
		$stmt->bind_param("s", $user_name);
		if ($stmt->execute()==false)
			reg::$errstr .= '内部错误';
		$user_id='';
		$stmt->bind_result($user_id);
		$result = $stmt->fetch();
		if ($user_id!=null)
		{
			reg::$errstr .= '用户已存在';
		}
		return strncmp(reg::$errstr,'',1);	
	}
	private function insert_usr_detail()
	{
		$mysqli = dbconnect();
		$realname = $_POST['realname'];
		$id_number = $_POST['id_number'];
		$city = $_POST['city'];
		$detail_address = $_POST['detail_address'];
		$cell_phone = $_POST['cell_phone'];
		$fix_phone = $_POST['fix_phone'];
		$companyname = $_POST['companyname'];
		$user_name = $_POST['username'];
		$insert_user_detail = "";
	}
	public function call_reg()
	{
		
		if ($this->check_reg())
		{
			if ($this->check_user())
			{
				if ($this->insert_user())
					die("注册成功");
			}
		}
	}
}
$myreg = new reg();
$myreg->call_reg()
?>
注册：<br /><?php echo reg::$errstr ?>
<form url="#" method="post">
<table>
<tr>
<td>用户名</td><td><input type="text" name="username" value="<?php echo $_POST['username'] ?>"/></td>
</tr>
<tr>
<td>密码</td><td><input type="password" name="password" /></td>
</tr>
<tr>
<td>确认密码</td><td><input type="password" name="confirm_password" /></td>
</tr>
<tr>
<td>电子邮箱</td><td><input type="text" name="mail" value="<? echo $_POST['mail']?>"/></td>
</tr>
<tr>
<td>性别</td><td><input type="radio" name="sex" value="male" checked/>男  <input type="radio" name="sex" value="female" />女</td>
</tr>
<tr>
<td>真实姓名</td><td><input type="text" name="realname" value="<? echo $_POST['realname']?>"　/></td>
</tr>
<tr>
<td>身份证号</td><td><input type="text" name="id_number" value="<? echo $_POST['id_number'] ?>"　/></td>
</tr><tr>
<td>城市</td><td><input type="text" name="city" value="<? echo $_POST['city'] ?>"　/></td>
</tr>
<tr>
<td>详细地址</td><td><input type="text" name="detail_address" value="<? echo $_POST['detail_address']?> "　/></td>
</tr>
<tr>
<td>手机号</td><td><input type="text" name="cellphone" value="<? echo $_POST['cellphone'] ?>"　/></td>
</tr>
<tr>
<td>固定电话</td><td><input type="text" name="fixphone" value="<? echo $_POST['fixphone']?> "　/></td>
</tr>
<td>公司名称</td><td><input type="text" name="companyname" value="<? echo $_POST['companyname']?> "　/></td>
</tr>
<tr>
<!--  
<td>所属门店</td><td><input type="text" name="#" value="'.$_POST[''].'"　/></td>
</tr>
<tr>
<td>小组/部门</td><td><input type="text" name="#" value="'.$_POST[''].'"　/></td>
</tr>
<tr>
<td>主营小区</td><td><input type="text" name="#" value="'.$_POST[''].'"　 /></td>
</tr>
-->
</table>
<input type="checkbox" name="#" />service rule<br />
<input type="submit" name="submit" value="提交" />
</form>
</body>
</html>
