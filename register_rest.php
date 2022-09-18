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
            <form class="log-in" action="manage-insert.php" method="post" enctype="multipart/form-data">

                <div class="login_box">
                    <div class=" white1">
                        <p class="Restautant_login" style="text-align: center; font-family:'Brygada 1918', serif; font-size: 1.2em;"><b> Restaurant Login </b></p>
                        <label for="name"><b>Restaurant Name:</b></label>
                        <input class="box1" type="text" placeholder="Enter name" name="name" required><br><br>
                        <label for="uname"><b>Email-ID :</b></label>
                        <input class="box1" type="text" placeholder="Enter Username" name="uname" required><br><br>
                        <label for="phone"><b>Contact No.:</b></label>
                        <input class="box1" type="text" placeholder="Enter phone" name="phone" required><br><br>
                        <label for="address"><b>Address:</b></label>

                        <input class="box1" type="text" placeholder="Enter Adress" name="address" required><br><br>

                        <input type="file" name="logo" class="form-control" required="" style="margin-bottom: 1rem;">
                        <label for="psw"><b>Password :</b></label>
                        <input class="box1" type="password" placeholder="Enter Password" name="psw" required><br><br>
                    </div>
                    <button type="submit" class="btn btn-primary" value="Register" name="regasres">Register</button>
                    <div class="cancel_box">
                        <button type="button" onclick="window.location.href='index.php'" class="cancelbtn btn btn-danger">Cancel</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <?php include 'template/footer_login.php'; ?>
</body>

</html>