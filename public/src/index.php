<?php include "../partialss/header.php"?>
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
    <!-- body -->
    <main class="body">
        <div class="container">
            <div class="row body_area_1">
                <div class="col-3 menu">
                    <div class="body-icon">
                        <i class="fa fa-bars"></i>
                        <a href="#" style="text-decoration: none; color: #ffffff;"><p>Danh mục sản phẩm</p></a>  
                        <br>
                    </div>
                    <div class="select">
                            <li><a href="">Áo thun </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Áo phông </a><i class="fa fa-angle-right fa-2x"></i></li>   
                            <li><a href="">Áo sơ mi </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Áo cộc tay </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Sản phẩm mới </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Xem thêm </a></li>
                    </div>
                </div>
                <div class="col-9">
                    <div id="slideshow">
                        <div class="slide-wrapper">
                            <div class="slide"><img  src="../images/img_body/plain-tshirt.jpg"></div>
                            <div class="slide"><img  src="../images/img_body/mens-fashion-2021-awards-season.webp"></div>
                            <div class="slide"><img  src="../images/img_body/sU9bdi.jpg"></div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container spmm">
            <h1 class="h1">Sản phẩm mới nhất</h1>
            <div class="row row-clothers">
                <?php
                    try{
                        $query = "SELECT * from product";
                        $sth = $pdo->query($query);
                        $sth->execute();
                        while($row = $sth->fetch()){
                            ?>
                            <div class="col-3 buy_hover" data-items="<?php echo $row['type']?>">
                                    <img style="height: 70%;" src="../admin/upload_img/product/<?php echo $row['img']?>" alt="">
                                    <a href=""style="text-decoration:none;"><p><?php echo $row['titte']?></p></a>
                                    <div class="w_span">
                                        <span style="color: #20c997;"><?php echo currency_format($row['price'])?></span> <span style="text-decoration: line-through;">310.000đ</span>
                                    </div>
                                    <div class="buy">
                                        <a href="details.php?id=<?php echo $row['id']?>">Mua hàng</a>
                                    </div>
                            </div>
                            <?php
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                ?>
                
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>  
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>    
                </div>
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>   
                </div>
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>   
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>   
                </div>
            </div><br>
            <div class="row row-clothers">
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>      
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>                         
                </div>
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>            
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>         
                </div>
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>              
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>        
                </div>
                <div class="col-3 buy_hover">
                    <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                    <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                    <div class="w_span">
                        <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                    </div>            
                    <div class="buy">
                        <a href="">Mua hàng</a>
                    </div>    
                </div>
            </div><br>
        </div>
        <div class="row row-clothers">
            <div class="col-3 buy_hover">
                <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                <div class="w_span">
                    <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                </div>                  
                <div class="buy">
                    <a href="">Mua hàng</a>
                </div>             
            </div>
            <div class="col-3 buy_hover">
                <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                <div class="w_span">
                    <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                </div>                
                <div class="buy">
                    <a href="">Mua hàng</a>
                </div>    
            </div>
            <div class="col-3 buy_hover">
                <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                <div class="w_span">
                    <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                </div>              
                <div class="buy">
                    <a href="">Mua hàng</a>
                </div>        
            </div>
            <div class="col-3 buy_hover">
                <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                <div class="w_span">
                    <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                </div>           
                <div class="buy">
                    <a href="">Mua hàng</a>
                </div>     
            </div>
        </div><br>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
          </nav>
    </div>  
    </main><hr>
    <!-- footer -->
    <?php include "../partialss/footer.php"?>