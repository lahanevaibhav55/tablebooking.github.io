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
            <form class="log-in" action="" method="post">



                <div class="login_box">
                    <div class=" white1">
                        <label for="uname"><b>Email-ID :</b></label>
                        <input class="box1" type="text" placeholder="Enter Username" name="uname" required><br><br>

                        <label for="psw"><b>Password :</b></label>
                        <input class="box1" type="password" placeholder="Enter Password" name="psw" required><br><br>

                        
                    </div>
                    <button type="submit" name = "login" class="btn btn-primary">Login</button>
                    <div class="cancel_box">
                        <button type="button" onclick="window.location.href='index.php'" class="cancelbtn btn btn-danger">Cancel</button>
                    </div>

                    <div>
                        Not registered?<a href="register.php">Create a account</a>
                    </div>
            </form>
        </div>
    </div>

    </div>
    <?php include 'template/footer_login.php'; ?>
</body>

</html>







<?php 
  if (isset($_POST['login'])) {
    
  $email = $_POST['uname'];
  $password = $_POST['psw'];

  

  include 'dbCon.php';
  $con = connect();

  $emailSQL = "SELECT * FROM restaurant_info WHERE uname = '$email';";

  $passwordSQL = "SELECT * FROM restaurant_info WHERE uname = '$email' And psw = '$password';";

  $emailResult = $con->query($emailSQL);

  $passwordResult = $con->query($passwordSQL);

  if ($emailResult->num_rows <= 0) {
    echo '<script>alert("This Email Does Not Exist.")</script>';
    echo '<script>window.location="login.php"</script>';
  }else if ($passwordResult->num_rows <= 0) {
    echo '<script>alert("This Password is Incorrect.")</script>';
    echo '<script>window.location="login.php"</script>';
  }else{

    $_SESSION['isLoggedIn'] = TRUE;

    // $SQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$password' AND approve_status=1";

     $SQL = "SELECT * FROM restaurant_info WHERE uname = '$email' And psw = '$password'";

    $result = $con->query($SQL);

    foreach ($result as $r) {
      $_SESSION['id'] = $r['id'];
      $_SESSION['name'] = $r['name'];   
      $_SESSION['phone'] = $r['phone'];
      $_SESSION['uname'] = $r['uname'];
      $_SESSION['psw'] = $r['psw'];
      $_SESSION['role'] = $r['role'];
    }

    if ($_SESSION['role'] == 1) {
       echo '<script>window.location="dashboard/index.php"</script>';
    }elseif ($_SESSION['role'] == 2) {
      echo '<script>window.location="index.php"</script>';
    } 
    
  }

  }
?>