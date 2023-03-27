<?php
include('config.php');
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <div class="left">
        <?php require 'menu.php'; ?>
        </div>
        <div class="right">
            <?php
          
       $query = "SELECT *  FROM crud_php WHERE id=$empid";
       $prepared = $conn->prepare($query);
       $prepared->execute();
       $result = $prepared -> fetchAll(PDO::FETCH_ASSOC);
              
            ?>
            <form action="manfunctions.php" method="post"class="empform" id="updateform" enctype="multipart/form-data" >
                <table cellspacing="20">
                    <tr>
                        <th colspan="2">New List <span id="update-status"></span></th>
                    </tr>
                    <?php
                  foreach($result as $data) {

                    ?>
                    <tr>
                      <td>Emp ID</td>
                      <td><input type="text" name="empid" id="empid"  value="<?php echo $data['id'] ?>" readonly="" /></td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td><input type="text" name="empname" id="empname" value="<?php echo $data['name'] ?>"/></td>
                    </tr>
                    <tr>
                       <td>Email</td>
                       <td><input type="email" name="empemail" id="empemail"  value="<?php echo $data['email'] ?>"/></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><img src="<?php echo $data['profilepic'] ?>" alt="Profile Picture" width="200" height="200"/></td>
                     </tr>
                      <tr>
                    <td>Change(optional)</td>
                    <td><input type="file" name="profilepic"  id="profilepic" /></td>
                     </tr>
                    <tr>
                  <td></td>
                  <td><button class="sbtn" name="submit" id="submit" value="update">Update</button></td>
                    </tr>


                    <?php
                    }
                    ?>
                </table>


            </form>

        </div>
    </div>
    
</body>
</html>