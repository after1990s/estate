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
<td>�û���</td><td><input type="text" name="user" /></td>
</tr>
<tr>
<td>����</td><td><input type="password" name="password"/></td>
</tr>
</table>
<input type="submit" name="sumit" value="�ύ"/>
</form>
<input type="button" value="ע��" <?php echo 'onclick=location.replace("http://'.WEBSITEURL.'/reg.php")'; ?> />
</body>
</html>
