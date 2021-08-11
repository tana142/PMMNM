<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1>Trang đăng ký tài khoản </h1>
	
	<form action="DangNhap.php" method="post">
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
					<input type="password" name="password"/>
				</td>
			</tr>
			<tr>
				<td  >
					<label>StudentCode</label>
				</td>
				<td>
					<input type="text" name="studentcode">
				</td>
			</tr>
			<tr>
				<td  >
					<label>Name</label>
				</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Đăng ký">
				</td>
			</tr>
		
		</table>
	
	</form>
	
	
</body>
</html>
<?php 
// Nếu không phải là sự kiện đăng ký thì không xử lý
    
     
   
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    if (isset($_POST['submit'])) 
{
    //Kết nối tới database
    
	$conn = mysqli_connect("localhost", "root", "", "dangkyhocphan");
	
     
  		$masinhvien = $_POST["studencode"];
  		$hoten = $_POST["name"];
  		$username = $_POST["username"];
  		$password = $_POST["password"];


         
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$hoten || !$lop)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
      
          
    if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM user  WHERE username='$username'")) > 0)
    {
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    	$sql = "INSERT INTO user (username,password,masinhvien,hoten)
    			VALUES ('$username','$password','$hoten','$masinhvien') ";
	    $kq=mysqli_query($conn,$sql);
	if ($kq) 
	{
		echo "Chúc mừng bạn đã đăng ký tài khoản thành công. <a href='http://localhost/dangkyhoc/login.php'>
							Đăng nhập ngay!
						</a>";
	}
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='DangKy.php'>Thử lại</a>";

  }
?>