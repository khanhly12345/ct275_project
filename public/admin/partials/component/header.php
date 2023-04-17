<?php
include "../connect.php";
if(!isset($_SESSION['login'])) {
    $_SESSION['check_login'] = "<div class='error'>You need to login to access admin! </div>";
    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <div class="wrap_header">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="manager_product.php">Product</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </header>