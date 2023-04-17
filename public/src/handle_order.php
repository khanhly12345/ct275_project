<<<<<<< HEAD
<?php 
    // include "../partialss/header.php";
    // if(isset($_POST['submit'])) {
    //     $id_user = $_POST['id_user'];
    //     $query = "SELECT * FROM cart where id_user = $id_user";
    //     $sth= $pdo->query($query);
    //     $sth->execute();
    //     while($row = $sth->fetch()){
    //         $query1 = "INSERT INTO ordered (id_user, id_product, size, quantity) VALUES (?, ?, ?, ?)";
    //         $sth1 = $pdo->prepare($query1);
    //         $sth1->execute([
    //             $row['id_user'],
    //             $row['id_product'],
    //             $row['size'],
    //             $row['quantity']
    //         ]);
    //     }
    //     $query2 = "DELETE FROM cart WHERE id_user=$id_user";
    //     $sth2 = $pdo->query($query2);
    //     $sth2->execute();
    //     echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/cart.php'</script>";
    // }
?>

=======
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
<?php include "../partialss/header.php";
    if(isset($_POST['submit'])) {
        $id_user = $_POST['id_user'];
        $query = "SELECT * FROM cart where id_user = $id_user";
        $sth= $pdo->query($query);
        $sth->execute();
        while($row = $sth->fetch()){
            $query1 = "INSERT INTO ordered (id_user, id_product, size, quantity) VALUES (?, ?, ?, ?)";
            $sth1 = $pdo->prepare($query1);
            $sth1->execute([
                $row['id_user'],
                $row['id_product'],
                $row['size'],
                $row['quantity']
            ]);
        }
<<<<<<< HEAD
        $query5 = "DELETE FROM cart WHERE id_user=$id_user";
        $sth5 = $pdo->query($query5);
        $sth5->execute();
        echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/cart.php'</script>";
        
=======
        $query2 = "DELETE FROM cart WHERE id_user=$id_user";
        $sth2 = $pdo->query($query2);
        $sth2->execute();
        echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/cart.php'</script>";
        // if($sth2 && $sth && $st1) {
        //     $_SESSION['ordered'] = "<div class='error'>giỏ hàng trống!</div>";
        // }
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
    }
?>
