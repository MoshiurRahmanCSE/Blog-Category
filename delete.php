<?php 
    include_once("connect.php");
    if(isset($_GET["id"])){
        $blogid = $_GET["id"];
        $sql = "DELETE FROM blogcategorydb WHERE blogid = $blogid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)){

        }else{
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } 
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Sports Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid d-flex justify-content-center">
                <h2>Sports Blog</h2>
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
                </div>
            </div>
        </nav>
    </div>
    <div class="delete">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="input">
                        <div method="POST" action="result.php" enctype="multipart/form-data">
                            <div class="alert alert-danger  d-flex justify-content-center" role="alert">
                                Are you sure want to delete..!
                            </div>
                                <button type="delete" name="delete" class="<?php echo $row["blogid"];?>">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="javascript/text" src="js/popper.min.js"></script>
    <script type="javascript/text" src="js/bootstrap.min.js"></script>
</body>
</html>