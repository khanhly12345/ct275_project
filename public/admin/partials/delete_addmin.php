<?php include "component/header.php";
    if($_SESSION['role'] == 0) {
        $_SESSION['check_role'] = "<div class='error'>Only admins can add delete admin. </div>";
        echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
    }else{
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if($_SESSION['check_admin'] == $id) {
                $_SESSION['check_admin_delete'] = "<div class='error'>you can't delete yourself </div>";
                echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
            }else{
                $query = "DELETE FROM admin where id=$id";
                $sth = $pdo->query($query);
                $sth->execute();
                if($sth) {
                    $_SESSION['delete_admin'] = "<div class='success'>  deleted susscesfully</div>"; 
                    echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
                }
            }
            
        }
    }                        
    

?>
