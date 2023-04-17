<?php include "../partialss/header.php"?>
    <main><div class="body" style="margin-bottom: 50px">
            <div class="container">
                <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div  class="card-body p-1 ">
              <h1 class="text-uppercase text-center mb-2">Đăng ký tài khoản</h1>
              <?php
                if(isset($_SESSION['check_passwork'])) {
                  echo $_SESSION['check_passwork'];
                  unset($_SESSION['check_passwork']);
                }
              ?>
              <form action="" method="POST" id="validation" style="padding-left: 40px;">
              
                <div class="form-outline">
                  <label class="form-label" for="form3Example1cg">Họ Tên</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example1cg" class="form-control form-control-lg" name="fullname" required/>                  
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example3cg">Tài khoản</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example3cg" class="form-control form-control-lg" name="account" required/>
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                  <input style="font-size: x-small;"  type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required/>
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                  <input style="font-size: x-small;"  type="password" id="form3Example4cdg" class="form-control form-control-lg" name="same_password" required/>
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example4cd">Nhập số điện thoại</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example4cd" class="form-control form-control-lg" name="sdt" required/>
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example4">Nhập tỉnh thành</label>
                  <input style="font-size: x-small;" type="text" id="form3Example4" class="form-control form-control-lg" name="city" required/>
                </div>
                <div class="form-outline">
                  <label class="form-label" for="form3Example4c">Nhập huyện</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example4c" class="form-control form-control-lg" name="district" required/>
                </div>
                <div class="form-check d-flex justify-content-center mb-3">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" name="agree" required/>
                  <label class="form-check-label" for="form2Example3g">
                    Tôi đồng ý tất cả điều khoản của <a href="#!" class="text-body"><u>đội dịch vụ</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-white">Đăng ký</button>
                </div>

                <p class="text-center text-muted mb-0">Bạn đã có tài khoản? <a href="/ct275-project-Taib2014783/public/src/login.php"
                    class="fw-bold text-body"><u>Đăng nhập tại đây!</u></a></p>

              </form>
              <?php
                  if(isset($_POST['submit'])) {
                      $fullname = $_POST['fullname'];
                      $account = $_POST['account'];
                      $password = md5($_POST['password']);
                      $same_password = md5($_POST['same_password']);
                      $phone = $_POST['sdt'];
                      $city = $_POST['city'];
                      $district = $_POST['district'];
                      echo $password;
                      echo $same_password;
                      if($password != $same_password) {
                        $_SESSION['check_passwork'] = "<div class='error'> Hai mật khẩu không khớp! </div>";
                        echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/reg.php'</script>";
                      }else{
                        $query = "INSERT INTO users (account, password, fullname, phone, city, district) VALUES (?,?,?,?,?,?)";
                        $sth = $pdo->prepare($query);
                        $sth->execute([
                          $account,
                          $password,
                          $fullname,
                          $phone,
                          $city,
                          $district
                        ]);
                        if($sth == true) {
                          $_SESSION['check_passwork'] = "<div class='success'> Đăng ký thành công </div>";
                          echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/reg.php'</script>";
                        }
                      }
                  }
              ?>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

            </div>
         </div>
    </main>
    <!-- footer -->
    <?php include "../partialss/footer.php"?>