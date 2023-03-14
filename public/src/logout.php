<?php
    include "../partialss/header.php";
    unset($_SESSION['user']);
    unset($_SESSION['exit']);
    echo "<script>
                                            let login_signin = document.getElementsByClassName('login_signi');
                                            login_signin[0].classList.remove('exit');
                                            login_signin[1].classList.remove('exit');</script>";
                                            include "../partialss/footer.php";  
    echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/src/'</script>";
?>