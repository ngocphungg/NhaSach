<!doctype html>
<?php
include "../connectDB.php";
if(isset($_POST['btnLuuTK'])){
	//lấy các giá trị trên đk đưa vào biến
	$manv=$_POST['manv'];
	// $ten=$_POST['tennv'];
	$chucvu=$_POST['chucvu'];
	$email=$_POST['emailnv'];
	$pass=$_POST['pass'];
	if($chucvu=='Admin'){
		$idquyen=2;
	} else{
		$idquyen=1;
	}
	$selectMaNV="select idnv,manv from nhanvien where manv = '$manv'";
	$kt=mysqli_query($conn,$selectMaNV);
	if(mysqli_num_rows($kt) ==0){
		echo'<script>alert("Mã nhân viên không tồn tại, nhập mã khác!")</script>';
	} else{
		$row = mysqli_fetch_assoc($kt);
		$idnv= $row['idnv'];
		//thực hiện câu lệnh sql lưu data vào bảng trong db
		$insertTKNV="insert into taikhoan (idnv,idquyen,email,matkhau) 
		values ('$idnv','$idquyen','$email','$pass')";
		$kq=mysqli_query($conn,$insertTKNV);
		if($kq){
			echo'<script>alert("Thêm tài khoản thành công"); window.location.href="DSTaiKhoanNV.php" </script>';
		}else{
			echo'<script>alert("Thêm thất bại")</script>';			
		}
	}
}
//đóng kết nối
mysqli_close($conn);
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href ="admin.css" >
	

<title>ThemTKhoan</title>

</head>
<body>
	<div class="td">
		<h3 class="chu">NHÀ SÁCH CÓ ĐỦ CẢ</h3>
			<div class="tieude1">
				<div class="search-container">
					<input type="text" class="search-input" placeholder="Nhập từ khóa">
					<button class="search-button">Tìm kiếm</button>
				</div>
				<i class="fa-solid fa-envelope"></i>
				<i class="fa-solid fa-bell"></i>
				<a href="../Logout.php"><i class="fa-solid fa-right-from-bracket" ></i></a>
				<a href="NhanVien/HoSoUser.php"><i class="fa-solid fa-user"></i></a>
			</div>
	</div>
	
	<div class="nd">
		<div class="menu">
				<ul>
				<li ><a href="TrangChuAdmin.php"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
				<li ><a href="DSNhanVien.php"><i class="fa-solid fa-person"></i>Quản Lý Nhân Viên</a>
					<ul class="sub-menu">
						<li ><a href="DSNhanVien.php">Danh sách nhân viên</a></li>
						<li class ="nd1"><a href="DSTaiKhoanNV.php">Danh sách tài khoản nhân viên</a></li>
						<li><a href="ChamCongNV.php">Chấm công nhân viên</a></li>
					</ul>
				</li>
				<li><a href="DSDonHang.php"><i class="fa-solid fa-cart-shopping"></i>Quản Lý Đơn Hàng</a>
					<ul class="sub-menu">
						<li><a href="DSDonHang.php">Danh sách đơn hàng</a></li>
						<li><a href="#">Tình trạng đơn hàng</a></li>
					</ul>		
				</li>	
				<li><a href="DSSach.php"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li><a href="DSSach.php">Danh sách Sách</a></li>
						<li ><a href="NhapSachAdmin.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href=""><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li><a href="#">Danh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
			</li>
		</div>
		<!-- Thong tin nhap sach -->
		<div class="content">
			<form method="post" action="">
			<h4>THÊM TÀI KHOẢN</h4>
			<div class="form-container">
				<div class="form-group">
					<label for="tuoi">Mã Nhân Viên</label>
					<input type="text" id="tuoi" name="manv">
				</div>
			<!-- <div class="form-group">
				<label for="tuoi">Họ Tên</label>
				<input type="text" id="tuoi" name="tennv">
			</div> -->
			<div class="form-group">
				<label for="sdt">Email</label>
				<input type="email" id="sdt" name="emailnv">
			</div>
			<div class="form-group">
				<label for="sdt">Mật Khẩu</label>
				<input type="password" id="sdt"name="pass">
			</div>
			<div class="form-group">
				<label for="sdt">Chức Vụ</label>
				<select name="chucvu">
					<option>Chọn Chức vụ</option>
					<option>Admin</option>
					<option>Nhân Viên</option>
				</select>
			</div>
			
		</div>
		<div class="buttons-container">
			<button name="btnLuuTK">Lưu</button>
			</div>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<div class="container1">
			<footer class="py-31 my-41">
				<ul class="nav justify-content-center1 border-bottom1 pb-31 mb-31">
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">Home</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">FAQs</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">About</a></li>
				</ul>
				<p class="text-center1 text-body-secondary1">© 2024 Company, Inc</p>
			</footer>
	</div>
		
</body>
</html>