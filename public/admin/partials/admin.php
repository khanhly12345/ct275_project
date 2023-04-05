<?php include "component/header.php" ?>
<main class="main">
    <div class="wrap_main"> 
        <div class="container"> 
            <h1>MANAGER ADMIN</h1>
            <hr>    
            <?php 
                if(isset($_SESSION['add_admin'])) {
                    echo $_SESSION['add_admin'];
                    unset($_SESSION['add_admin']);
                }
                if(isset($_SESSION['edit_admin'])) {
                    echo $_SESSION['edit_admin'];
                    unset($_SESSION['edit_admin']);
                }
                if(isset($_SESSION['delete_admin'])) {
                    echo $_SESSION['delete_admin'];
                    unset($_SESSION['delete_admin']);
                }
                                
                if(isset($_SESSION['check_role'])) {
                    echo $_SESSION['check_role'];
                    unset($_SESSION['check_role']);
                }
                if(isset( $_SESSION['check_admin_delete'])) {
                    echo  $_SESSION['check_admin_delete'];
                    unset( $_SESSION['check_admin_delete']);
                }
                // if(isset($_SESSION['check_admin'])) {
                //     $id = $_SESSION['check_admin'];
                //     $query = "select * from admin where id = $id";
                //     $sth = $pdo->query($query);
                //     $sth->execute();
                //     $row = $sth->fetch();
                //     echo "<span style='color: red'>Chào! ".$row['fullname']."</span>"."<br>";
                // }
            ?>
            <br>    
            <a href="add_admin.php" class="btn btn-primary">Add Admin</a>
            <table class="table">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fullname</th> 
                            <th scope="col">Account</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                </thead>  
                <tbody>
                    <?php 
                        $query = "select * from admin";
                        $sth = $pdo->query($query);
                        $sth->execute();
                        $n = 0;
                        while($row = $sth->fetch()) {
                            $n++;
                            ?>
                            <tr>
                                <td><?php echo $n?></td>
                                <td><?php echo $row['fullname']?></td>
                                <td><?php echo $row['account']?></td>
                                <td><?php echo $row['password']?></td>
                                <td>
                                    <?php 
                                        if($row['role'] == 1) {
                                            echo "Quản lí";
                                        }else{
                                            echo "Nhân viên";
                                        }
                                
                                    ?>
                                </td>
                                <td><a href="edit_addmin.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a> <a href="delete_addmin.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include "component/footer.php" ?>