<?php 
    include "../connect.php"; 
    session_destroy();
    echo "<script>window.location = 'http://localhost:8080/Project_ct275/public/admin/partials/login.php'</script>";
?>