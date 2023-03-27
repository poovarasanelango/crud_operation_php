<?php
 //include('./config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="left">
      <?php 
      //require 'menu.php'; ?>
        </div>
        <div class="right">
        <!-- <form action="manfunctions.php" method="post" class="empform" id="updateform" enctype="multipart/form-data" > -->

            <?php
            $query=$conn->prepare("select * from crud_php");
           $query->execute([]);
           // $row = $query->fetchAll(PDO::FETCH_ASSOC);

            if($query->rowCount()>0){
                
            ?>
            <h3>Employed List</h3>
            <table class="emplist">
            <thead>
            <tr>
            <th>Emp id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
           <th>Action</th>
                              
            </tr>
            </thead>
            <tbody>
                <?php
                //to take one one row
                 
                while($row=$query->fetchAll(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <!-- to pass the value in databses column name  -->
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><img src="<?= $row['profilepic'] ?>" width="50" height="50"></td>
                     <!-- <td>
                        <a href="edit.php?empid=<?= $row['id'] ?>">Edit</a> 
                        <a href="manfunctions.php?empid=<?=$row['id']?>&submit=delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                     -->
                </tr>
                <?php
            }
            ?>

            </tbody>
            </table>
            <?php
            }else{
                echo "not found";
            }
            ?>
            <!-- </form> -->

        </div>

    </div>


</body>
</html>