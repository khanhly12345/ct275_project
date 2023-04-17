<?php include "component/header.php";
    if($_SESSION['role'] == 0) {
        $_SESSION['check_role'] = "<div class='error'>Only admins can add delete admin. </div>";
<<<<<<< HEAD
        echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
=======
        echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
    }else{
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if($_SESSION['check_admin'] == $id) {
                $_SESSION['check_admin_delete'] = "<div class='error'>you can't delete yourself </div>";
<<<<<<< HEAD
                echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
=======
                echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
            }else{
                $query = "DELETE FROM admin where id=$id";
                $sth = $pdo->query($query);
                $sth->execute();
                if($sth) {
                    $_SESSION['delete_admin'] = "<div class='success'>  deleted susscesfully</div>"; 
<<<<<<< HEAD
                    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
=======
                    echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
                }
            }
            
        }
    }                        
    

?>
