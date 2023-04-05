<?php include "../partialss/header.php"?>
<?php 
    // check user
    if(!isset($_SESSION['user'])) {
        $_SESSION['check_details'] = "<div class='error'>Bạn cần đăng nhập để xem chi tiết sản phẩm! </div>";
        echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/login.php'</script>"; 
    }

?>
<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM product p join product_size ps on p.id_product = ps.id_product where p.id_product=$id";
        $sth = $pdo->prepare($query);
        $sth->execute();
        $row = $sth->fetch();
        // print_r($row);
    }

?>
    <!-- body -->
    <div class="body body-details">
        <div class="container">
            <div class="row ">
                <div class="col-3">
                    <ul class="breadcrumb">					
                        <li class="home">
                            <a style="text-decoration: none;" href=""><span style="color: black;" >Trang chủ</span></a>						
                            <span class="mr_lr"><i class="fas fa-chervon-right"></i></span>
                        </li>
                        
                        <!-- <li>
                            <a style="text-decoration: none;" class="changeurl" href=""><span style="color: black;" >Áo cộc tay</span></a>						
                            <span class="mr_lr"><i class="fas fa-chervon-right"></i></span>
                        </li> -->
                        
                        <li><span style="color: #20c997;"><?php echo $row['titte']?></span></li>
                        
                    </ul>
                </div>
                <hr>
                <div class="container">
                    <div class="row row-before" style="margin-bottom: 20px;">
                        <div class="col-5 colimg1">
                            <img style="height: 500px; width: 500px;" src="../admin/upload_img/product/<?php echo $row['img']?>" alt="">
                        </div>
                        <div class="col-7">
                            <div class="row row-info">
                                <p1 style="font-size: larger;"><?php echo $row['titte']?></p1>
                            <div class="w_span" style="    margin: 20px 0 20px 0;">
                                <span style="color: #20c997;"><?php echo currency_format($row['price'])?></span> <span style="text-decoration: line-through;"><?php echo currency_format($row['price'] + ($row['price'] * 0.1))?></span>
                            </div>
                            <br>
                            <p style="font-size: small;">Mô tả bản cập nhật</p>
                            <hr>
                            </div>
                            <form action="" method="POST">
                                <div class="size">
                                    <select name="size">
                                        <option value="">Select size:</option>
                                        <option value="S"><?php if($row['s'] > 0) { echo "S";}?></option>
                                        <option value="M"><?php if($row['m'] > 0) { echo "M";}?></option>
                                        <option value="L"><?php if($row['l'] > 0) { echo "L";}?></option>
                                    </select>
                                </div>
                                <div class="row row-qualyti">
                                    <label style="margin: 20px 0 20px 0;">Số lượng: </label>
                                    <div class="form-group form_button_details">
                                    <div class="form_product_content">
                                        <div class="soluong soluong_type_1">
                                            <div class="form-control control-quality">
                                                <input type="text" id="qtym" name="quantity" value="1" maxlength="3" class="form-control">
                                                
                                            </div>
                                                <div class="btn-2num">
                                                    <button class="btn_num num_2 next"    type="button"><i  class="fa fa-plus"></i></button>
                                                    <button class="btn_num num_1 pre"   type="button"><i class="fa fa-minus"></i></button>	
                                                </div>    
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row[0]?>">
                                        <div class="button_actions ">
                                            <button type="submit" name="submit" style="    width: 30%;border: none;color: white;">
                                                <span class="text_1">Cho vào giỏ hàng</span>
                                            </button>	                                       
                                        </div>
                                </div>
                                <hr>
                            </form>
                            <br>
                            <?php
                                if(isset($_POST['submit'])) {
                                    $id = $_POST['id'];
                                    $id_user = $_SESSION['user'];
                                    $size = $_POST['size'];
                                    $quantity = $_POST['quantity'];
                                    // check cart
                                    echo $id;
                                    $query2 = "select * from cart where id_product =$id AND size = '$size' AND id_user = $id_user";
                                    $sth2 = $pdo->query($query2);
                                    $count = $sth2->rowCount();
                                    if($count > 0) {
                                        echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/cart.php'</script>";
                                        die();
                                    }
                                    try{
                                        
                                        $query = "INSERT INTO cart (id_user, id_product, size, quantity) VALUES (?,?,?,?);";
                                        $sth = $pdo->prepare($query);
                                        $sth->execute([
                                            $id_user,
                                            $id,
                                            $size,
                                            $quantity
                                        ]);
                                        if($sth == true) {
                                            echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/cart.php'</script>";
                                        }
                                    }catch(PDOException $e){
                                        echo $e->getMessage();
                                    }
                                }
                            ?>
                            </div>
                            <p1>tags: nguenkhanhly@gmail.com</p1>
                            <ul class="share">
                                <li><a style="font-size:15px">share:</a></li>
                                <li><a><i class="fab fa-facebook-f" style="color: blue"></i></a></li>
                                <li><a><i class="fab fa-twitter" style="color: rgb(106, 106, 245)"></i></a></li>
                                <li><a><i class="fab fa-instagram" style="color: orange"></i></a></li>
                                <li><a><i class="fab fa-google" style="color: rgb(73, 247, 73)"></i></a></li>
                            </ul>
                        </div>                  
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-6 colimg2 ">
                            <div class="col-3">
                                <div >
                                    <img style="height:100px; width: 100px;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
    
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <img style="height:100px; width: 100px;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>                     -->
                </div><hr><br>
                <div class="row">
                    <div class="col-4">
                       <div class="text_infosp">
                    <h2 style="font-size: large;" >Thông tin sản phẩm</h2>
                </div> 
                    </div>
                </div>
                
                <div class="text_content">
                    <p>Phong cách thời trang nam giới nói riêng luôn có sự thay đổi theo thời gian. Tuy nhiên, những trang phục thuộc diện thì vẫn có được chỗ đứng cho mình trong lòng công chúng. Món đồ mà chúng tôi đang muốn nói đến ở đây là áo sơmi trắng. Cho dù phong cách ăn mặc của các chàng trai là đơn giản hay phức tạp, lịch lãm hay bụi bặm thì áo phông trắng luôn là món đồ mà bạn không thể bỏ qua</p><br>
                    <p>Nam giới từ xưa đến nay vẫn được hưởng ưu ái "mặc thế nào cũng được". Chính vì điều này mà đôi khi phái mạnh trở nên cẩu thả với chính mình. Nhưng ngày nay, mọi thứ đã thay đổi. Việc cẩu thả trong ăn mặc sẽ khiến bạn trở thành một anh chàng lôi thôi, luộm thuộm trong mắt mọi người. Mặc sơmi trắng khiến các chàng trai trở lên thanh lịch và nam tính hơn bao giờ hết. Có nhiều cách "hay ho" để chúng ta biến tầu trang phục này.</p><br>
                    <p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p><br>
                </div>
                <!-- comment -->
                <div class="comment" style="margin: 20px 0 20px 0">
                    <div class="wrap_comment">
                        <h3>Ý Kiến Người Dùng: </h3>
                        <form action="details.php?id=<?php echo $_GET['id']?>" method="POST">
                            <textarea style="width: 100%; height: 100px !important" name="comment"></textarea>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                            <button type="submit" name="submit_comment" class="btn btn-primary">Bình Luận</button>
                        </form>
                        
                    </div>
                </div>
                <?php 
                    if(isset($_GET['id']) AND isset($_SESSION['user'])) {
                       if(isset($_POST['submit_comment'])) {
                            $query = "INSERT INTO comment (id_user, id_product, comment) VALUES (?, ?, ?)";
                            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_SESSION['user'],
                                $_POST['id'],
                                $_POST['comment']
                            ]);
                       }
                    }
                ?>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">Latest Comments</h4>
                            </div>
                            <div class="comment-widgets" style="margin-bottom: 20px">
                                <!-- Comment Row -->
                                <?php 
                                    if(isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $query = "SELECT * FROM users u join comment c on u.id = c.id_user WHERE id_product=$id";
                                        $sth = $pdo->query($query);
                                        $sth->execute();
                                        while($row = $sth->fetch()) {
                                            ?>
                                                <div class="d-flex flex-row comment-row m-t-0">
                                                    <div class="p-2"><img src="https://i.imgur.com/Ur43esv.jpg" alt="user" width="50" class="rounded-circle"></div>
                                                    <div class="comment-text w-100">
                                                        <h6 class="font-medium"><?php echo $row['fullname']?></h6> <span class="m-b-15 d-block"><?php echo $row['comment']?> </span>
                                                        <div class="comment-footer"> <span class="text-muted float-right"><?php echo $row['date']?></span>
                                                            <?php 
                                                                if($row['id_user'] == $_SESSION['user']) {
                                                                    ?>
                                                                        <a href="delete_comment.php?id_comment=<?php echo $row['id']?>&id_product=<?php echo $id?>" class="btn btn-danger">Delete</a> 
                                                                    <?php
                                                                }
                                                            ?>  
                                                            
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php
                                        }
                                    }
                                ?>
                               
                                
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium">Michael Hussey</h6> <span class="m-b-15 d-block">Thanks bbbootstrap.com for providing such useful snippets. </span>
                                        <div class="comment-footer"> <span class="text-muted float-right">2023-03-31 09:11:08</span>   </div>
                                    </div>
                                </div> 
                                <!-- Comment Row -->
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2"><img src="https://i.imgur.com/J6l19aF.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Johnathan Doeting</h6> <span class="m-b-15 d-block">Great industry leaders are not the real heroes of stock market. </span>
                                        <div class="comment-footer"> <span class="text-muted float-right">2023-03-31 09:11:08</span>   </div>
                                    </div>
                                </div>
                            </div> <!-- Card -->
                        </div>
                    </div>
                </div>
                

                <!-- comment  -->
                <h1 style="font-size: large; color:black" >SẢN PHẨM LIÊN QUAN</h1>
                <hr style="border: 3px solid green;" >
                <div class="row row-clothers row-splq">
                <?php
                    try{
                        $query = "SELECT * from product LIMIT 4";
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
                                        <a href="details.php?id=<?php echo $row['id_product']?>">Mua hàng</a>
                                    </div>
                            </div>
                            <?php
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                ?>
                
                    <!-- <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>  
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>    
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>   
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>   
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>   
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>   
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>   
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>   
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>   
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
                        <img style="height: 70%;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        <a href=""style="text-decoration:none;"><p>Áo sơ mi Asos</p></a>
                        <div class="w_span">
                            <span style="color: #20c997;">250.000đ</span> <span style="text-decoration: line-through;">310.000đ</span>
                        </div>   
                        <div class="buy">
                            <a href="">Mua hàng</a>
                        </div>   
                    </div>
                    <div class="col-3 buy_hover buy_hover-details">
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
    </div>

    <!-- footer -->
    <?php include "../partialss/footer.php"?>