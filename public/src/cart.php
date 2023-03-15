<?php include "../partialss/header.php"?>
<!-- body -->
<main class="body">
    <div class="container">
        <div class="row-cart">
            <div class="col-3">
                <p1>Trang chủ</p1>
            <a style="text-decoration: none; color: #20c997;"  href="">Giỏ hàng</a>
            </div>
            <hr>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: center;">
        <div class="row row-cart">
            <form action="" method="POST">
                <div class="cart-details">
                    <?php 
                    // if(isset($_POST['submit'])) {
                        try {
                            $query = "SELECT * from cart c join product p on c.id_product = p.id";
                            $sth = $pdo->query($query);
                            $sth->execute();
                            $count = 0;
                            $n = -1;
                            while($row = $sth->fetch()) {
                                $count = $count + $row['quantity'] * $row['price'];
                                $n++;
                            ?>
                            <div class="header-cart">
                                <div class="img-cart" style="width: 20%">
                                    <img src="../admin/upload_img/product/<?php echo $row['img']?>" style="width: 80%;" alt="">
                                    <a href="http://localhost:8080/Project_ct275/public/src/delete_cart.php?id=<?php echo $row['0']?>" style="text-decoration: none;">
                                        <div class="delete">X</div>
                                    </a>
                                </div>
                                <div class="title-cart" style="width: 50%">
                                    <?php echo $row['titte']?>
                                    <div class="gam-cart">
                                        <?php echo $row['size']?>
                                    </div>
                                </div>
                                <div class="price-cart" style="width: 30%">
                                    <div style="color: #f30c28;">
                                        <?php echo currency_format($row['quantity'] * $row['price'])?>                   
                                    </div>
                                    <div class="choosenumber">
                                        <div class="minus1" onclick="Minus('<?php echo $n?>', <?php echo $row[0]?> )">
                                            -
                                        </div>
                                        <input type="text" class="number1" value="<?php echo $row['quantity']?>" name="sluong">
                                        <div class="plus1" onclick="Plus('<?php echo $n?>', <?php echo $row[0]?> )">
                                            +
                                        </div>
                                        <input type="hidden" value="" name="sluong"></input>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        <?php
                            }
                        }catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    
                    <!-- footer cart -->
                    <div class="price-total">
                        <div class="header-total">
                            <div><strong>Tổng Tiền:</trong>
                            </div>
                            <div class="price-total-2" style="color: red;">
                                <?php echo currency_format($count);?>
                            </div>
                            <input type="hidden" name="total" value="">
                        </div>
                        <button class="order" name="submit">MUA NGAY</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
</main>
<script src="cart.js"></script>
<hr>

<?php include "../partialss/footer.php"?>
