<?php include 'template/header.php';
if (isset($_POST['reservation'])) {
    $res_id = $_POST['res_id'];
    $reservation_name = $_POST['reservation_name'];
    $reservation_phone = $_POST['reservation_phone'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
?>

    <body>
        <?php include 'template/nav-bar_gray.php'; ?>


        <section style="padding: 3em;">
            <div class="container">
                <div class="row" style="justify-content: center; padding: 3rem;">
                    <div class="col-md-8" style="flex: 0 0 58.33333%; text-align:center;">
                        <h2 style="font-size: 33px; font-weight:500;">Choose Your Table</h2>
                    </div>
                </div>

                <form action="book.php" method="POST">
                    <div class="row">
                        <div class="col-md-12 dish-menu">
                            <div class="tab-content" style="padding: 3rem;" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <img class="tables" src="images/rest1_table.jpg" style="margin-left: 300px; margin-top: -50px;">



                                    <?php
                                    include 'dbCon.php';
                                    $con = connect();
                                    $sql = "SELECT * FROM `restaurant_tables` WHERE res_id = '$res_id';";
                                    $result = $con->query($sql);
                                    foreach ($result as $r) {
                                        $table_id = $r['id'];
                                        $booked = $r['booked'];
                                    ?>
                                        <div class="col-md" style="min-height: 20px">
                                            <p style="font-weight: bold; padding: ">Table <?php echo @$i += 1 ?></p>
                                            <div class="tables22">
                                                <?php if ($booked == 1) { ?>
                                                    <input type="checkbox" disabled="" id="restTable<?php echo $table_id; ?>" name="table[]" value="<?php echo $table_id; ?>" class="restTable" data-id="<?php echo $table_id; ?> ">
                                                <?php } else { ?>
                                                    <input type="checkbox" onclick="terms_changed(this)" id="restTable<?php echo $table_id; ?>" name="table[]" value="<?php echo $table_id; ?>" class="restTable" data-id="<?php echo $table_id; ?>">
                                                <?php }  ?>
                                            </div>
                                        </div>
                                    <?php } ?>


                                    <script>
                                        function terms_changed(termsCheckBox) {
                                            if (termsCheckBox.checked) {
                                                document.getElementById("confirm").disabled = false;
                                            } else {
                                                document.getElementById("confirm").disabled = true;
                                            }
                                        }
                                    </script>


                                    <div class="col-md1" style="margin-top: 30px;text-align: center; margin-left: 50px;">
                                        <div class="form-group">
                                            <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
                                            <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                                            <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                                            <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                                            <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                                            <input type="hidden" name="" value="<?php echo $table_id; ?>">
                                            <p style="text-align: center; " id="viewMenu">
                                                <button type="submit" disabled id="confirm" value="Confirm" name="confirm" class="btn_confirm" style="font-size: 22px; border-radius: 10px"> Confirm</button>
                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>

        <?php include 'template/footer_list.php'; ?>

    </body>
<?php } else {
}
?>

</html>