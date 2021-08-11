<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1>Trang đăng nhập tài khoản admin</h1>
	
	<form action="TrangChuAdmin.php" method="post">
		<table  border="1">
		
			<tr>
				<td  >
					<label>Username</label>
				</td>
				<td>
					<input type="text" name="username">
				</td>
			</tr>
			
			<tr>
				<td >
					<label>Password</label>
				</td>
				<td>
					<input type="text" name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Đăng Nhập">
				</td>
			</tr>
			
		
		</table>
	
	</form>
	
	
</body>
</html>
<?php 
	if (isset($_POST['submit'])) {
	$user=addslashes($_POST['username']);
	$pass=addslashes($_POST['password']);
	if($user =="admin"&&$pass=="admin")
		include_once('TrangChuAdmin.php');
		else
		echo "Đăng nhập thất bại.";
}

	 ?>