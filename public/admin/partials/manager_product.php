    <?php include "component/header.php" ?>

    <main class="main">
        <div class="wrap_main">
            <h1>MANAGER PRODUCT</h1>
            <hr>
            <a href="add_product.php" class="btn btn-primary">Add Product</a>
            <br>
            <?php
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['update'])) {
                    echo $_SESSION['update'];   
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['failed-remove'])) {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
                if(isset($_SESSION['delete_product'])) {
                    echo $_SESSION['delete_product'];
                    unset($_SESSION['delete_product']);
                }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID_product</th> 
                        <th scope="col">Img</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>    
                <tbody>
                    <?php
                        try{
                            $query = "SELECT * FROM product";
                            $sth = $pdo->query($query);
                            $count = 0;
                            while($row = $sth->fetch()) {
                                $count++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $count;?></th>
                                    <td><?php echo $row['id_product'];?></td>
                                    <td style="width: 20%; position: relative;"> <img style="width: 50%;" src="../upload_img/product/<?php echo $row['img'];?>" alt=""></td>
                                    <td><?php echo $row['titte'];?></td>
                                    <td><?php echo $row['price'];?></td>
                                    <td><?php echo $row['type'];?></td>
                                    <td><a href="edit_product.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a> <a href="delete_product.php?id=<?php echo $row['id_product']?>&img=<?php echo $row['img'];?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                            }
                        }catch(PDOException $e){
                            echo $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
    </main>

    <?php include "component/footer.php" ?>