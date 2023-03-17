<?php include "component/header.php" ?>

<main class="main">
    <div class="wrap_main">
        <h1>Edit Product</h1>
        <hr>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM product WHERE id=$id";
                $sth = $pdo->query($query);
                $row = $sth->fetch();
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-product">
                <tr>
                    <th>
                        ID_product:
                    </th>
                    <th>
                        <input type="text" name="id_product" value="<?php echo $row['id_product']?>">
                    </th>
                </tr>
                <tr>
                    <th>
                        Title:
                    </th>
                    <th>
                        <input type="text" name="title" value="<?php echo $row['titte']?>">
                    </th>
                </tr>
                <tr>
                    <td>
                        Current Image: 
                    </td>
                    <td>
                        <img src="../upload_img/product/<?php echo $row['img']?>" style="width: 90px;" alt="">   
                    </td>
                </tr>
                <tr>
                    <th>
                        New Images:
                    </th>
                    <th>
                        <input name="img" type="file">
                    </th>
                </tr>
                <tr>
                    <th>
                        Price:
                    </th>
                    <th>
                        <input type="text" name="price" value="<?php echo $row['price']?>">
                    </th>
                </tr>
                <tr>
                    <th>
                        Type:
                    </th>
                    <th>
                        <input type="text" name="type" value="<?php echo $row['type']?>">
                    </th>
                </tr>
                <tr>
                    <th>
                        <input type="hidden" value="<?php echo $id?>" name="id">
                        <input type="hidden"  value="<?php echo $row['img']?>" name="current_image" >
                        <input type="submit" class="btn btn-primary" name="submit">
                    </th>
                </tr>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $current_img = $_POST['current_image'];
                $img = $_FILES['img']['name'];
                if (isset($_FILES['img']['name'])) {
                    if ($img != "") {
                        $src = $_FILES['img']['tmp_name'];
                        $dst = "../upload_img/product/" . $img;
                        $upload = move_uploaded_file($src, $dst);
                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'> Failed Upload Image. </div>";
                            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
                            die();
                        }
                        $remove_path = "../upload_img/product/".$current_img;
                        $remove = unlink($remove_path);
                        if($remove == false) {
                            $_SESSION['failed-remove'] = "<div class='error'> Failed Upload Image. </div>";
                            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
                            die();
                        }
                    }else{
                        $img = $current_img;
                    }
                } else {
                    $img = "";
                }
                $query = "UPDATE product set id_product=?, titte=?, img=?, price=?, type=? WHERE id=?";
                $sth = $pdo->prepare($query);
                $sth->execute([
                    $_POST['id_product'],
                    $_POST['title'],
                    $img,
                    $_POST['price'],
                    $_POST['type'],
                    $_POST['id'],
                ]);
                $query2 = "UPDATE product_size set id_product=?";
                $sth2 = $pdo->prepare($query2);
                $sth2->execute([$_POST['id_product']]);
                if($sth == true && $sth2) {
                    $_SESSION['update'] = "<div class='success'> Product Updated successfully. </div>";
                    echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
                }
            }
        ?>
    </div>
</main>



<?php include "component/footer.php" ?>