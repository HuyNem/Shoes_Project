<?php
//lấy pid sửa
$mathuonghieu = $_GET['mathuonghieu'];

//kết nối csdl
require_once './controllers/connect.php';

//câu lệnh lấy thông tin sản phẩm có PID = $pid
$edit_sql = "SELECT * FROM thuonghieu WHERE mathuonghieu = $mathuonghieu";

$result = mysqli_query($conn, $edit_sql);
$r   = mysqli_fetch_assoc($result);

?>

<?php include './views/header_admin.php'; ?>
<body>
		<div class="container w-50 mt-3 abc">

			<h3 align=center>Sửa thương hiệu</h3>
			<form method=POST enctype="multipart/form-data" action="brand_edit_action.php">
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

				<button type="submit" class="btn btn-primary" value="Save">Sửa</button>
				<input type="Reset" class="btn btn-secondary" name="" id="">
				<a href="brand_view.php" class="btn btn-danger">Hủy</a>

			</form>
	</div>


</body>