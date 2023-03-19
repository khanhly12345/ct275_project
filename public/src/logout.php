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
    echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/'</script>";
?>