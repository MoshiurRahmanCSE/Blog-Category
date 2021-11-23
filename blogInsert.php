<?php include_once("connect.php"); ?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>  
    <div class="insert-menu">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h2>Sports Blog</h2>
                </div>
                <div class="col-md-3">
                    <div class="menu-bar">
                        <a href="blogInsert.php">Blog Insert</a>
                        <br><br>
                        <a href="result.php">Blog List</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="input">
                        <div class="form">
                            <form method="POST" action="action.php" enctype="multipart/form-data">  
                                <div class="row">                                   
                                    <div class="col-md-12">
                                        <div class="input-field">
                                        <div class="mb-3 row">
                                                <label for="categoryid" class="col-sm-2 col-form-label">Blog Category</label>
                                                <div class="col-sm-4">
                                                <select class="form-select" name="categoryid" required>
                                                    <?php
                                                        $sql = "SELECT categoryid, categoryname FROM categorydb where status=1";
                                                        $result = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                            <option value="<?php echo $row["categoryid"];?>"><?php echo $row["categoryname"];?></option>
                                                            <?php
                                                        }
                                                            
                                                    ?>
                                            </select>
                                                </div>
                                        </div>                                          
                                            <div class="mb-3 row">
                                                <label for="blogTitle" class="col-sm-2 col-form-label">Blog Title</label>
                                                <div class="col-sm-10">
                                                <input type="text" name="blogTitle" class="form-control" placeholder="Write blog Title">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="writerName" class="col-sm-2 col-form-label">Writer Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" name="writerName" class="form-control" placeholder="Writer Name">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="shortDesc" class="col-sm-2 col-form-label">Short Description</label>
                                                <div class="col-sm-10">
                                                <textarea type="text" name="shortDesc" class="form-control" placeholder="Write Sports Description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="decription" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                <textarea type="text" name="decription" class="form-control" placeholder="Write Description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" name="submit" class="submit">Upload</button>
                                            </div>   
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