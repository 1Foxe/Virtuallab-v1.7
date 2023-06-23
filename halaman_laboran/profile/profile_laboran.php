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
$id = $_SESSION["id_laboran"];
$query    = mysqli_query($koneksi, "SELECT * FROM tbl_laboran WHERE id_laboran='$id'");
if ($result   = mysqli_fetch_array($query)); {
    $username         = $result['username'];
    $nik_laboran      = $result['nik_laboran'];
    $email_laboran    = $result['email_laboran'];
    $alamat_laboran   = $result['alamat_laboran'];
    $no_hplaboran     = $result['no_hplaboran'];
    $image            = $result['profile_img'];
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
                            <h2 class="text-white">LABORAN</h2>
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
                                    NIK
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <?= $nik_laboran ?>
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
                                    <?= $email_laboran ?>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <div class="row">
                                <div class="col-4">
                                    Alamat
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <?= $alamat_laboran ?>
                                </div>
                            </div>
                        </div>
                        <div class="details">
                            <div class="row">
                                <div class="col-4">
                                    No. telp / Hp
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-7">
                                    <?= $no_hplaboran ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>