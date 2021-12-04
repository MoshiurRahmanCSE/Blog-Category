<?php 
    include_once("connect.php");
    if(isset($_GET["id"])){
        $blogid = $_GET["id"];
        //echo $blogid;die();
    }
    $sql = "SELECT blogid, categoryid, blogTitle, image, shortDesc, decription, writerName FROM blogcategorydb WHERE blogid = $blogid";
    //echo $sql; die();
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    $categoryid = $row1["categoryid"];
    $blogTitle = $row1["blogTitle"];
    $image = $row1["image"];
    $shortDesc = $row1["shortDesc"];
    $decription = $row1["decription"];
    $writerName = $row1["writerName"];
    //echo $categoryid;die();
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
    <!-- <div class="header-menu header-menu-light bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="title">
                        <h2>Blog Details</h2>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="menu-bar d-flex justify-content-end">
                        <a href="home.php">Home</a>
                        <a href="#">Contact</a>
                        <?php
                            $sql1 = "SELECT categoryid, categoryname FROM categorydb WHERE categoryid = $categoryid";
                            $res = mysqli_query($conn, $sql1);
                            $row2 = mysqli_fetch_assoc($res);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php include_once("title.php");?>
    <div class="container">
        <div class="row flex">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-title">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="details-header">
                                        <?php                                           
                                            $sql1 = "SELECT categoryid, categoryname FROM categorydb where categoryid = $categoryid";
                                            $res = mysqli_query($conn, $sql1);
                                            $row = mysqli_fetch_assoc($res);
                                        ?>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"><?php echo $row["categoryname"];?></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xl-9">
                                <div class="details">
                                    <a href="details.php?id=<?php echo $cat["blogid"];?>">
                                        <div class="title">
                                            <?php echo $blogTitle;?>
                                        </div>
                                        <div class="publish">
                                            <?php echo $writerName;?> || <?php echo "". date("Y-m-d h:i:sa"); ?>
                                        </div>
                                        <div class="img d-flex justify-content-center">
                                            <img src="photos/<?php echo $image;?>" height="100%" width="100%" alt="<?php echo $blogTitle;?>" title="<?php echo $blogTitle;?>"/>
                                        </div>
                                        <b><p><?php echo $shortDesc;?></p></b>
                                        <p><?php echo $decription;?></p> 
                                    </a>                               
                                </div>
                            </div>
                           
                            <div class="col-xl-3"></div>
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