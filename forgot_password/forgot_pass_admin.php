<?php

use LDAP\Result;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Filter;

session_start();
$error = array();

require "mail.php";

// Koneksi database
include "../config/koneksi.php";

$mode = "enter_email";
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}

//something is posted
if(count($_POST) > 0){

    switch ($mode) {
        case 'enter_email';
        //code...
        $email = $_POST['email'];
        //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error[] = "Please enter a valid email";
        }elseif(!valid_email($email)){
            $error[] = "That email was not found";
        }else{

            $_SESSION["forgot"]["email"] = $email;
            send_email($email);
            header("Location: forgot_pass_admin.php?mode=enter_code");
            die;
        }
        break;

        case 'enter_code';
        //code...
        $code = $_POST['code'];
        $result = is_code_correct($code);

        if($result == "the code is correct"){
            $_SESSION["forgot"]["code"] = $code;
            header("Location: forgot_pass_admin.php?mode=enter_password");
            die;
        }else{
            $error[] = $result;
        }
        break;

        case 'enter_password';
        //code...
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password !== $password2){
            $error[] = "Passwords do not match";
        }elseif(!isset($_SESSION["forgot"]["email"]) || !isset($_SESSION["forgot"]["code"])){
            header("Location: forgot_pass_admin.php");
            die;
        }else{   
         
            save_password($password);
            if(isset($_SESSION["forgot"])){
                unset($_SESSION["forgot"]);
            }
            echo "<script src='../assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='../assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Password Admin Berhasil Diubah',
                            icon: 'success',
                            showConfirmButton: false
                        });
                    }, 100);
                    window.setTimeout(function(){
                        document.location='../login/login_admin.php';
                    }, 1000);
                    </script>";
            die;
        }
        break;

        default:
        //code...
        break;
    }
}


    function send_email($email){
    global $koneksi;

        $expire = time() + (60 * 1);
        $code = rand(10000,99999);
        $email = addslashes($email);

        $query = "INSERT INTO code_admin (email, code, expire) VALUE ('$email', '$code', '$expire')";
        mysqli_query($koneksi, $query);

        //send email here
        send_mail($email,'Password reset', "Your code is " .$code);
    }

    function save_password($password){
    global $koneksi;

        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = addslashes($_SESSION["forgot"]["email"]);

        $query = "UPDATE tbl_admin SET pass = '$password' WHERE email_admin = '$email' limit 1";
        mysqli_query($koneksi, $query);

    }

    function valid_email($email){
    global $koneksi;

        $email = addslashes($email);

        $query = "SELECT * FROM tbl_admin WHERE email_admin = '$email' limit 1";
        $result = mysqli_query($koneksi, $query);
        if($result){
            if(mysqli_num_rows($result) > 0)
            {
                return true;
            }
        }

        return false;

    }

    function is_code_correct($code){
        global $koneksi;

        $code = addslashes($code);
        $expire = time();
        $email = addslashes($_SESSION["forgot"]["email"]);

        $query = "SELECT * FROM code_admin WHERE code ='$code' && email = '$email' && expire > '$expire' order by id desc limit 1";
        $result = mysqli_query($koneksi, $query);
        if($result){
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                if($row['expire'] > $expire) {

                    return "the code is correct";
                }else{
                    return "the code is expired";
                }
            }else{
                return "the code is incorrect";
            }
        }

        return false;
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/icon/polbat.ico" type="image/x-icon">
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-gradient-primary">
                                <br>
                                <img src="../assets/img/logopolibatam.png" class="img-fluid mt-5" />

                            </div>
                            <div class="col-lg-6">

                                    <?php

                                        switch ($mode) {
                                            case 'enter_email';
                                            //code...
                                            ?>
                                            <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                                    and we'll send you a link to reset your password!</p>
                                                <span style="font-size: 12px;color:red;">
                                                <?php
                                                    foreach ($error as $err) {
                                                        //code...
                                                        echo $err . "<br>";
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                                <form class="user" method="post" action="forgot_pass_admin.php?mode=enter_email">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                                    </div>
                                                    <button type="submit" name="btnSubmit" class="btn btn-primary btn-user btn-block"> Next </button>
                                                </form>
                                                <hr>
                                            <div class="text-center">
                                                <a class="small" href="../login/login_admin.php">Already have an account? Login!</a>
                                            </div>
                                            <?php
                                            break;

                                            case 'enter_code';
                                            //code...
                                            ?>
                                            <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                                <p class="mb-4">Enter your the code sent to your email below</p>
                                                <span style="font-size: 12px;color:red;">
                                                <?php
                                                    foreach ($error as $err) {
                                                        //code...
                                                        echo $err . "<br>";
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                                <form class="user" method="post" action="forgot_pass_admin.php?mode=enter_code">
                                                    <div class="form-group">
                                                        <input type="text" name="code" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="1234...">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">Next</button>
                                                    <a href="forgot_pass_admin.php" type="submit" class="btn btn-danger btn-user btn-block">Reset</a>
                                                </form>
                                            <hr>
                                            <?php
                                            break;

                                            case 'enter_password';
                                            //code...
                                            ?>
                                            <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                                <p class="mb-4">Enter your New Password</p>
                                                <span style="font-size: 12px;color:red;">
                                                <?php
                                                    foreach ($error as $err) {
                                                        //code...
                                                        echo $err . "<br>";
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                                <form class="user" method="post" action="forgot_pass_admin.php?mode=enter_password">
                                                    <div class="form-group">
                                                        <input type="text" name="password" class="form-control form-control-user" placeholder="Password...">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="password2" class="form-control form-control-user" placeholder="Confirm Password...">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">Next</button>
                                                    <a href="forgot_pass_admin.php" type="submit" class="btn btn-danger btn-user btn-block">Reset</a>
                                                </form>
                                            <?php
                                            break;

                                            default:
                                            //code...
                                            break;
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>
</body>

</html>