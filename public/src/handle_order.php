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
        $query2 = "DELETE FROM cart WHERE id_user=$id_user";
        $sth2 = $pdo->query($query2);
        $sth2->execute();
        echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/cart.php'</script>";
        // if($sth2 && $sth && $st1) {
        //     $_SESSION['ordered'] = "<div class='error'>giỏ hàng trống!</div>";
        // }
    }
?>