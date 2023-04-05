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
    //     echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/cart.php'</script>";
    // }
?>

<?php include "../partialss/header.php";
    if(isset($_POST['submit'])) {
        $id_user = $_POST['id_user'];
        // query cart
        $query = "SELECT * FROM cart c join product p on c.id_product = p.id where id_user = $id_user";
        $sth= $pdo->query($query);
        $sth->execute();
        $total = 0;
        while($row = $sth->fetch()) {
            $total += ($row['price'] * $row['quantity']);
        }
        // insert order_items
        $query2 = "INSERT INTO order_items (user_id, total) VALUES (?, ?)";
        $sth2 = $pdo->prepare($query2);
        $sth2->execute([
            $id_user,
            $total
        ]);
        
        // select order_items
        $query_items = "SELECT * FROM order_items where user_id=$id_user order by id DESC";
        $sth_items = $pdo->query($query_items);
        $sth_items->execute();
        $row_items = $sth_items->fetch();
        echo $row_items['id'];
        // insert ordered
        $query3 = "INSERT INTO ordered (id_order, id_product, size, quantity) VALUES (?, ?, ?, ?)"; 
        $sth3 = $pdo->prepare($query3);
        // select cart 2
        $query4 = "SELECT * FROM cart c where id_user = $id_user";
        $sth4 = $pdo->query($query4);   
        while($row4 = $sth4->fetch()) {
            $sth3->execute([
                $row_items['id'],
                $row4['id_product'], 
                $row4['size'],
                $row4['quantity']
            ]);
            echo $row4['id_product'].$row4['size'].$row4['quantity'];
        }
        $query5 = "DELETE FROM cart WHERE id_user=$id_user";
        $sth5 = $pdo->query($query5);
        $sth5->execute();
        echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/cart.php'</script>";
        
    }
    
    
    
    include "../partialss/footer.php";
?>
