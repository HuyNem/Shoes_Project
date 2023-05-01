<?php include './views/header_admin.php'; ?>


<div class="container">
    <div class="container w-50 mt-3">
        <h3 style="text-align: center;">Thêm sản phẩm</h3>
        <form method=POST enctype="multipart/form-data" action="product_add_action.php">
            <div class="row">
                <!-- Tên sản phẩm -->
                <div class="mb-3 mt-3">
                    <label for="tensp">Tên sản phẩm: </label>
                    <input type="text" class="form-control" id="tensp" name="tensp">
                </div>

                <!-- Số lượng -->
                <div class="mb-3">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" class="form-control" id="soluong" name="soluong">
                </div>

                <!-- Giá -->
                <div class="mb-3">
                    <label for="gia">Giá:</label>
                    <input type="number" class="form-control" id="gia" name="gia">
                </div>

                <!-- Ảnh -->
                <div class="mb-3">
                    <label for="anhsp">Ảnh sản phẩm:</label>
                    <input class="form-control" type="file" id="anhsp" name="anhsp">
                </div>
                <!-- Màu sản phẩm -->
                <div class="mb-3">
                    <label for="mausp">Màu sản phẩm</label>
                    <input type="text" class="form-control" id="mausp" name="mausp">
                </div>

                <!-- Kích thước -->
                <div class="mb-3">
                    <label for="kichthuoc">Kích thước</label>
                    <input type="number" class="form-control" id="kichthuoc" name="kichthuoc">
                </div>

                <!-- Tên thuong hiệu -->
                <div class="mb-3">
                    <label for="thuonghieu">Thương hiệu</label>
                    <select class="form-select" aria-label="Default select example" id="thuonghieu" name="thuonghieu">
                        <?php
                        require_once('./controllers/connect.php');
                        $lietke_sql = "SELECT MaThuongHieu, TenThuongHieu FROM thuonghieu";
                        $result = mysqli_query($conn, $lietke_sql);

                        while ($r = mysqli_fetch_assoc($result)) {
                        ?>

                            <option><?php echo $r['MaThuongHieu'];echo " ";
                                          echo $r['TenThuongHieu']; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="mota">Mô tả:</label>
                    <textarea type="text" class="form-control" id="mota" name="mota"> </textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>