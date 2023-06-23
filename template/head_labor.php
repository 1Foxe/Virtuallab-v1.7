<?php

session_start();
if (!isset($_SESSION["id_laboran"])) {
    echo "<script src='assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
    <link rel='stylesheet' href='assets/js/sweetalert2/dist/sweetalert2.min.css'>";
    echo "<script type='text/javascript'>
        setTimeout(function() {
            Swal.fire({
            title: 'Anda harus Login terlebih dahulu!',
            icon: 'warning',
            showConfirmButton: false
            });
        }, 100);
        window.setTimeout(function(){
            document.location='login/login_laboran.php';
        }, 1000);
        </script>";
    exit;
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

    <title>Halaman Laboran</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/icon/polbat.ico" type="image/x-icon">
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- custom styles untuk profil laboran -->
    <link rel="stylesheet" href="assets/css/profile-page.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body id="page-top">