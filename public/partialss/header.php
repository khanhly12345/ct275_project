
<?php include "../admin/connect.php";
    if(isset($_SESSION['user'])) {
        setcookie("user", $_SESSION["user"], time() + 3600,"/");
    }
    if(isset($_COOKIE['user'])) {
        $_SESSION["user"] = $_COOKIE['user'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="icon" href="../images/logo/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../libraries/source/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="loader-container">
        <div class="loader">
        
        </div>
    </div>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <ul class="left_header">
                        <li>    
                            <a class="login_signi" href="http://localhost/Project_ct275/public/src/reg.php">Đăng ký</a>
                            
                            <?php
                                if(isset($_SESSION['user'])) {
                                    
                                    $id = $_SESSION['user'];
                                    $query = "SELECT id, fullname FROM users WHERE id = $id";
                                    $sth = $pdo->query($query);
                                    $sth->execute();
                                    if($sth == true) {
                                        $row = $sth->fetch();
                                        echo "<a href='http://localhost/Project_ct275/public/src/edit_user.php?id=$id'><p class='success' style='position: relative; top:10px;'>".$row['fullname']."</p></a>";         
                                    }else{
                                        echo "loi";
                                    }
                                }
                            ?>
                            
                        </li>
                        <li class="li">
                            <a class="login_signi" href="http://localhost/Project_ct275/public/src/login.php">Đăng nhập</a>

                                <?php 
                                    if(isset($_SESSION['user'])) {
                                        $_SESSION['exit'] = "<a style='position: relative; top:10px;' href='http://localhost/Project_ct275/public/src/logout.php'> Thoát </a>"; 
                                        echo $_SESSION['exit'];
                                        if($sth == true) {
                                            echo "<script>
                                            let login_signin = document.getElementsByClassName('login_signi');
                                            login_signin[0].classList.add('exit');
                                            login_signin[1].classList.add('exit');</script>";
                                        }
                                    }
                                ?>

                        </li>
                    </ul>
                    
                </div>
                <div class="col-6"></div>
                <div class="col-3 d-flex justify-content-end">
                    <ul class="right_header">
                        <li>
                            <a href="http://localhost/Project_ct275/public/src/order_main.php" style="color: #0fa87a;">Đơn hàng <span>
                            </span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="../images/logo/logo.webp" alt="">

                </div>
                <div class="col-3">
                    <div class="wrp d-flex justify-content-end">
                        <div class="header-icon-truck">
                            <i class="fa fa-truck fa-3x"></i>
                        </div>
                        <div class="header-icon-freeship">
                            <p1 style="color: #20c997;">Miễn phí vận chuyển</p1><br>
                            <span>Với đơn hàng trên 1.000.000đ </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrp d-flex justify-content-end">
                        <div class="header-icon-call">
                            <i class="fa fa-phone-volume fa-3x"></i>
                        </div>
                        <div class="header-icon-fastcall">
                            <p1 style="color: #20c997;">Đặt hàng nhanh</p1><br>
                            <span>Gọi ngay 19006750</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="wrp d-flex justify-content-end">
                        <div class="header-icon-cart">
                            <i class="fa fa-cart-plus fa-3x"></i>
                        </div>
                        <div class="header-icon-product">
                            <p1><a   style="color: #20c997; text-decoration:none;" href="cart.php">Giỏ hàng (<span style="color: red;" class="quanlity">
                            <?php 
                            $count = 0  ;
                            if(isset($_SESSION['user'])){
                                $id_user = $_SESSION['user'];
                                $query = "SELECT * FROM cart where id_user=$id_user";
                                $sth = $pdo->query($query);
                                $sth->execute();
                                $count = $sth->rowCount();
                                echo $count;
                            }else{
                                echo $count;
                            }
                            ?>
                            </span>)</a></p1><br>
                            <span style="font-size:small;">Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- nav -->
        <nav class="nav p-1">
        <div class="container">
            <div class="row-nav">
                <div class="col-6 ">
                    <ul class="nav-links item_big">
                        <a class="trangchu"  href="../src/index.php?id=trangchu">Trang Chủ</a>
                        <a class="navstyle gioithieu" href="../src/gioithieu.php?id=gioithieu">Giới Thiệu</a>
                        <li>
                            <a class="nav_links-has sanpham" href="../src/index.php?id=sanpham">
                                Sản Phẩm
                                 <i style="height: 20%;" class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="subnav">
                                <li><a href="">Áo Phông</a><i class="fa fa-angle-right fa-2x subicon"></i></li>
                                <li><a href="">Sơ mi</a><i class="fa fa-angle-right fa-2x subicon"></i></li>
                                <li><a href="">Cộc tay</a><i class="fa fa-angle-right fa-2x subicon"></i></li>
                                <li><a href="">Áo thun</a><i class="fa fa-angle-right fa-2x subicon"></i></li>
                                <li><a href="">Sản phẩm mới</a><i class="fa fa-angle-right fa-2x subicon"></i></li>
                            
                            </ul>       
                        </li>            
                            <a class="navstyle tintuc" href="../src/news.php?id=tintuc">Tin Tức</a>
                            <a class="navstyle lienhe" href="../src/contact.php?id=lienhe">Liên Hệ</a>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="search">
                        <form action="http://localhost/Project_ct275/public/src/search.php" method="POST" class="form-inline my-2 my-lg-0 ">
                            <input style="width: 240px;" class="form-control mr-sm-2" type="search" placeholder="Tìm sản phẩm" aria-label="Search" name="search">
                        <!-- </form>
                        <form action="http://localhost/Project_ct275/public/src/search.php" method="POST" class="btn-search"> -->
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Tìm Kiếm</button></div>
                        </form>
                </div>
            </div>
        </div>
    </nav>