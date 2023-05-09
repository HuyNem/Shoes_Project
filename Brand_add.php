<?php include './views/header_admin.php'; ?>

<style>

</style>

<body>
		<div class="container w-50 mt-3 abc">

			<h3 align=center>Thêm thương hiệu</h3>
			<form method=POST enctype="multipart/form-data" action="Brand_add_action.php">
				<div class="row">

					<div class="mb-3 mt-3">
						<label for="tenthuonghieu">Tên thương hiệu: </label>
						<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu">
					</div>

					<div class="mb-3 mt-3">
						<label for="anhthuonghieu">Ảnh thương hiệu: </label>
						<input type="file" class="form-control" id="anhthuonghieu" name="anhthuonghieu">
					</div>

					<div class="mb-3 mt-3">
						<label for="#">Trạng thái: </label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="rdCstatus" id="hien" value=1 checked>
							<label class="form-check-label" for="hien">
								Hiện
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="rdCstatus" id="an" value=0>
							<label class="form-check-label" for="an">
								Ẩn
							</label>
						</div>
					</div>

				</div>

				<button type="submit" class="btn btn-primary" value="Save">Thêm</button>
				<input type="Reset" class="btn btn-secondary" name="" id="">
				<a href="brand_view.php" class="btn btn-danger">Hủy</a>

			</form>
	</div>


</body>