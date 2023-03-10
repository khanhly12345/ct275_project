
<?php 
    include "../admin/connect.php";
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
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <ul class="left_header">
                        <li>    
                            <a href="reg.php">Đăng ký</a>
                        </li>
                        <li class="li">
                            <a href="">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6"></div>
                <div class="col-3 d-flex justify-content-end">
                    <ul class="right_header">
                        <li>
                            <a href="">Đơn hàng</a>
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
                            <p1 style="color: #20c997;">Giỏ hàng</p1><br>
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
                    <ul class="nav-links">
                        <a style="color: rgb(11, 145, 116) !important;" href="">Trang Chủ</a>
                        <a class="navstyle" href="">Giới Thiệu</a>
                        <li>
                            <a class="nav_links-has" href="">
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
                            <a class="navstyle" href="">Tin Tức</a>
                            <a class="navstyle" href="">Liên Hệ</a>
                    </ul>
                </div>
                <div class="col-6">
                    <div class="search">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm sản phẩm" aria-label="Search">
                        </form>
                        <form class="btn-search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm Kiếm</button></div>
                        </form>
                </div>
            </div>
        </div>
    </nav>