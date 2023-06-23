<?php include "template/head_guest.php"; ?>

<?php include "template/sidebar_guest.php"; ?>

<?php include "template/topbar_guest.php"; ?>

<!-- CSS -->
<link rel="stylesheet" href="./assets/css/style-gambar-soal.css">

<?php
    $id_matkulguest = $_GET['id_matkulguest'];
    $id_modul = $_GET['id_modul'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_modulpraktik INNER JOIN tbl_matkulguest ON tbl_modulpraktik.id_matkul = tbl_matkulguest.id_matkul WHERE tbl_matkulguest.id_matkulguest = '$id_matkulguest' AND tbl_modulpraktik.id_modul = '$id_modul'");
    $data = mysqli_fetch_array($query);
    $waktu = $data['waktu'];

    if($_SESSION['durasi'][$id_modul] === NULL) {
        $_SESSION['durasi'][$id_modul] = $waktu;
    }

    if(isset($_SESSION["waktu"][$id_modul])){
        $telah_berlalu = time() - $_SESSION["waktu"][$id_modul];
    }
    else {
        $_SESSION["waktu"][$id_modul] = time();
        $telah_berlalu = 0;
    }

    if(!isset($_GET['id_attempt']) && !isset($_POST['id_attempt'])){
        $query2 = mysqli_query($koneksi, "INSERT INTO tbl_attempt_guest (id_matkulguest, id_modul, waktu, tanggal_kerja) VALUES ('$id_matkulguest', '$id_modul', '$waktu', CURRENT_TIMESTAMP() )");
        $id_attempt = $koneksi->insert_id;
    } else {
       $id_attempt = $_GET['id_attempt'] ?? $_POST['id_attempt'];
    }
?>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">QUIZ</div>
            <div class="card-body">
                <div class=" justify-content-end d-flex" id="timeRR"></div>
                <form action="" method="POST">
                    <?php
                        $limit          = (isset($_GET['limit']) && $_GET['limit'] >= 1) ? $_GET['limit'] : 1;
                        $hasil          = mysqli_query($koneksi, "SELECT * FROM tbl_soal INNER JOIN tbl_attempt_guest ON tbl_soal.id_modul = tbl_attempt_guest.id_modul WHERE tbl_attempt_guest.id_attempt_guest = '$id_attempt' AND tbl_soal.id_modul = '$id_modul'");
                        $jumlahData     = mysqli_num_rows($hasil);
                        $totalHalaman   = ceil($jumlahData / $limit);
                        $halaman        = $_GET['page'] ?? 1;
                        $dataAwal       = (isset($_GET['page']) && $_GET['page'] > 1) ? ($_GET['page'] - 1) * $limit : 0;
                        $next           = $halaman + 1;
                        $previous       = $halaman - 1;
                        $tampil         = mysqli_query($koneksi, "SELECT * FROM tbl_soal INNER JOIN tbl_attempt_guest ON tbl_soal.id_modul = tbl_attempt_guest.id_modul WHERE tbl_attempt_guest.id_attempt_guest = '$id_attempt' AND tbl_soal.id_modul = '$id_modul' LIMIT $dataAwal, $limit");
                    ?>
                    <form action="" method="POST">
                    <?php
                        foreach( $tampil as $data ) :
                    
                        $id_soal        = $data['id_soal'];
                        $cekJawab       = mysqli_query($koneksi, "SELECT id_jwb_guest, jawaban, jawab_essay FROM tbl_jwb_guest WHERE id_attempt_guest = '$id_attempt' AND id_soal = '$id_soal'");
                        if (mysqli_num_rows($cekJawab) == 1) {
                            $hasilJawab     = mysqli_fetch_array($cekJawab);
                            $id_jwb_guest   = $hasilJawab['id_jwb_guest'];
                            $inputJawab     = $hasilJawab['jawaban'];
                            $inputEssay     = $hasilJawab['jawab_essay'];
                        } else {
                            $id_jwb_guest   = NULL;
                            $inputJawab     = NULL;
                            $inputEssay     = NULL;
                        }
                    ?>
                        <input type="hidden" name="vid_soal" value="<?= $id_soal; ?>">
                        <input type="hidden" name="id_jwb_guest" value="<?= $id_jwb_guest ?? NULL; ?>">
                        <input type="hidden" name="id_matkulguest" value="<?= $id_matkulguest ?? NULL; ?>">
                        <input type="hidden" name="id_attempt" value="<?= $id_attempt; ?>">
                        <input type="hidden" name="halaman_selanjutnya" id="nomor_halaman">
                    <table>
                        <tr>
                            <td><?= $dataAwal += 1 ?>.&nbsp;</td>
                            <td><?= $data['pertanyaan'] ?></td>
                        </tr>
                        <?php
                            $jenisSoal = $data['jenis_soal'];
                            $essay = "Essay";
                            $ganda = "Ganda";
                            $boolean = "Boolean";
                        ?>
                        <style>
                            .image_soal img {
                                width: 50%;
                                height: 50%;
                                object-fit: cover;
                                transition: transform 0.3s ease-out;
                            }
                            .image_soal:hover img {
                                transform: scale(1.2);
                            }
                        </style>
                        <?php if ($data['upload_img']) : ?>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="image_soal">
                                        <img src="./soal_image/<?= $data['upload_img'] ?>" alt="image">
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($jenisSoal == $ganda) : ?>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="jawab_a" name="jawab" value="a" <?= (in_array( $inputJawab, ['A','a'] )) ? 'checked' : ''; ?>> <label for="jawab_a"><?= $data['jawab_a'] ?></label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="jawab_b" name="jawab" value="b" <?= (in_array( $inputJawab, ['B','b'] )) ? 'checked' : ''; ?>> <label for="jawab_b"><?= $data['jawab_b'] ?></label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="jawab_c" name="jawab" value="c" <?= (in_array( $inputJawab, ['C','c'] )) ? 'checked' : ''; ?>> <label for="jawab_c"><?= $data['jawab_c'] ?></label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="jawab_d" name="jawab" value="d" <?= (in_array( $inputJawab, ['D','d'] )) ? 'checked' : ''; ?>> <label for="jawab_d"><?= $data['jawab_d'] ?></label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="jawab_e" name="jawab" value="e" <?= (in_array( $inputJawab, ['E','e'] )) ? 'checked' : ''; ?>> <label for="jawab_e"><?= $data['jawab_e'] ?></label></td>
                            </tr>
                        <?php elseif ($jenisSoal == $essay) : ?>
                            <tr>
                                <td></td>
                                <td><p>Jawab : <input type="text" id="jawab_essay" name="jawab_essay" style="width : 1065px;" value="<?= $inputEssay ?>"></p></td>
                            </tr>
                        <?php elseif ($jenisSoal == $boolean) : ?>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="true" name="jawab" value="t" <?= (in_array( $inputJawab, ['T','t'] )) ? 'checked' : ''; ?>> <label for="true">True</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="radio" id="false" name="jawab" value="f" <?= (in_array( $inputJawab, ['F','f'] )) ? 'checked' : ''; ?>> <label for="false">False</label></td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="mt-2 justify-content-end">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php for ( $k = 1; $k <= $totalHalaman; $k++ ) : ?>
                                        <?php if ($k == $halaman) : ?>
                                            <input type="submit" class="btn btn-light active" onclick="ganti('<?= $k ?? 1; ?>')" value="<?= $k; ?>"></input>
                                        <?php else : ?>
                                            <input type="submit" class="btn btn-light" onclick="ganti('<?= $k ?? 1; ?>')" value="<?= $k; ?>"></input>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>
                    </table>
                    <?php
                        if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
                            $id_soal        = $_POST['vid_soal'];
                            $jawab          = $_POST['jawab'];
                            $jawab_essay    = $_POST['jawab_essay'];
                            if ( in_array($id_jwb_guest, [NULL, ''] ) ) {
                                $input      = mysqli_query($koneksi, "INSERT INTO tbl_jwb_guest (id_attempt_guest, id_soal, jawaban, jawab_essay) VALUE ('$id_attempt', '$id_soal', '$jawab', '$jawab_essay')");
                            } else {
                                $input      = mysqli_query($koneksi, "UPDATE tbl_jwb_guest SET jawaban = '$jawab', jawab_essay = '$jawab_essay' WHERE id_attempt_guest = '$id_attempt' AND id_soal = '$id_soal'");
                            }
                            $query          = mysqli_query($koneksi, "SELECT * FROM tbl_jwb_guest INNER JOIN tbl_attempt_guest ON tbl_jwb_guest.id_attempt_guest = tbl_attempt_guest.id_attempt_guest WHERE tbl_jwb_guest.id_attempt_guest = '$id_attempt'");
                            if (isset($_POST['previous'])) {
                                echo "<script>
                                    document.location='?halaman=modul_praktik&perihal=quiz&id_matkulguest=$id_matkulguest&id_modul=$id_modul&id_attempt=$id_attempt&page=$previous';
                                </script>";
                            } elseif (isset($_POST['next'])) {
                                echo "<script>
                                    document.location='?halaman=modul_praktik&perihal=quiz&id_matkulguest=$id_matkulguest&id_modul=$id_modul&id_attempt=$id_attempt&page=$next';
                                </script>";
                            } elseif (isset($_POST['submitQuiz'])) {
                                $benar = 0;
                                $salah = 0;
                                $total = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE tbl_soal.id_modul = '$id_modul'");
                                foreach ($query as $kunci) :
                                    $total++;
                                    $soal_id = $kunci['id_soal'];
                                    $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_jwb_guest WHERE id_attempt_guest = '$id_attempt' AND id_soal = '$soal_id'");
                                    $jawaban = mysqli_fetch_array($query2);
                                    if ($tipe_soal == 'Essay') {
                                        if ( is_null($jawaban['jawab_essay']) ) {
                                            $salah++;
                                        } else {
                                            $total--;
                                        }
                                    } else {
                                        if ( $query2->num_rows != 1 ) {
                                            $salah++;
                                        } else {
                                            if ( !is_null($jawaban['jawaban']) && $kunci['jawab_option'] == $jawaban['jawaban'] ) {
                                                $benar++;
                                            } else {
                                                $salah++;
                                            }
                                        }
                                    }
                                endforeach;

                                $hitung = ($benar / $total) * 100;
                                $nilai  = number_format($hitung,2);

                                //membuat variable
                                $queryNilai = mysqli_query($koneksi, "INSERT INTO tbl_nilai_guest (id_attempt_guest, nilai) VALUE ('$id_attempt', '$nilai')");
                                if ($queryNilai) { 
                                    echo "<script>
                                    setTimeout(function() {
                                        Swal.fire({
                                            title: 'Sukses',
                                            text: 'Anda Berhasil Submit',
                                            icon: 'success',
                                            timer: 2000,
                                            showConfirmButton: false
                                        });
                                    }, 100);
                                    window.setTimeout(function(){
                                        document.location='?halaman=modul_praktik&perihal=attempt_quiz&id_matkulguest=$id_matkulguest&id_modul=$id_modul';
                                    }, 2000);
                                    </script>";
                                }
                                unset($_SESSION["waktu"][$id_modul]);
                                unset($_SESSION["durasi"][$id_modul]);
                            } else {
                                $k = $_POST['halaman_selanjutnya'];
                                echo "<script>
                                    document.location='?halaman=modul_praktik&perihal=quiz&id_matkulguest=$id_matkulguest&id_modul=$id_modul&id_attempt=$id_attempt&page=$k';
                                </script>";
                            }
                        }
                    ?>
                    <div class="mt-2 justify-content-end d-flex">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if ($halaman > 1) : ?>
                                    <input type="submit" class="btn btn-danger" name="previous" id="previous" value="Previous"></input>
                                <?php endif; ?>
                                <?php if ($halaman < $totalHalaman) : ?>
                                    <input type="submit" class="btn btn-primary" name="next" id="next" value="Next"></input>
                                <?php elseif ($halaman == $totalHalaman) : ?>
                                    <input type="submit" class="btn btn-success" name="submitQuiz" value="Submit"></input>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-dark text-dark">.</div>
        </div>
    </div>
