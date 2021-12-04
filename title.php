<?php 
    include_once("connect.php"); 
    $sqlCat = "SELECT categoryid, categoryname FROM categorydb WHERE status = 1";
    $res = mysqli_query($conn, $sqlCat);
?>
<!DOCTYPE html>
<html lang="en">
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
    <div class="header-menu header-menu-expand-lg header-menu-light bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="title">
                        <h2>Sports Blog</h2>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="menu-bar d-flex justify-content-end">
                        <a href="home.php">Home</a>
                        <!-- <a href="#">Contact</a> -->
                        <?php while($cat = mysqli_fetch_assoc($res)){ ?>
                            <a href="category.php?id=<?php echo $cat["categoryid"];?>"><?php echo $cat["categoryname"];?></a>
                        <?php 
                            } 
                        ?>
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