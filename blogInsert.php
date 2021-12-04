<?php include_once("connect.php"); ?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div class="insert">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid d-flex justify-content-center">
                <h2>Sports Blog</h2>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row flex">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <!-- <li>
                            <div class="nav-link-wrap">
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Category List</span></a>
                                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="sports.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Cricket</span></a>
                                    </li>
                                    <li>
                                        <a href="sports.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Football</span></a>
                                    </li>
                                    <li>
                                        <a href="sports.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Others</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">BLog List</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="blogInsert.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Blog Insert</span></a>
                                </li>
                                <li>
                                    <a href="result.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Blog History</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
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
                                    <div class="mb-3 row">
                                        <label for="blogTitle" class="col-sm-2 col-form-label">Blog Title</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="blogTitle"  class="form-control" placeholder="Write blog Title">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="writerName" class="col-sm-2 col-form-label">Writer Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="writerName"  class="form-control" placeholder="Writer Name">
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
                                        <!-- <img src="photo/<?php echo $row["image"];?>" height="100" width="100" alt="<?php echo $row["name"];?>" title="<?php echo $row["name"];?>"/> -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="javascript/text" src="js/popper.min.js"></script>
    <script type="javascript/text" src="js/bootstrap.min.js"></script>
</body>
</html>