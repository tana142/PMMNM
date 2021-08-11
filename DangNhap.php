<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1>Trang đăng nhập tài khoản </h1>
	
	<form action="DangKyHocPhan.php" method="post">
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
			
			<tr>
				<td> <a href="DangNhapAdmin.php"> Đăng nhập với quyền admin</a></td>
			</tr>
			
			<tr>
				<td> <a href="DangKy.php"> Đăng ký tài khoản</a></td>
			</tr>
		
		</table>
	
	</form>
	
	
</body>
</html>
<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['submit'])) 
{
    //Kết nối tới database
    
	$conn = mysqli_connect("localhost", "root", "", "dangkyhocphan");
	
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql="SELECT username, password FROM user WHERE username='$username'";
    $kq=mysqli_query($conn,$sql);
    if (mysqli_num_rows($kq) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    else {$row = mysqli_fetch_array($kq);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

        # code...
    }
    //Lấy mật khẩu trong database ra
    
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    
    include_once('trangchu.php');
    
    die();
}
?>
