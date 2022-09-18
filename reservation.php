<?php include 'template/header.php';
include 'dbCon.php';
if (!isset($_SESSION['isLoggedIn'])) {
    echo '<script>alert("You need to login first.")</script>';
    echo '<script>window.location="login.php"</script>';
}
?>

<body>
    <?php include 'template/nav-bar_gray.php'; ?>

    <div class="row list_row bg-light" style="width: 101%;">
        <h2>Make a Reservation</h2>
    </div>

    <section class="bg-light">
        <div class="container">
            <div class="row" style="justify-content:center; padding-bottom: 3rem; margin-bottom: 3rem;">
                <div class="col-md1" style="text-align:center;">
                    <h2 style="font-size: 34px; font-weight: 600;">Choose a Reservation Date and Time</h2>
                </div>
            </div>
            <div class="row" style="display: flex;">
                <div col-md style="margin: auto;">
                    <?php
                    $con = connect();
                    $sql = "SELECT * FROM `restaurant_info` WHERE id = 21;";
                    $result = $con->query($sql);
                    foreach ($result as $r) {
                    ?>
                        <div class="rest_img1" style="background-image: url(images/<?php echo $r['logo']; ?>); flex: 0 0 33.33333%;"></div>
                    <?php } ?>
                </div>



                <div class="col-md-8 bg-light" style="padding: 3rem; margin: auto">

                    <form action="choose-table.php" method="POST">
                        <div class="row" style=" margin-top: 1rem;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" required="" value="<?php echo $_SESSION['name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" required="" value="<?php echo $_SESSION['phone']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="reservation_date" class="form-control" placeholder="Date" required="" min="<?php echo date('Y-m-d'); ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time</label>
                                    <select name="reservation_time" class="form-control" placeholder="Time" required="">
                                        <option value="10:00am">10:00am</option>
                                        <option value="10:45am">10:45am</option>
                                        <option value="11:30am">11:30am</option>
                                        <option value="12:15pm">12:15pm</option>
                                        <option value="1:15pm">1:15pm</option>
                                        <option value="2:15pm">2:15pm</option>
                                        <option value="3:15pm">3:15pm</option>
                                        <option value="4:15pm">4:15pm</option>
                                        <option value="5:15pm">5:15pm</option>
                                        <option value="6:15pm">6:15pm</option>
                                        <option value="7:15pm">7:15pm</option>
                                        <option value="8:00pm">8:00pm</option>
                                        <option value="8:45pm">8:45pm</option>
                                        <option value="9:30pm">9:30pm</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md" style="margin-left: 320px; margin-top: 15px;">
                                <div class="form-group">
                                    <input type="hidden" name="res_id" value="<?php echo $_GET['res_id']; ?>">
                                    <input type="submit" name="reservation" value="Submit" class="btn btn-info">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>














            </div>
        </div>
    </section>
    <?php include 'template/footer_list.php'; ?>

</body>

</html>