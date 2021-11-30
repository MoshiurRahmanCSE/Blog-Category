<?php 
    include_once("connect.php"); 
    $sqlCat = "SELECT categoryid, categoryname FROM categorydb WHERE status = 1";
    $res = mysqli_query($conn, $sqlCat);
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sports Blog</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.maateen.me/solaiman-lipi/font.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div class="header-menu header-menu-light bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="title">
                        <h2> Football Blog</h2>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="menu-bar d-flex justify-content-end">
                        <a href="home.php">Home</a>
                        <a href="#">Contact</a>
                        <?php while($cat = mysqli_fetch_assoc($res)){ ?>
                            <a href="category.php?id=<?php echo $cat["categoryid"];?>"><?php echo $cat["categoryname"];?></a>
                        <?php 
                            } 
                        ?>
                        
                        <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row">
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
                                    <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Hocky</span></a>
                                    </li>
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
        </div>
    </div> -->
    <div class="container">
        <div class="row flex">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-title ">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="details-header">
                                        <?php
                                            $sql = "SELECT categoryid, categoryname FROM categorydb WHERE categoryid = 1";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row1["categoryname"];?></li>
                                                    </ol>
                                                </nav>
                                            <?php
                                                }                                          
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                $sql = "SELECT categoryid, blogTitle, image, shortDesc, writerName FROM blogcategorydb WHERE categoryid = 2";
                                $result = mysqli_query($conn, $sql);
                                                                
                                if (mysqli_query($conn, $sql)) {
                                    // echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            ?>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row    
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-xl-4">
                                <div class="left-details">
                                <img src="photos/<?php echo $row["image"];?>" height="100%" width="100%" alt="<?php echo $row["blogTitle"];?>" title="<?php echo $row["blogTitle"];?>"/>
                                    <?php echo $row["blogTitle"];?>
                                    <br>
                                    <?php echo $row["writerName"];?>
                                    <br>
                                    <?php echo $row["shortDesc"];?>                                       
                                    
                                </div>
                            </div>
                            <?php } }                                           
                            else {
                                echo "0 results";
                            } ?>
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