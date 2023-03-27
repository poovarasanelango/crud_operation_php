<?php
include('./config.php');

extract($_REQUEST);// To take variable name either post and get method 
if (isset($submit) && $submit == 'create'){

  

  $fname = $_FILES['profilepic']['name'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));

  if($ext=='jpg' || $ext=='png' || $ext=='jpeg'){
   //folder
    $dir ='profilepic';
    //to store img employed id base
   $newfname=$empid.'.'.$ext;

   $profilepic_path=$dir . '/'.$newfname;
   // to move profilepic name to store in  profilepic_path 
   move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);
   
   $query =$conn->prepare("INSERT INTO crud_php (id,name,email,profilepic) values ('$empid','$empname','$empemail','$profilepic_path')");
   $result= $query->execute();
   echo "okay";
   header('location:show.php');
  }
   else{
    echo "error";
   }
  
}

//update or edit 
else if(isset($submit)&& $submit=='update'){
  $fname=$_FILES['profilepic']['name'];
  $ext=strtolower(end(explode('.',$fname)));
  if($_FILES['profilepic']['size']==0){
    $query=$conn->prepare("UPDATE crud_php set name='$empname',email='$empemail' WHERE id='$empid'");
    $result= $query->execute();
    if($result){
      header('location:show.php');
     }
     else{
      echo "error";
     }
    }
    else{



      $fname = $_FILES['profilepic']['name'];
    $tr = explode('.', $fname);
    $ext = strtolower(end($tr));

  if($ext=='jpg' || $ext=='png' || $ext=='jpeg'){
   //folder
    $dir ='profilepic';
    //to store img employed id base
   $newfname=$empid.'.'.$ext;

   $profilepic_path=$dir . '/'.$newfname;
   // to move profilepic name to store in  profilepic_path 
   move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepic_path);
   
   $query =$conn->prepare("UPDATE crud_php set name='$empname',email='$empemail' ,profilepic='$profilepic_path'WHERE id='$empid'");
   $result= $query->execute();
   echo "okay";
   if($result){
    header('location:show.php');
   }
   else{
    echo "error";
   }
  }
    }

  }

else if (isset($submit)&& $submit=='delete'){
  //echo "poovarasan hello";
  $query = "SELECT profilepic  FROM crud_php WHERE id='$empid'";
  $prepared = $conn->prepare($query);
  $prepared->execute();
 // echo "poooo";
  $result = $prepared -> fetchAll(PDO::FETCH_ASSOC);
  $profilepic_path=$result['profilepic'];
  if(file_exists($profilepic_path)){
         unlink($profilepic_path);// path file delete
  }
  $query=$conn->prepare("DELETE  FROM crud_php where id='$empid'");
  $query->execute();
 header('location:show.php');

}





?>
