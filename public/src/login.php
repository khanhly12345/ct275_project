<?php include "../partialss/header.php"?>
<!-- body -->
<main class="body">
    <div class="container containerlogin">
        <section class="vh-100" style="background-color: #ffffff;">
            <div class="container py h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem; border: 2px solid rgba(0,0,0,.125); background-color: #f2fff8;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block"><br><br>
                        <img src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 1rem 1rem 1rem;" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
          
                            <form action="" method="POST">
                                <div class="d-flex align-items-center mb-3 pb-1">
                                <i style="padding-right:5px ;"><img src="../images/logo/logo.webp" alt=""></i>
                                <span class="h1 fw-bold mb-0">VEMOUSE</span>
                                </div>
            
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập với tài khoản của bạn</h5>
                                <?php 
                                      if(isset($_SESSION['check_login'])) {
                                          echo $_SESSION['check_login'];
                                          unset($_SESSION['check_login']);
                                      }
                                      if(isset($_SESSION['check_details'])) {
                                          echo $_SESSION['check_details'];
                                          unset($_SESSION['check_details']);
                                      }
                                ?>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Tài khoản</label>
                                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="account" placeholder="Nhập tài khoản"/>
                                </div>
            
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Mật Khẩu</label>
                                    <input type="password" id="form2Example27" class="form-control form-control-lg"  name="password" placeholder="Nhập mật khẩu"/>
                                </div>
            
                                <div class="pt-1 mb-4">
                                <button class="btn btn-success btn-lg btn-block" style="margin-top: 0px" name="submit" type="submit">Đăng nhập</button>
                                </div>
            
                                <a style="text-decoration: none;" class="small text-muted" href="#!">Quên mật khẩu?</a>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a style="text-decoration: none;" href="#!"
                                    style="color: #393f81;">Đăng kí tại đây</a></p>
                                <a style="text-decoration: none;" href="#!" class="small text-muted">Điều khoản sử dụng.</a>
                                <a style="text-decoration: none;" href="#!" class="small text-muted">Chính sách bảo mật
                            </form>
                            <?php
                                if(isset($_POST['submit'])) {
                                    $account = $_POST['account'];
                                    $password = md5($_POST['password']);
                                    try{
                                        $query = "SELECT id, account, password FROM users WHERE account = '$account' AND password = '$password'";
                                        $sth = $pdo->query($query);
                                        $sth->execute();
                                        $count = $sth->rowCount();
                                        $row = $sth->fetch();
                                        if($count > 0) {
                                            $_SESSION['check_login'] = "<div class='success'> Đăng nhập thành công </div>";
                                            $_SESSION['user'] = $row['id'];
                                            // $_SESSION['exit'] = "<a style='position: relative; top:10px;' href='http://localhost:8080/Project_ct275/public/src/logout.php'> Thoát </a>"; 
                                            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/'</script>"; 
                                        }else{
                                            $_SESSION['check_login'] = "<div class='error'> Tài khoản hoặc mật khẩu không đúng! </div>";
                                            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/login.php'</script>";
                                        }
                                    }catch(PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                }
                            ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
</main><br>

<?php include "../partialss/footer.php"?>