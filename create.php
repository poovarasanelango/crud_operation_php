<?php
include('./config.php');
    



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
    <div class="left">
                <?php require 'menu.php'; ?>
            </div>
        <div class="right">
            
            <form action="manfunctions.php" method="post" class="empform" id="empform" enctype="multipart/form-data">
                <table cellspacing="20">
                    <tr>
                        <th colspan="2">New Form</th>
                    </tr>
                    <tr>
                        <td>Emp Id</td>
                        <td><input type="text" name="empid" id="empid"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="empname" id="empname" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="empemail" id="empemail" /></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><input type="file" name="profilepic" id="profilepic" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="sbtn" name="submit" id="submit" value="create">Submit</button></td>
                    </tr>

                </table>


            </form>
        </div>

    </div>
</body>

</html>