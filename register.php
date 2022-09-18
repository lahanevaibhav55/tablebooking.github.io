<!-- signin.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'template/nav-bar.php'; ?>
    <!-- END nav -->

    <div class="login_page">

        <img class="login_bg" src="images/login_1.jpg" alt="Snow">

        <div class="centered">
            <form class="log-in" action="index.php" method="post">

                <div class="login_box">
                    <div class="reg_white1">
                    </div>
                    <button type="button" style="margin-bottom: 36px; padding: 10px;font-size: 24px; border-radius: 15px;"class="btn btn-primary" onclick="window.location.href='register_cust.php'">As Customer</button>
                    <div class="cancel_box">
                        <button type="button" style="margin-bottom: 0px; padding: 10px;font-size: 24px; border-radius: 15px;"onclick="window.location.href='register_rest.php'" class="cancelbtn btn btn-primary">As Restaurant</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <?php include 'template/footer_login.php'; ?>
</body>`

</html>