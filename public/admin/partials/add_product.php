<?php
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header class="header">
    <div class="wrap_header">
      <ul>
        <li><a href="">Users</a></li>
        <li><a href="">Product</a></li>
        <li><a href="">Order</a></li>
      </ul>
    </div>
  </header>
  <main class="main">
    <div class="wrap_main">
      <h1>ADD PRODUCT</h1>
      <?php
        if(isset($_SESSION['upload'])) {
          echo  $_SESSION['upload'];
          unset($_SESSION['upload']);
        }
      ?>
      <hr>
      <form action="" method="POST" class="form_add" enctype="multipart/form-data">
        <label for="ma_sp">Mã sản phẩm:</label>
        <input type="text" id="ma_sp" name="ma_sp"><br>

        <label for="ten_sp">Tên sản phẩm:</label>
        <input type="text" id="ten_sp" name="ten_sp"><br>

        <label for="img">Hình ảnh:</label>
        <input type="file" name="img" id="img"><br>

        <label for="gia">Giá:</label>
        <input type="text" id="gia" name="gia"><br>

        <label for="type">Kiểu:</label>
        <input type="text" id="type" name="type"><br>

        <fieldset>
          <legend>Kích thước:</legend>

          <div>
            <label for="s">Size S:</label>
            <input type="text" id="s" name="s">
          </div>

          <div>
            <label for="m">Size M:</label>
            <input type="text" id="m" name="m">
          </div>

          <div>
            <label for="l">Size L:</label>
            <input type="text" id="l" name="l">
          </div>

        </fieldset>

        <input type="submit" class="btn btn-primary" name="submit" value="Thêm sản phẩm">
      </form>
      <?php
      if (isset($_POST['submit'])) {
        $masp = $_POST['ma_sp'];
        $tensp = $_POST['ten_sp'];
        $img = rand(1, 1000).$_FILES['img']['name'];
        $gia = $_POST['gia'];
        $kieu = $_POST['type'];
        // size
        $s = $_POST['s'];
        $m = $_POST['m'];
        $l = $_POST['l'];
        if(isset($_FILES['img']['name'])) {
          if($img != "") {
            $src = $_FILES['img']['tmp_name'];
            $des = "../upload_img/product/".$img;
            $upload = move_uploaded_file($src, $des);
            if($upload == false) {
              $_SESSION['upload'] = "<div class='error'> Failed Upload Image. </div>";
              echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/add_product.php'</script>";
            }else{
              try{
                $query = "INSERT INTO product (id_product, img, titte, price, type) VALUES (?,?,?,?,?)";
                $sth = $pdo->prepare($query);
                $sth->execute([
                  $masp,
                  $img,
                  $tensp,
                  $gia,
                  $kieu
                ]);
                // add size
                $query2 = "INSERT INTO product_size (id_product,s,m,l) VALUES (?,?,?,?)";
                $sth2 = $pdo->prepare($query2);
                $sth2->execute([
                  $masp,
                  $s,
                  $m,
                  $l
                ]);
                if($sth == true) {
                  $_SESSION['add'] = "<div class='success'> Product Added successfully. </div>";
                  echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
                }else{
                  $_SESSION['add'] = "<div class='error'> Failed to add product. </div>";
                  echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/add_product.php'</script>";
                }
              }catch(PDOException $e){
                echo $e->getMessage();
              }
            }
          }
        }
      }
      ?>
    </div>
  </main>
  <footer class="footer">
    <div class="wrap_footer">
      &copy; Designed by Khanh Ly
    </div>
  </footer>
</body>

</html>