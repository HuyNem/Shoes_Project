<div class="container h-100"> <!-- Khởi tạo bao quanh website -->
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-2">
            <div class="row justify-content-center">
              <p class="text-center h2 fw-bold mb-4 mx-1 mx-md-3 mt-3">Đăng ký</p>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">



                <form class="col-md-12" action="register_customer_action.php" method="post"> <!-- Tạo cột -->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="hoten"><i class="bi bi-person-vcard"></i> Họ và tên</label>
                      <input type="text" id="hoten" class="form-control form-control-lg py-1" required name="hoten" autocomplete="off" placeholder="Họ và tên" style="border-radius:25px ;" required />
                    </div>
                  </div>

                  <!-- Email dang nhap -->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="taikhoan"><i class="bi bi-person-circle"></i> Tài khoản</label>
                      <input type="input" id="taikhoan" class="form-control form-control-lg py-1" required name="taikhoan" autocomplete="off" placeholder="Tài khoản" style="border-radius:25px ;" />
                    </div>
                  </div>

                  <!--Password-->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="matkhau"><i class="bi bi-chat-left-dots-fill"></i> mật khẩu</label>
                      <input type="password" id="matkhau" class="form-control form-control-lg py-1" required name="matkhau" autocomplete="off" placeholder="Mật khẩu" style="border-radius:25px ;" />
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email"><i class="bi bi-envelope"></i> Email</label>
                      <input type="email" id="email" class="form-control form-control-lg py-1" required name="email" autocomplete="off" placeholder="Email" style="border-radius:25px ;" />
                    </div>
                  </div>
                  <!-- So Dien Thoai  -->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="sodienthoai"><i class="bi bi-telephone"></i> Số điện thoại</label>
                      <input type="number" id="sodienthoai" class="form-control form-control-lg py-1" required name="sodienthoai" autocomplete="off" placeholder="Số điện thoại" style="border-radius:25px ;" />
                    </div>
                  </div>
                  <!-- Dia Chi -->
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="diachi"><i class="bi bi-house"></i> Địa chỉ</label>
                      <input type="text" id="diachi" class="form-control form-control-lg py-1" required name="diachi" autocomplete="off" placeholder="Địa chỉ" style="border-radius:25px ;" />
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" value="Đăng ký" name="register" class="btn btn-warning btn-lg text-light my-2 py-1" style="width:100% ; border-radius: 30px; font-weight:600;" style="border-radius:25px ;" />

                  </div>

                </form>
                <p align=""> <i class="fas fa-lock fa-lg me-3 fa-fw"></i> Bạn đã có tài khoản? <a href="index.php" class="text-warning" style="font-weight:600; text-decoration:none;">Đăng nhập</a></p>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./image/signup.jpg" class="img-fluid" alt="Sample image" width="500px">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  

  <section class="vh-50">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="./image/login.jpg" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="login_customer_action.php" method="post">
            <p class="text-center h2 fw-bold mb-4 mx-1 mx-md-3 mt-3">Đăng nhập</p>
            <!-- Email input : Nhập Email-->
            <div class="form-outline mb-4">
              <label class="form-label" for="taikhoan"> <i class="bi bi-person-circle"></i> Tài khoản</label>
              <input type="text" id="taikhoan" class="form-control form-control-lg py-2" name="taikhoan" autocomplete="off" placeholder="nhập email của bạn" style="border-radius:25px ;" />

            </div>

            <!-- Password input : Nhập mật khẩu-->
            <div class="form-outline mb-4">
              <label class="form-label" for="matkhau"><i class="bi bi-chat-left-dots-fill"></i> Mật khẩu</label>
              <input type="password" id="matkhau" class="form-control form-control-lg py-2" name="matkhau" autocomplete="off" placeholder="nhập mật khẩu của bạn" style="border-radius:25px ;" />
            </div>


            <!-- Submit button : Nút chuyển trang -->
            <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" value="Login" name="login" class="btn btn-warning btn-lg text-light my-2 py-2" style="width:100% ; border-radius: 30px; font-weight:600;" />
            </div>

          </form>
          <p align="center">Tôi chưa có tài khoản <a href="register_customer.php" class="text-warning" style="font-weight:600;text-decoration:none;">đăng ký tại đây</a></p>
        </div>
      </div>
    </div>
  </section>