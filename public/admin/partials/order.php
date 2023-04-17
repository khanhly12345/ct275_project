<?php include "component/header.php" ?>
<main class="main">
    <div class="wrap_main">
        <h1>MANAGER ORDER</h1>
        <hr>
        <?php 
            if(isset($_SESSION['delete_order'])) {
                echo $_SESSION['delete_order'];
                unset($_SESSION['delete_order']);
            }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">S.N</th>
                    <th scope="col">Thông tin khách hàng</th>
                    <th scope="col">hinh ảnh</th>
                    <th scope="col">tên sản phẩm</th>
                    <th scope="col">số lượng</th>
                    <th scope="col">tổng</th>
                    <th scope="col">ngày tạo</th> -->
                </tr>
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
                            $n = 0;
                            $query = "SELECT * FROM ordered o join users u on o.id_user = u.id";
                            $sth = $pdo->query($query);
                            $sth->execute();
                            $temp = 0;
                            $total = 0;
                            while($row = $sth->fetch()) {
                                if($temp != $row['id_user']) {
                                    $temp = $row['id_user'];
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
                                    $query2 = "SELECT * FROM ordered o join product p on o.id_product = p.id where o.id_user = $temp";  
                                    $sth2 = $pdo->query($query2);
                                    $sth2->execute();
                                    $temp2 = 0;
                                    while($row2 = $sth2->fetch()) {
                                        $total = $total + ($row2['price'] * $row2['quantity']);
                                    ?>
                                    <tr>
                                        <th><img src="../upload_img/product/<?php echo $row2['img']?>" style="width: 90px">
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
                                    <th colspan="4" style="color : red;">
                                    Tổng:  <?php echo  currency_format($total)?>
                                    </th>
                                    <th><a href="http://localhost:8080/Project_ct275/public/admin/partials/delete_order.php?id=<?php echo $row['id_user']?>" style="text-decoration: none;" class="btn btn-primary">Xóa đơn hàng</a></th>
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
<?php include "component/footer.php" ?> 