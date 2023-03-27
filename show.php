<?php
include('config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show page</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
    <div class="left">
        <?php require 'menu.php'; ?>
        </div>
        <div class="right">
            <?php

       $query = "SELECT *  FROM crud_php";
       $prepared = $conn->prepare($query);
       $prepared->execute();
       $result = $prepared -> fetchAll(PDO::FETCH_ASSOC);
            ?>
        <h3>Employee List</h3>
        <form action="manfunctions.php" method="post"class="empform" id="updateform" enctype="multipart/form-data" >

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
                        foreach($result as $data) {
   
   ?>
    <tr>
        <td><?php echo $data['id']?></td>
        <td><?php echo $data['name']; ?> </td>
        <td><?php echo $data['email']; ?> </td>
        <td><img src="<?= $data['profilepic'] ?>" width="60" height="60"></td>
        <td>
        <a href="edit.php?empid=<?= $data['id'] ?>">Edit</a> 
        <a href="manfunctions.php?empid=<?= $data['id']?>&submit=delete" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
                    
   
    </tr>

    <?php
  }
  ?>


                        </tbody>
</table>
        </form>

        </div>
    </div>
    
</body>
</html>