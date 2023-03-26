<footer class="footer">
        <div class="container">
            <div class="row fter">
                <div class="col-4 f1">
                    <img src="../images/img_footer/logo_footer.webp" alt=""> 
                    <ul class="ul">
                        <li><span class="call_ft"><i class="fa fa-location-arrow"></i></span><a href="">Tầng 6 266 Đội Cấn - Ba Đình - Hà Nội, Hà Nội</a></li>
                        <li><span class="call_ft"><i class="fa fa-phone-volume fa-3x"></i></span><a href="">0943 703 313</a></li>
                        <li><span class="call_ft"><i class="fa fa-envelope"></i></span><a href="">nguenkhanhly@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-3 f1">
                            <p>TÀI KHOẢN</p>
                            <ul>
                                <li><a href="">Trang chủ</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Sản phẩm</a></li>
                                <li><a href="">Tin tức</a></li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-3 f1">
                            <p>CHÍNH SÁCH</p>
                            <ul>
                                <li><a href="">Trang chủ</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Sản phẩm</a></li>
                                <li><a href="">Tin tức</a></li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-3 f1">
                            <p>ĐIÈU KHOẢN</p>
                            <ul>
                                <li><a href="">Trang chủ</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Sản phẩm</a></li>
                                <li><a href="">Tin tức</a></li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-3 f1">
                            <p>HƯỚNG DẪN</p>
                            <ul>
                                <li><a href="">Trang chủ</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Sản phẩm</a></li>
                                <li><a href="">Tin tức</a></li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </div>  
                    </div>  
                    
                </div>
            </div>
        </div>
        <div class="fter2">
            <div class="container">
                <div class="row fter_end_roof">
                    <div class="col-6 div1">&copy; Bản quyền thuộc về Avent Team | Cung cấp bởi KaLy</div>
                    <div class="col-6 fter_end">
                        <ul>
                            <li><a href="">Trang chủ</a></li>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Sản phẩm</a></li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!-- js -->

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="filter.js"></script>
    <script src="validation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        window.onload = function() {
            navigation('<?php echo $_GET['id'] ?? "trangchu"?>');
            filter(<?php echo $_GET['page'] ?? "1"?>);
        }
        $(window).on("load", function() {
            $(".loader-container").fadeOut(1000);
        })
    </script>
</body>
</html> 