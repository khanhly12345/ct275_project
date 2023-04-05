<?php include "component/header.php" ?>
<main class="main">
    <div class="wrap_main"> 
        <div class="container"> 
            <h1>DASHBOARD</h1>
            <hr>
            <div class="container">
            <span>
                <?php if(isset($_SESSION['check_admin'])) {
                    $id = $_SESSION['check_admin'];
                    $query = "select * from admin where id = $id";
                    $sth = $pdo->query($query);
                    $sth->execute();
                    $row = $sth->fetch();
                    echo "<span style='color: red'>Chào! ".$row['fullname']."</span>"."<br>";
                }?>
            </span>
                <br>
                <div class="row">
                    <div class="col-3 dashboard" style="background: -webkit-gradient(linear, left top, right top, from(#ffbf96), to(#fe7096)) !important; ">
                        <div class="wrrap_dashboard">
                            <h5>Product</h2>
                            <h5>Quantity: 
                                <?php 
                                    $query = "SELECT * from product";
                                    $sth = $pdo->query($query);
                                    $sth->execute();
                                    echo $sth->rowCount();
                                ?>
                            </h5>
                            <div>Create By KhanhLy</div>
                        </div>
                    </div>
                    <div class="col-3 dashboard" style="background: -webkit-gradient(linear, left top, right top, from(#90caf9), color-stop(99%, #047edf)) !important; margin-left: 120px">
                        <div class="wrrap_dashboard">
                            <h5>Order</h2>
                            <h5>Quantity: 
                            <?php 
                                    $query = "SELECT * from order_items";
                                    $sth = $pdo->query($query);
                                    $sth->execute();
                                    echo $sth->rowCount();
                                ?>
                            </h5>
                            <div>Create By KhanhLy</div>
                        </div>
                    </div>
                    <div class="col-3 dashboard" style="background: -webkit-gradient(linear, left top, right top, from(#84d9d2), to(#07cdae)) !important;  margin-left: 120px">
                        <div class="wrrap_dashboard">
                            <h5>Admin</h2>
                            <h5>Quantity: 
                                <?php 
                                    $query = "SELECT * from admin";
                                    $sth = $pdo->query($query);
                                    $sth->execute();
                                    echo $sth->rowCount();
                                ?>

                            </h5>
                            <div>Create By KhanhLy</div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</main>
<?php include "component/footer.php" ?>