<?php include "../partialss/header.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM cart where id= $id";
    $sth = $pdo->query($query);
    $sth->execute();
    if($sth == true) {
        echo "<script>window.location = 'cart.php'</script>";
    }   
}


?>