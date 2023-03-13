<?php include "../partialss/header.php"?>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM product p join product_size ps on p.id_product = ps.id_product where p.id_product=$id";
        $sth = $pdo->prepare($query);
        $sth->execute();
        $row = $sth->fetch();
    }

?>
    <!-- body -->
    <div class="body">
        <div class="container">
            <div class="row ">
                <div class="col-6">
                    <ul class="breadcrumb">					
                        <li class="home">
                            <a style="text-decoration: none;" href=""><span style="color: black;" >Trang chủ</span></a>						
                            <span class="mr_lr"><i class="fas fa-chervon-right"></i></span>
                        </li>
                        
                        <li>
                            <a style="text-decoration: none;" class="changeurl" href=""><span style="color: black;" >Áo cộc tay</span></a>						
                            <span class="mr_lr"><i class="fas fa-chervon-right"></i></span>
                        </li>
                        
                        <li><span style="color: #20c997;">Áo phông vitage trắng</span></li>
                        
                    </ul>
                </div>
                <hr>
                <div class="container">
                    <div class="row row-before">
                        <div class="col-6 colimg1">
                            <img style="height: 400px; width: 400px;" src="../images/img_clothers/decedd324f08b65fc7a831f6a9ab8449.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <div class="row row-info">
                                <p1 style="font-size: larger;"><?php echo $row['titte']?></p1>
                            <div class="w_span">
                                <span style="color: #20c997;"><?php echo currency_format($row['price'])?></span> <span style="text-decoration: line-through;">310.000đ</span>
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
                                    <label>Số lượng: </label>
                                    <div class="form-group form_button_details">
                                    <div class="form_product_content">
                                        <div class="soluong soluong_type_1">
                                            <div class="form-control control-quality">
                                                <input type="text" id="qtym" name="quantity" value="1" maxlength="3" class="form-control  ">
                                                
                                            </div>
                                                <div class="btn-2num">
                                                    <button class="btn_num num_2 "   type="button"><i  class="fa fa-plus"></i></button>
                                                    <button class="btn_num num_1 "   type="button"><i class="fa fa-minus"></i></button>	
                                                </div>    
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id_product']?>">
                                        <div class="button_actions ">
                                            <button type="submit" name="submit">
                                                <span class="text_1">Cho vào giỏ hàng</span>
                                            </button>	                                       
                                        </div>
                                        
                                </div>
                            </form>
                            <br>
                            <?php
                                if(isset($_POST['submit'])) {
                                    $id = $_POST['id'];
                                    echo $id;
                                    echo $_POST['size'];
                                }
                            ?>
                            </div>
                            <p1>tags: Áo phông</p1>
                                <p>share: facebook Pinterest tweeter Google</p>
                                
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
                    <h2 style="font-family: 'Courier New', Courier, monospace; color: #fff;">Thông tin sản phẩm</h2>
                </div> 
                    </div>
                </div>
                
                <div class="text_content">
                    <p>Phong cách thời trang nam giới nói riêng luôn có sự thay đổi theo thời gian. Tuy nhiên, những trang phục thuộc diện thì vẫn có được chỗ đứng cho mình trong lòng công chúng. Món đồ mà chúng tôi đang muốn nói đến ở đây là áo sơmi trắng. Cho dù phong cách ăn mặc của các chàng trai là đơn giản hay phức tạp, lịch lãm hay bụi bặm thì áo phông trắng luôn là món đồ mà bạn không thể bỏ qua</p><br>
                    <p>Nam giới từ xưa đến nay vẫn được hưởng ưu ái "mặc thế nào cũng được". Chính vì điều này mà đôi khi phái mạnh trở nên cẩu thả với chính mình. Nhưng ngày nay, mọi thứ đã thay đổi. Việc cẩu thả trong ăn mặc sẽ khiến bạn trở thành một anh chàng lôi thôi, luộm thuộm trong mắt mọi người. Mặc sơmi trắng khiến các chàng trai trở lên thanh lịch và nam tính hơn bao giờ hết. Có nhiều cách "hay ho" để chúng ta biến tầu trang phục này.</p><br>
                    <p>Asos là thương hiệu thời trang bình dân nổi tiếng của Anh được thành lập năm 2000 bởi Nick Robertson dưới hình thức ban đầu là trang web bán hàng thời trang trực tuyến Asos.com dành cho độ tuổi từ 18-34 tuổi. Tuy nhiên, khi càng phát triển, Asos đã thay đổi đối tượng khách hàng khi nhắm đến đa dạng các đối tượng từ phụ nữ, đàn ông, trẻ em cho tới thanh thiếu niên và cung cấp các mặt hàng chủ yếu như giầy dép, phụ kiện, trang sức, quần áo và mỹ phẩm. Phong cách thời trang của Asos chủ yếu được lấy cảm hứng từ những người nổi tiếng để tạo ra những bộ sản phẩm mang tính xu hướng, thời thượng với giá tiêu dùng bình dân nhất.</p><br>
                </div><hr>
        </div>
    </div>

    <!-- footer -->
    <?php include "../partialss/footer.php"?>