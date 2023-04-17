<?php
include "../partialss/header.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sluong = $_GET['sluong'];
    $query = "UPDATE cart SET
        quantity = ?
        where id = ?
    ";
    // $res = $conn->query($sql);
    // if($res == true) {
    //     echo "<script>window.location = 'cart.php'</script>";
    // }else{
    //     echo "error";
    // }
    $sth = $pdo->prepare($query);
    $sth->execute([
        $sluong,
        $id
    ]);
    if($sth == true) {
<<<<<<< HEAD
        echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/cart.php'</script>";
=======
        echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/cart.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
    }
}
?>