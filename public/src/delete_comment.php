<?php include "../partialss/header.php";?>
<?php 
    if(isset($_GET['id_comment']) AND isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
        $id_comment = $_GET['id_comment'];
        $query = "DELETE FROM comment WHERE id = $id_comment";
        $sth = $pdo->query($query);
        $sth->execute();
        if($sth) {
            echo "<script>window.location = 'details.php?id=$id_product'</script>";
        }
    }

?>