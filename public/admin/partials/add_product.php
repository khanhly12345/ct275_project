<?php include "component/header.php" ?>
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
        <table>
          <tbody>
                <tr>
                    <th><label for="ma_sp">Mã sản phẩm:</label></th>
                    <th><input type="text" id="ma_sp" name="ma_sp"><br></th>
                </tr>
                <tr>
                    <th><label for="ten_sp">Tên sản phẩm:</label></th>
                    <th><input type="text" id="ten_sp" name="ten_sp"><br></th>
                </tr>
                <tr>
                    <th><label for="img">Hình ảnh:</label></th>
                    <th><input type="file" name="img" id="img"><br></th>
                </tr>
                <tr>
                    <th><label for="gia">Giá:</label></th>
                    <th><input type="text" id="gia" name="gia"><br></th>
                </tr>
                <tr>
                    <th><label for="type">Kiểu:</label></th>
                    <th><input type="text" id="type" name="type"><br></th>
                </tr>
                <tr>
                    <th>Kích thước:</th>
                </tr>
                <tr>
                  <th><label for="s">Size S:</label></th>
                  <th><input type="text" id="s" name="s"></th>
                </tr>
                <tr>
                  <th><label for="m">Size M:</label></th>
                  <th><input type="text" id="m" name="m"></th>
                </tr>
                <tr>
                  <th><label for="l">Size L:</label></th>
                  <th><input type="text" id="l" name="l"></th>
                </tr>
                <tr>
                  <th><input type="submit" class="btn btn-primary" name="submit" value="Thêm sản phẩm"></th>
                </tr>
          </tbody>
        </table>
        
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
  <?php include "component/footer.php" ?>