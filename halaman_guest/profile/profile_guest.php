<?php include "template/head_guest.php"; ?>

<?php include "template/sidebar_guest.php"; ?>

<?php include "template/topbar_guest.php"; ?>

<div class="row justify-content-center">
    <div class="col-lg-8 mb-4 justify-content-center">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
              
                    <!-- <div class="col-md-6">           -->
                            <h3 class="font-weight-bold text-primary text-center">Profile Anda</h3>
                    <!-- </div> -->

            </div>
        </div>
    </div>
</div>
<?php
$id = $_SESSION["id_guest"];
$query    = mysqli_query($koneksi, "SELECT * FROM tbl_guest WHERE id_guest='$id'");
if ($result   = mysqli_fetch_array($query)); {
    $username       = $result['username'];
    $email_guest    = $result['email_guest'];
    $image          = $result['profile_img'];
}
?>

<div class="row justify-content-center">
<div class="col-lg-8 mb-4 justify-content-center">
        <div class="card shadow">
                <div class="row no-gutters">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                <div class="col-md-4">
                    <div class="profile-links">
                              <?php
                if ($image == NULL) {
                    echo '<img src="./assets/img/icon/profile.png" class="card-img">';
                } else {
                    echo '<img src="./image_profile/' . $image . '" class="card-img">';
                }
                ?>
                <li>
                    <h3 class="text-white"><?= $username ?></h3>
                        <li>
                            <h2 class="text-white">GUEST</h2>
                        </li>
                        <a href="?halaman=profile&perihal=edit-profile" class="text-white"><i class="far fa-edit fa-2x mb-4 mt-3"></i></a>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mt-costum">
                        <div class="details">
                            <div class="row">
                                <div class="col-4">
                                    Nama
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7 text-uppercase">
                                    <?= $username ?>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <div class="row">
                                <div class="col-4">
                                    Email
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <?= $email_guest ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>