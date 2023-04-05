<?php
    include "../admin/connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        // delete order_items
        $query = "DELETE FROM order_items where id = $id";
        $sth = $pdo->query($query);
        $sth->execute();
        // delete ordered
        $query2 = "DELETE FROM ordered where id_order = $id";
        $sth2 = $pdo->query($query2);
        $sth2->execute();
        if($sth2 == true and $sth == true) {
            $_SESSION['delete_order_main'] = "<div class='success'>  removed susscesfully</div>"; 
            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/order_main.php'</script>";
        }
    }
?>