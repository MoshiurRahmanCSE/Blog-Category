<?php 
    include_once("connect.php");
    if(isset($_GET["id"])){
        $blogid = $_GET["id"];
        $sql = "SELECT blogid, categorydb.categoryname, categorydb.categoryid, blogTitle, image, shortDesc, decription, writerName from blogcategorydb INNER JOIN categorydb ON categorydb.categoryid = blogcategorydb.categoryid WHERE blogid = $blogid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);  
    }
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Sports Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div class="update">
        <div class="container">
            <div class="row">
                <div class="heading d-flex justify-content-center">
                    <h2>Update Sports Blog</h2>
                </div>
                <div class="col-md-2">
                    <div class="update-menu">
                        <a href="blogInsert.php">Blog Insert</a>
                        <br><br>
                        <a href="result.php">Blog List</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="input">
                        <div class="form">
                            <form method="POST" action="updateaction.php" enctype="multipart/form-data">  
                                <div class="row">                                   
                                    <div class="col-md-12">
                                        <div class="input-field">
                                        <div class="mb-3 row">
                                            <label for="categoryid" class="col-sm-2 col-form-label">Update Blog Category</label>
                                            <div class="col-sm-4">
                                                <select class="form-select" name="categoryid" required>
                                                    <?php
                                                        $sql1 = "SELECT categoryid, categoryname FROM categorydb WHERE status=1";
                                                        $result1 = mysqli_query($conn, $sql1);
                                                        while($row1 = mysqli_fetch_assoc($result1)){
                                                            ?>
                                                                <option value="<?php echo $row1["categoryid"];?>" <?php if($row1["categoryid"]==$row["categoryid"]){echo ' selected';}?>><?php echo $row1["categoryname"];?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                                          
                                        <div class="mb-3 row">
                                            <label for="blogTitle" class="col-sm-2 col-form-label">Update Blog Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="blogTitle" class="form-control" placeholder="Write blog Title" value="<?php echo $row["blogTitle"];?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="writerName" class="col-sm-2 col-form-label">Update Writer Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="writerName" class="form-control" placeholder="Writer Name" value="<?php echo $row["writerName"];?>">
                                            </div>
                                        </div>   
                                        <div class="mb-3 row">
                                            <label for="shortDesc" class="col-sm-2 col-form-label">Update Short Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="shortDesc" class="form-control" placeholder="Write Sports Description" rows="3"><?php echo $row["shortDesc"];?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="decription" class="col-sm-2 col-form-label">Update Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="decription" class="form-control" placeholder="Write Description" rows="3"><?php echo $row["decription"];?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="image" class="col-sm-2 col-form-label">Update Image</label>
                                            <div class="col-sm-10">
                                            <img src="photo/<?php echo $row["image"];?>" height="100" width="100" alt="<?php echo $row["image"];?>" title="<?php echo $row["image"];?>"/>
                                                <input class="form-control" type="file" id="image" name="image">
                                            </div>
                                        </div>                                       
                                        <div class="d-grid">
                                            <input type="hidden" name="id" value="<?php echo $blogid;?>">
                                            <button type="submit" name="submit" value="update">Update</button>   
                                        </div>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="javascript/text" src="js/popper.min.js"></script>
    <script type="javascript/text" src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>