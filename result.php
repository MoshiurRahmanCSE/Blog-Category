<?php include_once("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Blog Find Result</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.php">
    <link rel="stylesheet" href="action.php">
</head>

<body>
    <div class="header-menu">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="menu-bar">
                        <a href="blogInsert.php">Blog Insert</a>
                        <br><br>
                        <a href="result.php">Blog List</a>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="header">
                        <!-- Inner Join -->
                        <?php
                            $sql = "SELECT blogcategorydb.blogid , categorydb.categoryid, blogTitle, image, shortDesc, decription, writerName from categorydb INNER JOIN blogcategorydb ON categorydb.categoryid = blogcategorydb.categoryid";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_query($conn, $sql)) {
                                // echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        ?>
                        <table class='table'>
                            <tr>
                                <th>Blog Id</th>
                                <th>Category Id</th>
                                <th>Blog Title</th> 
                                <th>Short Desc</th>
                                <th>Decription</th>
                                <th>Writer Name</th>
                                <th>Image</th>
                            </tr>
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row    
                                    while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>  
                                <td><?php echo $row["blogid"];?></td>          
                                <td><?php echo $row["categoryid"];?></td>
                                <td><?php echo $row["blogTitle"];?></td>
                                <!-- <td><?php echo $row["image"];?></td> -->
                                <td><?php echo $row["shortDesc"];?></td>
                                <td><?php echo $row["decription"];?></td>
                                <td><?php echo $row["writerName"];?></td>
                                <td><img src="photos/<?php echo $row["image"];?>" height="100" width="100" alt="<?php echo $row["blogTitle"];?>" title="<?php echo $row["blogTitle"];?>"/></td>
                            </tr>
                            <?php }
                                
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </table>
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