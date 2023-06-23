<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<!-- library emoji -->
<link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'>

<div class="card bg-primary">
    <div class="card-body">
        <?php
        $id_matkulmhs = $_GET['id_matkulmhs'];
        $id_modul = $_GET['id_modul'];
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul INNER JOIN tbl_matkulmhs ON tbl_matakuliah.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul' AND tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs'");
        $data1 = mysqli_fetch_array($tampil);
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_attempt_mhs WHERE id_modul = '$id_modul' AND id_matkulmhs = '$id_matkulmhs'");
        $id_attempt = $data2['id_attempt_mhs'];
        $kkm = $data1['kkm'];
        $id_matkul = $data1['id_matkul'];
        $preview = $data1['tampil'];
        $nilai_query = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs WHERE id_attempt_mhs = '$id_attempt'");
        $nilai = mysqli_fetch_array($nilai_query)['nilai'];
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
                        <th>Status</th>
                        <th>Nilai</th>
                        <?php if ($data1['tampil'] == 'Ya' && isset($nilai)) : ?>
                            <th>Pilihan</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($simpan = mysqli_fetch_array($query)) {
                        $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs WHERE id_attempt_mhs = '{$simpan['id_attempt_mhs']}'");
                        $data3 = mysqli_fetch_array($query2);
                        $nilai = $data3['nilai'];
                    ?>
                        <tr class="<?= (isset($nilai)) ? 'text-white' : 'text-black'; ?>" style="<?= (isset($nilai)) ? (($nilai < $kkm) ? 'background-color:#DC143C' : 'background-color:#32CD32') : ''; ?>">
                            <td><?= $no ?></td>
                            <td><?= $simpan['tanggal_kerja'] ?></td>
                            <td><?= ($nilai === NULL) ? 'Incompleted' : 'Completed'; ?></td>
                            <td><?= ($nilai) ?? '-'; ?> <?= (isset($nilai)) ? (($nilai < $kkm) ? '<span class="ec ec-slightly-frowning-face"></span>' : '<span class="ec ec-slightly-smiling-face"></span>') : ''; ?></td>
                            <?php if ($data1['tampil'] == 'Ya' && isset($nilai)) : ?>
                                <td class="d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <a href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $simpan['id_attempt_mhs'] ?>&id_modul=<?= $id_modul ?>" data-toggle="tooltip" title="Preview"><i class="fa-solid fa-eye" style="color: white;"></i></a>
                                    </ul>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

            <?php if (mysqli_num_rows($query) == 0) : ?>
                <center><a href="#" onclick="startAttemptQuiz()" class="btn btn-light mulaiQuiz">Start Attempt Quiz</a></center>
            <?php elseif ($nilai < $kkm) : ?>
                <center><a href="#" onclick="reattemptQuiz()" class="btn btn-light mulaiQuiz">Re-attempt Quiz</a></center>
            <?php elseif ($nilai >= $kkm) : ?>
                <center><a href="?halaman=modul_praktik&perihal=kelola_modul&id_matkulmhs=<?= $id_matkulmhs ?>&id_matkul=<?= $id_matkul ?>" class="btn btn-light">Back to the Modul</a></center>
            <?php else : ?>
                <center><a href="#" onclick="continueLastAttemptQuiz()" class="btn btn-light lanjutQuiz">Continue the Last Attempt Quiz</a></center>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>

<script>
    // Add an event listener to the "Start Attempt Quiz" button
    document.addEventListener('DOMContentLoaded', function() {
        var startQuizButton = document.querySelector('.mulaiQuiz');
        startQuizButton.addEventListener('click', startAttemptQuiz);
    });

    function startAttemptQuiz(event) {
        event.preventDefault(); // Prevent the default form submission

        var id_matkulmhs = "<?php echo $id_matkulmhs; ?>";
        var id_modul = "<?php echo $id_modul; ?>";
        var username = "<?php echo $_SESSION['username']; ?>";
        var nim_mhs = "<?php echo $_SESSION['nim_mhs']; ?>";

        // Kirim data ke server menggunakan Ajax
        $.ajax({
            url: '?halaman=modul_praktik&perihal=proses_start_attempt', // Ganti dengan URL yang sesuai
            method: 'POST',
            data: {
                id_matkulmhs: id_matkulmhs,
                id_modul: id_modul,
                username: username,
                nim_mhs: nim_mhs
            },
            success: function(response) {
                // Tanggapan dari server setelah berhasil menyimpan data
                console.log(response);
                // Arahkan pengguna ke halaman tujuan
                window.location.href = "?halaman=modul_praktik&perihal=quiz&id_matkulmhs=<?= $id_matkulmhs ?>&id_modul=<?= $id_modul ?>";
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan jika terjadi masalah saat mengirim permintaan Ajax
                console.error(error);
            }
        });
    }

    function reattemptQuiz() {
        // Fungsi untuk re-attempt quiz, implementasikan dengan cara yang serupa
    }

    function continueLastAttemptQuiz() {
        // Fungsi untuk continue the last attempt quiz, implementasikan dengan cara yang serupa
    }
</script>