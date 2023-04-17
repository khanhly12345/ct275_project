<?php include "component/header.php" ?>
<?php 
    if(!isset($_SESSION['role']) || $_SESSION['role'] == 0) {
        $_SESSION['check_role'] = "<div class='error'>Only admins can add admin. </div>";
        echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
    }
?>
<main class="main">
    <div class="wrap_main">
      <h1>ADD ADMIN</h1>
      <hr>
      <form action="" method="POST" class="form_add" >
        <table>
          <tbody>
                <tr>
                    <th><label for="fullname">Fullname:</label></th>
                    <th><input type="text" id="fullname" name="fullname"><br></th>
                </tr>
                <tr>
                    <th><label for="account">Account:</label></th>
                    <th><input type="text" id="account" name="account"><br></th>
                </tr>
                <tr>
                    <th><label for="password">Password:</label></th>
                    <th><input type="password" id="password" name="password"><br></th>
                </tr>
                <tr>
                    <th><label for="role">Role:</label></th>
                    <th><input type="text" id="role" name="role"><br></th>
                </tr>
                <tr>
                  <th><input type="submit" class="btn btn-primary" name="submit" value="Add Admin"></th>
                </tr>
          </tbody>
        </table>
      </form>
        <?php 
            if(isset($_POST['submit'])) {
                $query = "INSERT INTO admin (fullname, account, password, role) values (?, ?, ?, ?)";
                $sth = $pdo->prepare($query);
                $sth->execute([
                    $_POST['fullname'],
                    $_POST['account'],
                    md5($_POST['password']),
                    $_POST['role']
                ]);
                if($sth) {
                    $_SESSION['add_admin'] = "<div class='success'> Added successfully. </div>";
                    echo "<script>window.location = 'http://localhost:/Project_ct275/public/admin/partials/admin.php'</script>";
                }
            }
        
        ?>
    </div>
</main>
<?php include "component/footer.php" ?>