<?php include "../partialss/header.php"?>
<?php 
    // check user
    if(!isset($_SESSION['user'])) {
        $_SESSION['check_details'] = "<div class='error'>Bạn cần đăng nhập để xem chi tiết sản phẩm! </div>";
        echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/login.php'</script>"; 
    }

?>
<main class="body">
        <div class="container">
            <div class="row-cart">
                <div class="col-3">
                    <p1>Trang chủ</p1>
                <a style="text-decoration: none; color: #20c997;"  href="">Đơn hàng</a>
                </div>
                <hr>
            </div>
        </div>
        <div class="container">
        <table class="table table-bordered  ">
            <thead>
            </thead>
            <tbody>
                <?php 
                    $qr = "SELECT * FROM ordered";
                    $st = $pdo->query($qr);
                    $st->execute();
                    $count = $st->rowCount();
                    if($count == 0) {
                        echo "<div class='error'>Đơn đặt hàng trống !</div>";
                    }
                ?>
                <?php 
                    try{
                            $user = $_SESSION['user'];
                            $n = 0;
                            $query = "SELECT * FROM ordered o join users u on o.id_user = u.id where o.id_user = $user";
                            $sth = $pdo->query($query);
                            $sth->execute();
                            $temp = 0;
                            $total = 0;
                            $count_user = $sth->rowCount();
                            if($count_user == 0) {
                                echo "<div class='error ' style='position: relative; left: 40%; margin: 20px 0 20px 0;'> giỏ hàng của bạn trống !</div>";
                            }
                            while($row = $sth->fetch()) {
                                if($temp != $row['id_user']) {
                                    $temp = $row['id_user'];
                                    $n++;
                                ?>
                                <tr>
                                    
                                    <th colspan="6">
                                        <?php echo  $n . '.' . 'Tên: ' . $row['fullname'] . "<br>". 'SĐT: '. $row['phone'].'<br>'. 'Thành Phố: ' . $row['city'] . "<br>". 'Huyện: ' . $row['district']?>
                                    </th>
                                <?php
                                    $query2 = "SELECT * FROM ordered o join product p on o.id_product = p.id where o.id_user = $temp";  
                                    $sth2 = $pdo->query($query2);
                                    $sth2->execute();
                                    $temp2 = 0;
                                    while($row2 = $sth2->fetch()) {
                                        $total = $total + ($row2['price'] * $row2['quantity']);
                                    ?>
                                    <tr>
                                        <th><img src="../admin/upload_img/product/<?php echo $row2['img']?>" style="width: 90px">
                                        </th>
                                        <th style="width: 20%;">
                                            <?php echo $row2['titte']?>
                                        </th>
                                        <th style="width: 10%;">
                                            <?php echo $row2['size']?>
                                        </th>
                                        <th>
                                            <?php echo currency_format($row2['price'])?>
                                        </th>
                                        <th>
                                            <?php echo $row2['quantity']?>
                                        </th>
                                        <th>
                                            <?php echo $row2['date']?>
                                        </th>
                                    </tr>
                                    
                            <?php   
                            // while 2
                                    }?>
                             <!-- while 1 -->
                                <tr>
                                    <th colspan="5" style="color : red;">
                                    Tổng:  <?php echo  currency_format($total)?>
                                    </th>
                                    <th><a href="http://localhost:8080/Project_ct275/public/admin/partials/delete_order.php?id=<?php echo $row['id_user']?>" style="text-decoration: none; position: relative; left: 100px;" class="btn btn-primary">Hủy đơn hàng</a></th>
                                </tr>
                            <tr>
                            <?php
                                }
                            ?>                           
                                <?php
                            }
                    // try  
                    }
                    catch(PDOException $e){
                        echo $e;    
                    }
                    ?>
                
                
                            </tbody>    
                        </table>
                    </div>
                </div>
        </div>
</main>
<?php include "../partialss/footer.php"?>