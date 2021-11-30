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
                        <h2> Others Blog</h2>
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
                                $sql = "SELECT categoryid, blogTitle, image, shortDesc, writerName FROM blogcategorydb WHERE categoryid = 3";
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
                                    <a href="category.php?id=<?php echo $row["categoryid"];?>">                                     
                                    
                                </div>
                            </div>
                            <?php }
                                    ?>
                            <?php }                                           
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