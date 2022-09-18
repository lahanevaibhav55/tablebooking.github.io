<?php include 'template/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Restaurant</title>
    <link rel="stylesheet" href="style/style_list.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramaraja&family=Sansita+Swashed&display=swap" rel="stylesheet">

</head>

<body>
    <?php include 'template/nav-bar_gray.php'; ?>
    <?php include 'dbCon.php' ?>

    <div class="row list_row" style="margin-right:0px">
        <h2>Restaurant List</h2>
    </div>

    <section ftco-section bg-light>
        <div class="container">
            <div class="row">
                <div class="col-md1">
                    <div class="tab-content" style="padding:3rem 0px">
                        <div class="tab-home">
                            <div class="row">
                                <?php
                                    $con = connect();
                                    $sql = "SELECT * FROM `restaurant_info` WHERE role = 1;";
                                    $result = $con->query($sql);
                                    foreach ($result as $r) {
                                ?>
                                <div class="col-md1">
                                    <div class="res_list">
                                        <div class="rest_img" style="background-image: url(images/<?php echo $r['logo']; ?>)"></div>
                                        <div class="text">
                                            <div class="row one-half">
                                                <div class="col-md1">
                                                    <h3 class="rest_title"><?php echo $r['name']; ?></h3>
                                                </div>
                                                <div class="col-md1">
                                                    <p class="rest_address"><?php echo $r['address']; ?></p>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <a href="reservation.php?res_id=<?php echo $r['id']; ?>" class="btn btn-info" style="width: 100%; margin-top: 18px;">Book Table</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include 'template/footer_list.php'; ?>



</body>

</html>