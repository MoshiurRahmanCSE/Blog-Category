<?php include_once("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Blog Find Result</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid d-flex justify-content-center">
                <h2>Sports Blog History Details</h2>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category List
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Cricket</a></li>
                                <li><a class="dropdown-item" href="#">Football</a></li>
                                <li><a class="dropdown-item" href="#">Hocky</a></li>
                                <li><a class="dropdown-item" href="#">Others</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog List
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Blog Insert</a></li>
                                <li><a class="dropdown-item" href="#">Blog History</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row flex">
            <div class="col-xl-2">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
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
                                    <!-- <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Hocky</span></a>
                                    </li> -->
                                    <li>
                                        <a href="sports.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Others</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
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
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="header">
                            <!-- Inner Join -->
                            <?php
                                $sql = "SELECT blogid, categorydb.categoryname, categorydb.categoryid, blogTitle, image, shortDesc, decription, writerName from blogcategorydb INNER JOIN categorydb ON categorydb.categoryid = blogcategorydb.categoryid";
                                $result = mysqli_query($conn, $sql);
                                    
                                if (mysqli_query($conn, $sql)) {
                                    // echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            ?>
                            <table class="table table-striped table-bordered" style="width:100%" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Blog Id</th>
                                        <th>Category Name</th>
                                        <th>Blog Title</th> 
                                        <th>Writer Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row    
                                            while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>  
                                            <td><?php echo $row["blogid"];?></td>          
                                            <td><?php echo $row["categoryname"];?></td>
                                            <td><?php echo $row["blogTitle"];?></td>
                                            <td><?php echo $row["writerName"];?></td>
                                            <td><img src="photos/<?php echo $row["image"];?>" height="100" width="100" alt="<?php echo $row["blogTitle"];?>" title="<?php echo $row["blogTitle"];?>"/></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $row["blogid"];?>">
                                                    <button>Update</button>
                                                </a>
                                                <a href="delete.php?id=<?php echo $row["blogid"];?>">
                                                    <button>Delete</button>
                                                </a>             
                                            </td>
                                        </tr>
                                    <?php }}
                                        
                                        // else {
                                        //     echo "0 results";
                                        // }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Blog Id</th>
                                        <th>Category Name</th>
                                        <th>Blog Title</th> 
                                        <th>Writer Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="javascript/text" src="js/popper.min.js"></script>
    <script type="javascript/text" src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
</body>
</html>