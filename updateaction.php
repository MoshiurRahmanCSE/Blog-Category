<?php
  include_once("connect.php");

  // define variables and set to empty values
  $blogid = $blogTitle = $categoryid = $image = $shortDesc = $decription = $writerName = $sql = ""; $imgUpload=0;

  if (isset($_POST['submit'])){
    $blogid = $_POST['id'];
    //echo $blogid; die();
    $blogTitle = $_POST['blogTitle'];
    $categoryid = $_POST['categoryid'];
    $shortDesc = $_POST['shortDesc'];
    $decription = $_POST['decription'];
    $writerName = $_POST['writerName'];

      // Image upload and save file
      if(isset($_FILES['image'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
  
        //Image upload and set in folder
        if(move_uploaded_file($file_tmp,"photos/"  . $file_name)){
          echo "Successfully Uploaded.";
          $imgUpload=1;
        }else{
          echo  "Could not upload the file.";
          $imgUpload=2;
        }
        // echo $sql; die();
      }
      
      //MySQLi Procedural
      // Update Query
      $sql = "UPDATE blogcategorydb
      SET blogTitle = '".$blogTitle."',
      categoryid = '$categoryid',
      shortDesc = '".$shortDesc."',
      decription = '".$decription."',";
      if($imgUpload==1){$sql .= "image='".$file_name."',";}
      $sql .="writerName = '".$writerName."'
      WHERE blogid = '$blogid'";
      //echo $sql; die();
      
      if (mysqli_query($conn, $sql)) {
        echo "New record updated successfully";
        header("Location: result.php");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      // echo $sql; die();
    }
?>