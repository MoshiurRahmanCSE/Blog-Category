<?php
    include_once("connect.php");

    // define variables and set to empty values
    $blogTitle = $blogid = $image = $shortDesc = $decription = $writerName = $sql = "";

    if (isset($_POST['delete'])){

      
      //echo "here"; die();
        $blogTitle = $_POST['blogTitle'];
        // $categoryid = $_POST['categoryid'];
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
          }else{
            echo  "Could not upload the file.";
          }
        }
        
        //MySQLi Procedural
        // Insert Query
        $sql = "DELETE FROM blogcategorydb WHERE blogid='$blogid'";
        //echo $sql; die();
        
        if (mysqli_query($conn,$sql)) {
          echo "New record created successfully";
          header("Location: result.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        //echo $sql; die();
      }
?>