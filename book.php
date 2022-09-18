<!-- select-menu.php -->
<?php
if (isset($_POST['confirm'])) {
    include 'dbCon.php';
    $con = connect();

    $res_id = $_POST['res_id'];
    $reservation_name = $_POST['reservation_name'];
    $reservation_phone = $_POST['reservation_phone'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];



    include 'template/header.php'; ?>

    <body>

        <?php include 'template/nav-bar_gray.php'; ?>
        <!-- END nav -->


        <section class=" bg-light" style="padding: 3em;">
            <div class="container">
                <div class="row" style="justify-content: center; padding: 2rem;">
                    <div class="col-md1" style="text-align:center; line-height: 1.5; color: #404044; margin-bottom: 2rem; font-family: inherit;">
                        <h2 style="font-size: 33px; font-weight:500;">Confirm Your Booking</h2>
                    </div>


                    <div class="container">
                        <div class="col " style="display: flex; padding: 1.5rem 1.5rem; background: white;">
                            <div style="align-self:center; margin: 20px;">
                                <p style="margin-bottom:15px"><span style="font-weight: bold;">Name:</span> <a href="" style="color: black;"><?php echo $reservation_name; ?></a></p>
                                <p style="margin-bottom:15px"><span style="font-weight: bold;">Phone:</span> <a style="color: black;" href="tel://1234567920"><?php echo $reservation_phone; ?></a></p>
                                <p style="margin-bottom:15px"><span style="font-weight: bold;">Reservation Date:</span> <a style="color: black;" href=""><?php echo $reservation_date; ?></a></p>
                                <p style="margin-bottom:15px"><span style="font-weight: bold;">Reservation Time:</span> <a style="color: black;" href=""><?php echo $reservation_time; ?></a></p>
                                <div class="col" style="background: white;">
                                    <div>
                                        <p><span style="font-weight: bold;">Table No:</span>
                                            <?php for ($p = 0; $p < count($_POST['table']); $p++) {
                                                $t_id = $_POST['table'][$p];
                                                $sql4 = "SELECT * FROM `restaurant_tables` WHERE id = '$t_id';";
                                                $result4 = $con->query($sql4);
                                                foreach ($result4 as $r4) {
                                            ?>
                                                    <a style="color: black;"><?php echo $r4['table_name']; ?></a>
                                            <?php }
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <form action="manage-insert.php" method="POST" style="margin-top: 15px;">
                            <div class="container" style="text-align: center;">
                                <input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
                                <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                                <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                                <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                                <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                                
                                <?php for ($r = 0; $r < count($_POST["table"]); $r++) {
                                    $tbl_id = $_POST['table'][$r]; ?>
                                    <input type="hidden" name="table[]" value="<?php echo $tbl_id; ?>">
                                <?php } ?>



                                <form method="post">
                                    <div style="margin-top:20px;">
                                    <input type="checkbox" id="terms_and_conditions" value="1" onclick="terms_changed(this)" />
                                        <label style="font: size 15px;" for="terms_and_conditions">I agree to the Terms of Service</label>
                                        
                                    </div>
                                </form>




                                <script>
                                    function terms_changed(termsCheckBox) {
                                        //If the checkbox has been checked
                                        if (termsCheckBox.checked) {
                                            //Set the disabled property to FALSE and enable the button.
                                            document.getElementById("book").disabled = false;
                                        } else {
                                            //Otherwise, disable the submit button.
                                            document.getElementById("book").disabled = true;
                                        }
                                    }
                                </script>

                                <button style="font-size: 22px;margin-top: 40px;border-radius: 10px;" class="btn_confirm" disabled style="font-size:15px" type="submit" id="book" name="book" class="btn"> Book</button>
                            </div>
                        </form>


        </section>

        <?php include "template/footer_list.php" ?>
    </body>

    </html>
<?php } ?>