<?php include "../partialss/header.php"?>
<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id=$id";
        $sth = $pdo->query($query);
        $sth->execute();
        $row = $sth->fetch();
    }
    
?>
<main><div class="body">
        <div class="container">
                <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div  class="card-body p-1 ">
              <h1 class="text-uppercase text-center mb-2">Chỉnh sửa tài khoản</h1>
              <form action="" method="POST" style="padding-left: 40px;">
              
                <div class="form-outline">
                  <label class="form-label" for="form3Example1cg">Họ Tên</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example1cg" class="form-control form-control-lg" name="fullname" value="<?php echo $row['fullname']?>"/>                  
                </div>
                <div class="form-outline">
                  <label class="form-label" for="form3Example4cdg">số điện thoại</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example4cdg" class="form-control form-control-lg" name="phone" value="<?php echo $row['phone']?>"/>
                </div>

                <div class="form-outline">
                  <label class="form-label" for="form3Example4cdg">tỉnh thành</label>
                  <input style="font-size: x-small;" type="text" id="form3Example4cdg" class="form-control form-control-lg" name="city" value="<?php echo $row['city']?>"/>
                </div>
                <div class="form-outline">
                  <label class="form-label" for="form3Example4cdg">huyện</label>
                  <input style="font-size: x-small;"  type="text" id="form3Example4cdg" class="form-control form-control-lg" name="district" value="<?php echo $row['district']?>"/>
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-white" style="padding: 5px 40px 5px 40px;margin-top: 15px"> Gửi </button>
                </div>

                <p class="text-center text-muted mb-0">Bạn đã có tài khoản? <a href="#!"
                    class="fw-bold text-body"><u>Đăng nhập tại đây!</u></a></p>

              </form>
              <?php 
                if(isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $fullname = $_POST['fullname'];
                    $phone = $_POST['phone'];
                    $city = $_POST['city'];
                    $district = $_POST['district'];
                    $query = "UPDATE users SET fullname=?, phone=?, city=?, district=? WHERE id = $id";
                    $sth = $pdo->prepare($query);
                    $sth->execute([
                      $fullname,
                      $phone,
                      $city,
                      $district
                    ]);
                    if($sth == true) {
<<<<<<< HEAD
                      echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/'</script>";
=======
                      echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
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
<?php include "../partialss/footer.php"?>