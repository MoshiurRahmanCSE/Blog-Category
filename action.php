<?php
    include_once("connect.php");
    // define variables and set to empty values
    $blogTitle = $categoryid = $image = $shortDesc = $decription = $writerName = $sql = "";

    if (isset($_POST['submit'])){      
      //echo "here"; die();
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
          }else{
            echo  "Could not upload the file.";
          }
        }        
        //MySQLi Procedural
        // Insert Query
        $sql = "INSERT INTO blogcategorydb (blogTitle,categoryid, image, shortDesc, decription, writerName) VALUES ('".$blogTitle."','$categoryid','".$file_name."','".$shortDesc."','".$decription."','".$writerName."')";
        if (mysqli_query($conn,$sql)) {
          echo "New record created successfully";
          header("Location: result.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        //echo $sql; die();
      }
?>