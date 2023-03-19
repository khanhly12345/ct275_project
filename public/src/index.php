<?php include "../partialss/header.php"?>
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
                            <li><a href="#" class="filter" id="aothun" data-filter="aothun">Áo thun </a><i class="fa fa-angle-right fa-2x "></i></li>
                            <li><a href="#" class="filter" id="aophong" data-filter="aophong">Áo phông </a><i class="fa fa-angle-right fa-2x "></i></li>   
                            <li><a href="#" class="filter" id="aosomy" data-filter="aosomy">Áo sơ mi </a><i class="fa fa-angle-right fa-2x "></i></li>
                            <li><a href="#" class="filter" id="aococtay" data-filter="aococtay">Áo cộc tay </a><i class="fa fa-angle-right fa-2x "></i></li>
                            <li><a href="#" class="filter" id="sanphammoi" data-filter="sanphammoi">Sản phẩm mới </a><i class="fa fa-angle-right fa-2x "></i></li>
                            <li><a href="#">Xem thêm </a></li>
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
                        // pagintion
                        $page = 0;
                        if (!isset ($_GET['page']) ) {

                            $page = 1;
                            
                        } else {
                            
                            $page = $_GET['page'];
                            
                        }

                        $results_per_page = 10;

                        $page_first_result = ($page-1) * $results_per_page; 

                        $query_pagintion = "SELECT * FROM product";
                        $sth_pagintion = $pdo->query($query_pagintion);
                        $sth_pagintion->execute();
                        $number_of_result = $sth_pagintion->rowCount();
                        $number_of_page = ceil ($number_of_result / $results_per_page);
                        // select product
                        $query = "SELECT * from product LIMIT ". $page_first_result . ',' . $results_per_page;
                        $sth = $pdo->query($query);
                        $sth->execute();
                        while($row = $sth->fetch()){
                            ?>
                            <div class="col-3 buy_hover" style="margin-top: 20px" data-items="<?php echo $row['type']?>">
                                    <img style="height: 320px;" src="../admin/upload_img/product/<?php echo $row['img']?>" alt="">
                                    <a href=""style="text-decoration:none;"><p><?php echo $row['titte']?></p></a>
                                    <div class="w_span">
                                        <span style="color: #20c997;"><?php echo currency_format($row['price'])?></span> <span style="text-decoration: line-through;"><?php echo currency_format($row['price'] + ($row['price'] * 0.1))?></span>
                                    </div>
                                    <div class="buy">
                                        <a href="details.php?id=<?php echo $row['id_product']?>">Mua hàng</a>
                                    </div>
                            </div>
                            <?php
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                ?>
                
            </div><br>
            <div class="row row-clothers">
                <!-- <div class="col-3 buy_hover">
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
                </div> -->
            </div><br>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                 <?php 
                    for($page = 1; $page<= $number_of_page; $page++) {
                        ?>
                            <li onlick="filter(<?php echo $page?>)" class="page-item" ><a data-nav=<?php echo $page?> class="page-link" href="index.php?page=<?php echo $page?>"><?php echo $page?></a></li>
                        <?php
                        }
                 ?>   
            </ul>
        </nav>
    </div>  
    </main><hr>
    <!-- footer -->
    <?php include "../partialss/footer.php"?>