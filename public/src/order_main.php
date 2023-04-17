<?php include "../partialss/header.php"?>
<?php 
    // check user
    if(!isset($_SESSION['user'])) {
        $_SESSION['check_details'] = "<div class='error'>Bạn cần đăng nhập để xem chi tiết sản phẩm! </div>";
        echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/login.php'</script>"; 
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
                        $query = "SELECT * FROM ordered o join order_items o_i on o.id_order = o_i.id join users u on u.id = o_i.user_id where o_i.user_id = $user";
                        $sth = $pdo->query($query);
                        $sth->execute();
                        $temp = 0;
                        $total = 0;
                        // print_r($row = $sth->fetch());
                        while($row = $sth->fetch()) {
                            if($temp != $row[1]) {
                                $temp = $row[1];
                                $n++;
                            ?>
                            <tr>
                                <th scope="col">
                                    <?php echo $n . '.'; ?>
                                </th>
                                <th>
                                    <?php echo  'Tên: ' . $row['fullname'] . "<br>". 'SĐT: '. $row['phone'].'<br>'. 'Thành Phố: ' . $row['city'] . "<br>". 'Huyện: ' . $row['district']?>
                                </th>
                            <?php
                                $query2 = "SELECT * FROM ordered o join order_items o_i on o.id_order = o_i.id join product p on p.id = o.id_product where o.id_order = $temp";  
                                $sth2 = $pdo->query($query2);
                                $sth2->execute();
                                $temp2 = 0;
                                while($row2 = $sth2->fetch()) {
                                    $total = $row2['total'];
                                    // $total = $total + ($row2['price'] * $row2['quantity']);
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
                                <th style="display: flex; justify-content: center;"><a href="delete_order_main.php?id=<?php echo $row[1]?>" style="text-decoration: none;" class="btn btn-primary">Xóa đơn hàng</a></th>
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