<?php
$id_matkul = $_GET['id_matkul'];
$tampil = mysqli_query($koneksi, "SELECT id_matkul, kode_matkul, nama_matkul FROM tbl_matakuliah WHERE id_matkul='$id_matkul'");
$data = mysqli_fetch_array($tampil)
?>
<div class="card bg-primary">
    <div class="card-body">
        <h6 class="m-0 font-weight-bold text-white"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?></h6>
    </div>
</div>
<hr>

<a href="?halaman=modul_praktik&perihal=tambah&id_matkul=<?= $data['id_matkul'] ?>" class="btn btn-primary btn-lx mb-4"><i class="fa-solid fa-plus mr-2"></i>Tambah Modul</a>
<!-- Tampil Data Modul -->
<div class="card shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align :center;">
                        <th>No</th>
                        <th>Jenis Modul</th>
                        <th>Judul Modul</th>
                        <th width="300px">Deskripsi Modul</th>
                        <th>Modul File</th>
                        <th>Modul Link</th>
                        <th width="150px">Pilihan</th>
                    </tr>
                    <?php
                    $id_matkul = $_GET['id_matkul'];
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_modulpraktik WHERE id_matkul='$id_matkul'");
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['jenis_modul'] ?></td>
                        <td><?= $data['judul_modul'] ?></td>
                        <td><?= $data['deskripsi_modul'] ?></td>
                        <td>
                            <?php
                            //uji apakah filenya ada atau tidak
                            if (empty($data['modul_file'])) {
                                echo " ... ";
                            } else {
                            ?>
                                <a href="file/<?= $data['modul_file'] ?>" target="$_blank"><?= substr($data['modul_file'], 0, 17) ?></a>
                            <?php
                            }
                            ?>
                        </td>
                        <td><?= substr($data['modul_link'], 0, 18) ?>...</td>
                        <td class="d-flex justify-content-center">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=tampil_modul&id_modul=<?= $data['id_modul'] ?>" target="$_blank" class="btn btn-primary btn-sm mb-2" data-toggle="tooltip" title="Lihat Modul"><i class="fa-solid fa-eye"></i></a> </li>
                                <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=edit&id=<?= $data['id_modul'] ?>&id_matkul=<?= $data['id_matkul'] ?>" class=" btn btn-warning btn-sm mb-2" data-toggle="tooltip" title="Ubah"><i class="fa-solid fa-pen-to-square text-white rounded"></i></a></li>
                                <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=hapus&id=<?= $data['id_modul'] ?>&id_matkul=<?= $data['id_matkul'] ?>" class="btn btn-danger btn-sm mb-2 delete-modul" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash-can text-white rounded"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- KOMENTAR -->
<?php
if (isset($_POST['kirim'])) {
    $komentar = $_POST['komentar'];
    $username = $_SESSION['username'];
    $nama = $_POST['nama_pengirim'] . '|' . $_POST['id_matkul'] . '|' . $username . '|tbl_laboran';
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

<script src="./assets/js/jquery-3.6.1.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>