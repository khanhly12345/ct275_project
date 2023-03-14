
<?php include "../partialss/header.php"?>
<?php 
    if(isset($_POST['submit'])) {
        $value = $_POST['search'];
        $query = "SELECT * FROM product where titte LIKE '%$value%'";
        $sth = $pdo->query($query);
        $sth->execute();
        $count = 0;
        $count = $sth->rowCount();
    }
?>
<body class="body">
    <div class="container">
        <h1>Két Qủa Tìm Kiếm: <?php echo $count?></h1>
        <hr>
        <div class="row row-clothers">
            <?php 
                while($row = $sth->fetch()) {
                    ?>
                    <div class="col-3 buy_hover">
                        <img style="height: 70%;" src="../admin/upload_img/product/<?php echo $row['img']?>" alt="">
                        <a href=""style="text-decoration:none;"><p><?php echo $row['titte']?></p></a>
                        <div class="w_span">
                            <span style="color: #20c997;"><?php echo currency_format($row['price'])?></span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>  
                        <div class="buy">
                            <a href="details.php?id=<?php echo $row['id_product']?>">Mua hàng</a>
                        </div>    
                    </div>
                <?php
                }         
            ?>

                
        </div>
        
    </div>
</body>
<?php include "../partialss/footer.php"?>