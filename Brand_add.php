<?php
session_start();
if (isset($_SESSION["taikhoan"])) {
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/brand_add_style.css">
		<title>brand add</title>
	</head>

	<body>
		<!-- Content Header (Page header) -->
		

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-6" style="margin: 50px auto;">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Thêm thương hiệu</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form id="brand-form" method="POST" enctype="multipart/form-data" action="Brand_add_action.php">
								<div class="card-body">
									<div class="form-group">
										<label for="tenthuonghieu">Tên thương hiệu</label>
										<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" placeholder="Tên thương hiệu">
									</div>

									<!-- <div class="form-group">
										<label for="anhthuonghieu">Ảnh thương hiệu</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="anhthuonghieu" name="anhthuonghieu">
												<label class="custom-file-label" for="anhthuonghieu">Chọn ảnh</label>
											</div>
										</div>
									</div> -->

									<input type="file" name="anhthuonghieu">

									<div class="form-group">
										<label for="">Trạng thái: </label>
										<div class="form-check">
											<input class="form-check-input" type="radio" id="hien" name="rdCstatus" value=1 checked>
											<label class="form-check-label" for="hien">Hiện</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" id="an" name="rdCstatus" value=0>
											<label class="form-check-label" for="an">Ẩn</label>
										</div>
									</div>
								</div>

								<div class="card-footer">
									<button type="submit" class="btn btn-primary buttonadd">Thêm</button>
									<input type="Reset" class="btn btn-secondary" name="" id="">
									<a href="#" class="btn btn-danger buttoncancel">Hủy</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				// Xử lý sự kiện click cho button "Thêm"
				$(".buttonadd").click(function(event) {
					event.preventDefault(); // Ngăn chặn hành vi mặc định của button

					// Gửi yêu cầu AJAX để gọi đến trang xử lý Brand_add_action.php
					$.ajax({
						url: "brand_add_action.php",
						method: "POST",
						data: $("form").serialize(), // Lấy dữ liệu từ form và gửi đi
						success: function(response) {
							// Xử lý kết quả thành công (nếu cần)
							//alert("Thêm thương hiệu thành công");
							$(".content-wrapper").html(response);
						},
						error: function() {
							// Xử lý lỗi (nếu có)
							alert("Đã xảy ra lỗi khi thêm thương hiệu");
						}
					});
				});

				// Xử lý sự kiện click cho button "Hủy"
				$(".buttoncancel").click(function(event) {
					event.preventDefault(); // Ngăn chặn hành vi mặc định của button

					// Gửi yêu cầu AJAX để tải nội dung của trang brand_view.php
					$.ajax({
						url: "brand_view.php",
						method: "GET",
						success: function(response) {
							// Thay đổi nội dung của phần Content Wrapper bằng nội dung của trang brand_view.php
							$(".content-wrapper").html(response);
						},
						error: function() {
							// Xử lý lỗi (nếu có)
							alert("Đã xảy ra lỗi khi tải trang brand_view.php");
						}
					});
				});
			});
		</script>

		<?php
			} else {
				header("Location: login_admin.php");
				exit();
			}
		?>

	</body>

	</html>