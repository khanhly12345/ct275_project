<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center; color: rgb(14, 175, 234); position: relative; top: 40px; font-size: 50px">Login</h1><br>    
    <div class="login">
        <div class="wrapper-login">
            <?php 
                include "../connect.php";   
                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['check_login'])) {
                    echo $_SESSION['check_login'];
                    unset($_SESSION['check_login']);
                }
            ?>
            <form action="" method="POST" class="text-align">
                Usename: <br>
                <input type="text" name="usename" placeholder="usename"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="password"><br><br>
                <input type="submit" class="btn-primary" name="submit">
            </form>
            <br><br>
            <p class="text-align">Created By - <a href="">Khanh Ly</a></p>
        </div>
    </div>
    <?php 
        if(isset($_POST['submit'])) {
            $account = $_POST['usename'];
            $password = md5($_POST['password']);
            $query = "select * from admin where account = '$account' AND password = '$password'";
            $sth = $pdo->query($query);
            $row = $sth->fetch();
            $count = $sth->rowCount();
            if($count > 0) {
                $_SESSION['login'] = "<div class='success'> Login successfully. </div>";
                $_SESSION['role'] = $row['role'];
                $_SESSION['check_admin'] = $row['id'];
                echo $_SESSION['role'];
                echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/dashboard.php'</script>";
            }else{
                $_SESSION['login'] = "<div class='error'> The account and password not correct! </div>";
                echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/login.php'</script>";
            }
        }
    ?>
</body>
</html>