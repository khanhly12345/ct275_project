<?php
    // include "../partialss/header.php";
    include "../admin/connect.php";
    unset($_SESSION['user']);
    unset($_SESSION['exit']);
    if(isset($_COOKIE['user'])) {
        setcookie('user', "", time()-3600, "/");
    }
    echo "<script>
                                            let login_signin = document.getElementsByClassName('login_signi');
                                            login_signin[0].classList.remove('exit');
                                            login_signin[1].classList.remove('exit');</script>";
                                            // include "../partialss/footer.php";  
<<<<<<< HEAD
    echo "<script>window.location = 'http://localhost:/Project_ct275/public/src/'</script>";
=======
    echo "<script>window.location = 'http://localhost/ct275-project-Taib2014783/public/src/'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
?>