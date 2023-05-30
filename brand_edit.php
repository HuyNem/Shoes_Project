<?php
	session_start();
	if ($_SESSION["login"] == FALSE){
		//phải đăng nhập thì mới cho vào
		$_SESSION["login_error"] = "Please login!";
		header("Location: login_customer.php");
	}
	if (!isset($_SESSION["brand_edit_error"]))
			$_SESSION["brand_edit_error"]="";
			
	$mathuonghieu = $_REQUEST["mathuonghieu"];
	require("./controllers/connect.php");
	$sql = "select * from thuonghieu where MaThuongHieu=".$mathuonghieu;
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows>0){
		$r = $result->fetch_assoc();
	}

?>

<?php include './views/header_admin.php'; ?>
<body>
		<div class="container w-50 mt-3 abc">

			<h3 align=center>Sửa thương hiệu</h3>
			<form method="POST" enctype="multipart/form-data" action="brand_edit_action.php">
				<div class="row">

					<div class="mb-3 mt-3">
						<label for="tenthuonghieu">Tên thương hiệu: </label>
						<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" value="<?php echo $r['TenThuongHieu']; ?>">
					</div>

					<div class="mb-3 mt-3">
						<label for="anhthuonghieu">Ảnh thương hiệu: </label>
                        <img class="rounded mx-auto d-block" src="./image/brand/<?php echo $r["Anh"];?>" width="200px" style="padding-bottom: 10px;">
						<input type="file" class="form-control" id="anhthuonghieu" name="anhthuonghieu">
					</div>

					<div class="mb-3 mt-3">
						<label for="#">Trạng thái: </label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="rdCstatus" id="hien" value=1 <?php if ($r["Status"]==1) echo " checked ";?>  checked>
							<label class="form-check-label" for="hien">
								Hiện
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="rdCstatus" id="an" <?php if ($r["Status"]==0) echo " checked ";?> >
							<label class="form-check-label" for="an">
								Ẩn
							</label>
						</div>
					</div>

				</div>
				<input type="hidden" value="<?php echo $mathuonghieu; ?>" name="mathuonghieu">
				<button type="submit" class="btn btn-primary" value="Save">Sửa</button>
				<input type="Reset" class="btn btn-secondary" name="" id="">
				<a href="brand_view.php" class="btn btn-danger">Hủy</a>

			</form>
	</div>


</body>