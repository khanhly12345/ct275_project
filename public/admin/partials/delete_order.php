<?php
    include "component/header.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM ordered where id_user = $id";
        $sth = $pdo->query($query);
        $sth->execute();
        if($sth == true) {
            $_SESSION['delete_order'] = "<div class='success'>  removed susscesfully</div>"; 
            echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/order.php'</script>";
        }
    }
?>