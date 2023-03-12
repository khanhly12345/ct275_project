<?php include "component/header.php";
    if(isset($_GET['id']) && isset($_GET['img'])) {
        $id = $_GET['id'];
        $img = $_GET['img'];
        $query = "DELETE FROM product where id_product=$id";
        $sth = $pdo->query($query);
        $sth->execute();
        // delete product_size
        $query2 = "DELETE FROM product_size where id_product=$id";
        $sth2 = $pdo->query($query2);
        $sth2->execute();
        if($sth==true && $sth2==true) {
            $path = "../upload_img/product/".$img;
            $remove = unlink($path);
            if($remove == false) {
                $_SESSION['delete_product'] = "<div class='error'> faile to remove product image</div>";
                echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
                die();
            }else{
                $_SESSION['delete_product'] = "<div class='success'>  removed susscesfully</div>";
                echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/manager_product.php'</script>";
            }
        }else{
            echo "loi 0";
        }
    }else{
        echo "loi 1";
    }
?>
