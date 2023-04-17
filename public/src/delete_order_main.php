<?php
    include "../admin/connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM ordered where id_user = $id";
        $sth = $pdo->query($query);
        $sth->execute();
<<<<<<< HEAD
        // delete ordered
        $query2 = "DELETE FROM ordered where id_order = $id";
        $sth2 = $pdo->query($query2);
        $sth2->execute();
        if($sth2 == true and $sth == true) {
            $_SESSION['delete_order_main'] = "<div class='success'>  removed susscesfully</div>"; 
            echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/order_main.php'</script>";
=======
        if($sth == true) {
            $_SESSION['delete_order'] = "<div class='success'>  removed susscesfully</div>"; 
            echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/order_main.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
        }
    }
?>