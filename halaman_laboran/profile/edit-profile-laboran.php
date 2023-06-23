<body class="bg-light">

    <div class="row d-flex">
        <div class="col-xl-12">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-primary  mb-1">
                                <h3>Profile</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "config/function_up_img.php";
    $id = $_SESSION["id_laboran"];
    $query    = mysqli_query($koneksi, "SELECT * FROM tbl_laboran WHERE id_laboran='$id'");
    $data   = mysqli_fetch_array($query);

    if ($data) {
        $vusername = $data['username'];
        $vnik_laboran = $data['nik_laboran'];
        $vno_hplaboran = $data['no_hplaboran'];
        $vemail_laboran = $data['email_laboran'];
        $valamat_laboran = $data['alamat_laboran'];
        $vimg = $data['profile_img'];
    }

    if (isset($_POST['b_Ubah'])) {

        // cek apakah user pilih file baru atau tidak
        if ($_FILES['file']['error'] === 4) {
            $image = $vimg;
        } else {
            unlink('./image_profile/' . $vimg);
            $image = upload_img();
        }

        $ubah = mysqli_query($koneksi, "UPDATE tbl_laboran SET
                    no_hplaboran = '$_POST[no_hplaboran]',
                    email_laboran = '$_POST[email_laboran]',
                    alamat_laboran ='$_POST[alamat_laboran]',
                    profile_img ='$image'   
                    WHERE id_laboran = '$id' ");

        if ($ubah) {
            echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                setTimeout(function() {
                        Swal.fire({
                            title: 'Profil Laboran Berhasil Diubah',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }, 100);
                window.setTimeout(function(){
                    document.location='?halaman=profile';
                }, 2000);
                </script>";
        }
    }
    ?>
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card card-with-nav">


                <div class="tab-content">

                    <!-- Data Profile -->
                    <div class="tab-pane card-body active show" id="data_profile" role="tabpanel" aria-labelledby="home-tab">
                        <form action="" method="POST" id="form" enctype="multipart/form-data">
                            <input type="hidden" name="token" value="6c8yeekz90o4ocw4gkowwww4owow8ok">


                            <div class="form-group">
                                <label class="">New Profile Picture <small class="text-sm float-right">(Max Size is 10 MB)</small></label>
                                <input type="file" name="file" id="file" class="form-control">


                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Name" value="<?= $vusername ?>" readonly="">
                                    </div>
                                </div>

                                <div class="col md-6">
                                    <div class="form-group form-group-default">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" value="<?= $vnik_laboran ?>" name="nik_laboran" placeholder="NIK" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email_laboran" placeholder="email" value="<?= $vemail_laboran ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Phone</label>
                                        <input type="Number" class="form-control" value="<?= $vno_hplaboran ?>" name="no_hplaboran" placeholder="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" value="<?= $valamat_laboran ?>" name="alamat_laboran" placeholder="address">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3 mb-3">
                                <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>