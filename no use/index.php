<?php
include('config.php');
include ('dbconnect.php');
dbconnect();
?>
<html>
<title>index</title>
<body>
<table>
<form url="#" method="post">
<tr>
<td>用户名</td><td><input type="text" name="user" /></td>
</tr>
<tr>
<td>密码</td><td><input type="password" name="password"/></td>
</tr>
</table>
<input type="submit" name="sumit" value="提交"/>
</form>
<input type="button" value="注册" <?php echo 'onclick=location.replace("http://'.WEBSITEURL.'/reg.php")'; ?> />
</body>
</html>
