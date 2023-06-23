<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<?php
$id_matkul = $_GET['id_matkul'];
$tampil = mysqli_query($koneksi, "SELECT id_matkul, kode_matkul, nama_matkul FROM tbl_matakuliah WHERE id_matkul='$id_matkul'");
$data = mysqli_fetch_array($tampil);
?>
<div class="card bg-primary">
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-white"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?></h6>
    </div>
</div>
<hr>

<?php
$id_matkulmhs = $_GET['id_matkulmhs'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_matkulmhs ON tbl_matakuliah.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs' AND tbl_matakuliah.id_matkul = '$id_matkul'");
?>
<div class="embed-responsive embed-responsive-16by9">
    <iframe class='embed-responsive-item' scrolling='no' src='?halaman=virtual_lab&id_matkulmhs=<?= $id_matkulmhs ?>' allowfullscreen></iframe>
</div>
<!-- KOMENTAR -->
<?php
if (isset($_POST['kirim'])) {
    $komentar = $_POST['komentar'];
    $username = $_SESSION['username'];
    $nama = $_POST['nama_pengirim'] . '|' . $_POST['id_matkul'] . '|' . $username . '|tbl_mahasiswa';
    $query = "INSERT INTO `tbl_komentar` (`parent_komentar_id`, `komentar`, `nama_pengirim`, `date`) VALUES ('0', '$komentar', '$nama', current_timestamp())";
    $err = mysqli_query($koneksi, $query);
}

$id_matkul = $_GET['id_matkul'];
$query = "SELECT * from tbl_komentar WHERE nama_pengirim like '%|$id_matkul%' ORDER BY date DESC";
$query = mysqli_query($koneksi, $query);
$komentar = $query->fetch_all();
?>
<div class="card p-5">
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="row">
        <input type="hidden" class="form-control mb-2" name="id_matkul" value="<?= $_GET['id_matkul'] ?>" />
        <input type="text" placeholder="Masukan Nama" class="form-control mb-2" name="nama_pengirim" value="" />
        <textarea placeholder="Tulis Komentar" class="form-control mb-2" name="komentar" rows="6"></textarea>
        <input type="submit" class="btn btn-info" name="kirim" value="Submit" />
    </form>
    <div class="mt-4" style="border: 1px solid black;"></div>
    <h3>Komentar</h3>
    <?php foreach ($komentar as $k) :
        $name = explode('|', $k[3]);

        $img = './assets/img/icon/profile.png';
        if ($name[3] != '') {
            $mhs = "SELECT profile_img FROM $name[3] WHERE username = '$name[2]' LIMIT 1";
            $mhs = mysqli_query($koneksi, $mhs);
            $mhs = $mhs->fetch_row();
            if ($mhs[0] == '') {
                $img = './assets/img/icon/profile.png';
            } else {
                $img = './image_profile/' . $mhs[0];
            }
        }
    ?>
        <div class="media border p-3 mb-2">
            <img src="<?= $img ?>" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;height: 60px;">
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-10">
                        <h4><b><?= $name[0] ?></b> <small> Posted on <i><?= $k[4] ?></i></small></h4>
                        <p><?= $k[2] ?></p>
                    </div>
                    <!-- <div class="col-sm-2" align="right">
                        <button type="button" class="btn btn-primary reply" id="'.$row[" komentar_id"].'">Reply</button>
                    </div> -->
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<!-- END KOMENTAR -->

<?php include "template/footer.php"; ?>