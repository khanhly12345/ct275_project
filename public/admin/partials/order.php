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
                            $query = "SELECT * FROM ordered o join order_items o_i on o.id_order = o_i.id join users u on u.id = o_i.user_id";
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
                                    <th><a href="delete_order.php?id=<?php echo $row[1]?>" style="text-decoration: none;" class="btn btn-primary">Xóa đơn hàng</a></th>
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