</div>
<script src="./assets/js/jquery-3.6.1.js"></script> 
<script src="./assets/js/popper.min.js"></script> 
<script>
    function ganti(nomor) {
        document.getElementById("nomor_halaman").value = nomor;
    }

    function kumpul() {
        Swal.fire({
            title: 'Peringatan!',
            text: "Apakah Anda Yakin Ingin Submit?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Tidak',
            showClass: {
                popup: 'animate__animated animate__heartBeat'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                return true;
            } else {
                return false;
            }
        })
    }

    const timer = () => {
        var timeRR = document.getElementById('timeRR');                    
        var duration = <?= $waktu ?>;
        var sisa = duration - <?= $telah_berlalu ?>;
        return () => {
            sisa--;
            $.ajax({
                    type: 'POST',
                    url: 'timer_guest.php',
                    data: {waktu: sisa},
                });

            timeRR.innerHTML = formatTime(sisa);

            if (sisa == 60) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Waktu Anda Tersisa 1 Menit Lagi!',
                    icon: 'warning',
                    showConfirmButton: true
                });
            }

            if (sisa == 0) {
                $.ajax({
                    type: 'POST',
                    url: 'submit_quiz_guest2.php',
                    data: { 
                        simpanQuiz: '',
                        id_matkulguest: '<?=$data['id_matkulguest']?>',
                        id_attempt: '<?=$id_attempt?>',
                        id_modul: '<?=$data['id_modul']?>' },
                    success: function(response) {
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Waktu Anda Sudah Habis!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=modul_praktik&perihal=attempt_quiz&id_matkulguest=<?= $data['id_matkulguest'] ?>&id_modul=<?= $data['id_modul'] ?>';
                        }, 1000);
                    }
                });
            }
        };
    }

    setInterval(timer(), 1000);

    const formatTime = (Timer) => {
        const pad = (x) => x < 10 ? `0${x}` : x;

        const hours = Math.floor(Timer / 3600 );
        const minutes = Math.floor(Timer / 60) - (hours * 60);
        const seconds = Math.floor(Timer - hours * 3600 - minutes * 60);
        return `${pad(hours)} : ${pad(minutes)} : ${pad(seconds)}`;
    }
</script>

<?php include "template/footer.php"; ?>