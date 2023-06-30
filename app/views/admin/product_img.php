<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kích thước sản phẩm</title>
</head>

<body>
    <?php include '../admin/view_admin.php'; ?>
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kích thước</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Kích thước</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //kết nối csdl
                                    require_once('../../controllers/connect.php');

                                    //câu lệnh liệt kê
                                    $lietke_sql = "SELECT * FROM kichthuocsp ORDER BY id, kichthuoc";

                                    //thực thi câu lệnh
                                    $result = mysqli_query($conn, $lietke_sql);

                                    //duyệt qua result và in ra
                                    while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
                                    ?>
                                        <tr>
                                            <td><?php echo $r['id']; ?></td>
                                            <td><?php echo $r['kichthuoc']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Sửa</a>
                                                <a href="#" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <a href="#" class="btn btn-success" style="margin-bottom: 20px;">Thêm</a>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </session>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        </script>

        <script>
            $(function() {
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.btn-delete').attr('href', $(e.relatedTarget).data('href'));
                });
            });
        </script>

</body>

</html> -->