<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<!-- library emoji -->
<link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'>

<div class="card bg-primary">
    <div class="card-body">

<!-- mengambil data judul modul -->
<?php
$judulModul = $_GET['judul_modul'];
?>
<!-- mengambil data judul modul -->

    <?php
        $id_matkulmhs   = $_GET['id_matkulmhs'];
        $id_modul       = $_GET['id_modul'];
        $tampil         = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul INNER JOIN tbl_matkulmhs ON tbl_matakuliah.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul' AND tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs'");
        $data1          = mysqli_fetch_array($tampil);
        $query          = mysqli_query($koneksi, "SELECT * FROM tbl_attempt_mhs WHERE id_modul = '$id_modul' AND id_matkulmhs = '$id_matkulmhs'");
        $data2          = mysqli_fetch_array($query);
        $id_attempt     = $data2['id_attempt_mhs'];
        $kkm            = $data1['kkm'];
        $id_matkul      = $data1['id_matkul'];
        $preview        = $data1['tampil'];
        $query2         = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs WHERE id_attempt_mhs = '$id_attempt'");
        $data3          = mysqli_fetch_array($query2);
        $nilai          = $data3['nilai'];
    ?>
        <h6 class="m-0 font-weight-bold text-white"><?= $data1['kode_matkul'] ?> - <?= $data1['nama_matkul'] ?> - <?= $data1['judul_modul'] ?></h6>
    </div>
</div>
<hr>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $_GET['judul_modul'] ?>" hidden>
                        <th>Status</th>
                        <th>Nilai</th>
                        <?php if ($tampil == 'Ya') : ?>
                            <?php if (isset($nilai)) : ?>
                                <th>Pilihan</th>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                    <?php
                    foreach ($query as $no => $simpan) :

                    $row = mysqli_num_rows($query2);

                    ?>
                </thead>
                <tbody>
                    <tr class="<?= (isset($nilai)) ? 'text-white' : 'text-black' ; ?>" style="<?= (isset($nilai)) ? (($nilai < $kkm) ? 'background-color:#DC143C' : 'background-color:#32CD32') : '' ; ?>">
                        <td><?= $no+1 ?></td>
                        <td><?= $simpan['tanggal_kerja'] ?></td>
                        <td><?= ($nilai === NULL ) ? 'Incompleted' : 'Completed'; ?></td>
                        <td><?= ($nilai) ?? '-'; ?> <?= (isset($nilai)) ? (($nilai < $kkm) ? '<span class="ec ec-slightly-frowning-face"></span>' : '<span class="ec ec-slightly-smiling-face"></span>') : '' ; ?></td>
                        <?php if ($tampil == 'Ya') : ?>
                            <?php if (isset($nilai)) : ?>
                                <td class="d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <a href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $id_attempt ?>&id_modul=<?= $id_modul ?>" data-toggle="tooltip" title="Preview"><i class="fa-solid fa-eye" style="color: white;"></i></a>
                                    </ul>
                                </td>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <?php if(!$row && !$simpan) : ?>
                <center><a href="?halaman=modul_praktik&perihal=check_quiz&id_matkulmhs=<?= $id_matkulmhs ?>&id_modul=<?= $id_modul ?>&id_mhs=<?= $id_mhs ?>&judul_modul=<?= urlencode($judulModul) ?>" class="btn btn-light mulaiQuiz">Start Attempt Quiz</a></center>
            <?php elseif($row > 0) : ?>
                <?php if($nilai < $kkm) : ?>
                    <center><a href="?halaman=modul_praktik&perihal=quiz&id_matkulmhs=<?= $id_matkulmhs ?>&id_modul=<?= $id_modul ?>" class="btn btn-light mulaiQuiz">Re-attempt Quiz</a></center>
                <?php elseif($nilai >= $kkm) : ?>
                    <center><a href="?halaman=modul_praktik&perihal=kelola_modul&id_matkulmhs=<?= $id_matkulmhs ?>&id_matkul=<?= $id_matkul ?>" class="btn btn-light">Back to the Modul</a></center>
                <?php endif; ?>
            <?php else : ?>
                <center><a href="?halaman=modul_praktik&perihal=quiz&id_matkulmhs=<?= $id_matkulmhs ?>&id_modul=<?= $id_modul ?>&id_attempt=<?= $id_attempt ?>" class="btn btn-light lanjutQuiz">Continue the Last Attempt Quiz</a></center>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>