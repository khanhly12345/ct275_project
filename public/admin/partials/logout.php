<?php 
    include "../connect.php"; 
    session_destroy();
    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/login.php'</script>";
?>