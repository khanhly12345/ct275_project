<?php include "../partialss/header.php"?>

<!-- body -->
<main class="body">
    <div class="container">
        <div class="row body_area_2">
            <!-- <div class="col-2 menu menu-news">
                <div class="body-icon">
                    <i class="fa fa-bars"></i>
                    <a href="#" style="text-decoration: none; color: #ffffff;"><p>Danh mục sản phẩm</p></a>  
                    <br>
                </div>
                <div class="select select-news">
                        <li><a href="">Áo thun </a><i class="fa fa-angle-right fa-2x"></i></li>
                        <li><a href="">Áo phông </a><i class="fa fa-angle-right fa-2x"></i></li>   
                        <li><a href="">Áo sơ mi </a><i class="fa fa-angle-right fa-2x"></i></li>
                        <li><a href="">Áo cộc tay </a><i class="fa fa-angle-right fa-2x"></i></li>
                        <li><a href="">Sản phẩm mới </a><i class="fa fa-angle-right fa-2x"></i></li>
                        <li><a href="">Xem thêm </a></li>
                </div>
            </div> -->
 
                <!-- <div class="col-3 menu">
                    <div class="body-icon">
                        <i class="fa fa-bars"></i>
                        <a href="#" style="text-decoration: none; color: #ffffff;"><p>Danh mục sản phẩm</p></a>  
                        <br>
                    </div>
                    <div class="select">
                            <li><a href="">Trang chủ </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Giới thiệu </a><i class="fa fa-angle-right fa-2x"></i></li>   
                            <li><a href="">Sản phẩm </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Tin tức </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Liên hệ </a><i class="fa fa-angle-right fa-2x"></i></li>
                            <li><a href="">Xem thêm </a><i class="fa fa-angle-right fa-2x"></i></li>
                    </div>
                </div> -->
            <div class="row root">
                <div class="col-4 col-intro">
                        <a style="text-decoration: none ; color: black;" href="">Trang chủ</a> 
                        <p class="text-news" style="color: #20c997; " href="">Tin tức</p>
                    </div><hr>
                    <p style="margin-left: 40px; font-weight: 500; font-size: x-large;">TIN TỨC</p><br>
                </div>

            <!-- <div class="col-12"> -->
                <!-- <div class="col-4 col-intro">
                    <a style="text-decoration: none ; color: black;" href="">Trang chủ</a> 
                    <p class="text-news" style="color: #20c997; " href="">Tin tức</p>
                </div><hr>
                <p style="margin-left: 40px; font-weight: 500; font-size: x-large;">TIN TỨC</p><br> -->
                <script>
                    fetch('https://api.nytimes.com/svc/mostpopular/v2/viewed/1.json?api-key=XSW5zMVC0tkBqj81Bcek5ftLGn2Cvr4k')
                    .then(response => {
                        return response.json();
                    })
                    .then(news => {
                        // let div = document.getElementsByClassName("root")[0];
                        // div.innerHTML += `<img src="`+news.results[0]['media'][0]['media-metadata'][2].url+`"/>`;
                        let div = document.getElementsByClassName("root")[0];
                        for(let i=0; i<9; i++ )  {
                            div.innerHTML += `<div class="col-4">
                            <a href="`+news.results[i].url+`"><img style="width: 400px; height: 210px;" src="` + news.results[i]['media'][0]['media-metadata'][2].url +`" alt=""></a><br><br>
                            <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href=""></a></p>
                            <p style="font-size: small;">The leaked documents come as Ukraine has been preparing for a spring offensive as part of an effort to reclaim territory in the east and the south of the country.</p>
                            <p style="font-size: small;">`+news.results[i].updated+`</p>
                            <a href="`+news.results[i].url+`" class="btn btn-primary">Đọc Tiếp</a>
                            </div>`
                        }
                        
                    })
                </script>
                <!-- <script>
                fetch('https://newsapi.org/v2/everything?q=tesla&from=2023-03-06&sortBy=publishedAt&apiKey=6f27c3ce003645d489b3fc30bd801ed5')
                    .then(response => {
                        return response.json();
                    })
                    .then(news => {
                        let div = document.getElementsByClassName("root")[0];
                        for(let i=0; i<9; i++ )  {
                            div.innerHTML += `<div class="col-4">
                            <a href="` + news.articles[i].url +`"><img style="width: 400px; height: 210px;" src="` + news.articles[i].urlToImage +`" alt=""></a><br><br>
                            <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">`+ news.articles[i].author+`</a></p>
                            <p style="font-size: small;">Trong các tuần lễ thời trang, ngoài thời trang của các sao là vấn đề gây chú ý thì thời trang của các fashionista cũng là một chủ đề được...</p>
                            <p style="font-size: small;">`+ news.articles[i].publishedAt+`</p>
                            <button class="btn-news" style="position: relative; top: -5px"><p style="font-size: small;margin-top: 15px;">Đọc tiếp</p></button>
                            </div>`
                        }
                        
                        
                    })
                </script> -->
                <!-- <div class="row row-news">
                    <div class="col-4">
                        <a href=""><img style="width: 400px; height: 210px;" src="../images/img_news/thoi-trang-tham-hoa.webp" alt=""></a><br><br>
                        <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">Khi thời trang là thảm họa thì sẽ như thế nào ?</a></p>
                        <p style="font-size: small;">Trong các tuần lễ thời trang, ngoài thời trang của các sao là vấn đề gây chú ý thì thời trang của các fashionista cũng là một chủ đề được...</p><br>
                        <button class="btn-news" style="position: relative; top: -5px"><p style="font-size: small;margin-top: 15px;">Đọc tiếp</p></button>
                    </div>
                    <div class="col-4">
                        <a href=""><img style="width: 400px; height: 210px;" src="../images/img_news/truongthanh.webp" alt=""></a><br><br>
                        <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">Tại sao càng trưởng thành, bạn bè lại càng xa nhau?</a></p>
                        <p style="font-size: small;">Bước ra khỏi ghế nhà trường, chúng ta sẽ thay đổi để hòa nhập với môi trường sống lẫn công việc mới. Song đến lúc bạn gặp lại đối phương...</p>
                        
                        <button class="btn-news" ><p style="font-size: small; margin-top: 15px;">Đọc tiếp</p></button>
                    </div>
                </div><hr>
                <div class="row row-news">
                    <div class="col-4">
                        <a href=""><img style="width: 400px; height: 210px;" src="../images/img_news/sieumau.webp" alt=""></a><br><br>
                        <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">Dàn siêu mẫu trình diễn thời trang mùa thu tại London</a></p>
                        <p style="font-size: small;">Trong các Tuần lễ thời trang, Alexander McQueen luôn là một trong những tên tuổi được mong đợi nhiều nhất. Đặc biệt trong năm nay, giám đốc sáng tạo Sarah...
                        </p>
                        <button class="btn-news" ><p style="font-size: small;   margin-top: 15px;">Đọc tiếp</p></button>
                        
                    </div>
                    <div class="col-4">
                        <a href=""><img style="width: 400px; height: 210px;" src="../images/img_news/vintage.webp" alt=""></a><br><br>
                        <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">Nghệ thuật phối màu vintage trong thời trang cổ điển</a></p>
                        <p style="font-size: small;">Bạn thích những bộ váy giống như mẹ hay mặc ngày xưa? Cách phối đồ phong cách vintage chính là gợi ý cho bạn trở thành một phiên bản đáng...</p>
                        <button class="btn-news" ><p style="font-size: small;margin-top: 15px;">Đọc tiếp</p></button>
                    </div>
                </div><hr>
                <div class="row row-news">
                    <div class="col-4">
                        <a href=""><img style="width: 400px; height: 210px;" src="../images/img_news/zara.webp" alt=""></a><br><br>
                        <p><a style="text-decoration: none; color: rgb(0, 0, 0);" href="">Zara ra mắt mẫu giày classic mới cạnh tranh với Nike</a></p>
                        <p style="font-size: small;">Thời khắc mà các fan mong chờ cũng đã tới khi Nike chính thức tổ chức buổi lễ công bố "vũ khí" mới của họ là dòng giày bóng đá...</p>
                        <button class="btn-news" ><p style="font-size: small;margin-top: 15px;">Đọc tiếp</p></button>   
                        
                    </div>
                    <div class="col-4">
                        
                    </div> -->
                <!-- </div><hr> -->
               
        </div>
    </div>
</main>
<hr>
<!-- footer -->
<?php include "../partialss/footer.php"?>