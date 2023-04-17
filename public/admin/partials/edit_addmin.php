<?php include "component/header.php";
if($_SESSION['role'] == 0) {
    $_SESSION['check_role'] = "<div class='error'>Only admins can add edit admin. </div>";
<<<<<<< HEAD
    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
=======
    echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
    die();
}
?>
<main class="main">
    <div class="wrap_main">
      <h1>EDIT ADMIN</h1>
      <hr>
      <form action="" method="POST" class="form_add" >
            <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "select * from admin where id=$id";
                $sth = $pdo->query($query);
                $sth->execute();
                $row = $sth->fetch();
            }
                
            ?>
        <table>
            <tbody>
                    <tr>
                        <th><label for="fullname">Fullname:</label></th>
                        <th><input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']?>"><br></th>
                    </tr>
                    <tr>
                        <th><label for="account">Account:</label></th>
                        <th><input type="text" id="account" name="account" value="<?php echo $row['account']?>"><br></th>
                    </tr>
                    <?php 
                        if($row['role'] != 1) {
                            $role = $row['role'];
                            ?>
                                <tr>
                                    <th><label for="role">Role:</label></th>
                                    <th><input type="text" id="role" name="role" value="<?php echo $role?>"><br></th>
                                </tr>;
                            <?php
                        }
                    ?>
                    
                    <tr>
                        <th><input type="submit" class="btn btn-primary" name="submit" value="Add Admin"></th>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                    </tr>
            </tbody>
        </table>
      </form>
        <?php 
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $query = "UPDATE admin SET fullname=?, account=?, role=? where id=$id";
                $sth = $pdo->prepare($query);
                $sth->execute([
                    $_POST['fullname'],
                    $_POST['account'],
                    $_POST['role'] ?? 1
                ]);
                if($sth) {
                    $_SESSION['edit_admin'] = "<div class='success'> Edit successfully. </div>";
<<<<<<< HEAD
                    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
=======
                    echo "<script>window.location = 'http://localhost:/ct275-project-Taib2014783/public/admin/partials/admin.php'</script>";
>>>>>>> cd13de17b841c3187a316c414c48aa1b44295431
                }
            }
        
        ?>
    </div>
</main>
<?php include "component/footer.php" ?>