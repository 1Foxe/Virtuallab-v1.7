<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<!-- CSS -->
<link rel="stylesheet" href="./assets/css/style-gambar-soal.css">

<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">PREVIEW QUIZ</div>
            <div class="card-body">
                <table>
                    <?php
                        $id_modul       = $_GET['id_modul'];
                        $id_attempt     = $_GET['id_attempt_mhs'];
                        $limit          = (isset($_GET['limit']) && $_GET['limit'] >= 1) ? $_GET['limit'] : 1;
                        $hasil          = mysqli_query($koneksi, "SELECT * FROM tbl_soal INNER JOIN tbl_attempt_mhs ON tbl_soal.id_modul = tbl_attempt_mhs.id_modul INNER JOIN tbl_jwb_mhs ON tbl_soal.id_soal = tbl_jwb_mhs.id_soal WHERE tbl_soal.id_modul = '$id_modul' AND tbl_attempt_mhs.id_attempt_mhs = '$id_attempt'");
                        $jumlahData     = mysqli_num_rows($hasil);
                        $totalHalaman   = ceil($jumlahData / $limit);
                        $halaman        = $_GET['page'] ?? 1;
                        $dataAwal       = (isset($_GET['page']) && $_GET['page'] > 1) ? ($_GET['page'] - 1) * $limit : 0;
                        $tampil         = mysqli_query($koneksi, "SELECT * FROM tbl_soal INNER JOIN tbl_attempt_mhs ON tbl_soal.id_modul = tbl_attempt_mhs.id_modul INNER JOIN tbl_jwb_mhs ON tbl_soal.id_soal = tbl_jwb_mhs.id_soal WHERE tbl_soal.id_modul = '$id_modul' AND tbl_attempt_mhs.id_attempt_mhs = '$id_attempt' LIMIT $dataAwal, $limit ");

                        foreach( $tampil as $i => $data ) :

                    ?>
                    <tr>
                        <td><?= $dataAwal += 1 ?>.&nbsp;</td>
                        <td><?= $data['pertanyaan'] ?></td>
                    </tr>
                    <?php
                        $jenisSoal = $data['jenis_soal'];
                        $jawab_option = $data['jawab_option'];
                        $jawaban = $data['jawaban'];
                        $jawab_essay = $data['jawab_essay'];
                        $essay = "Essay";
                        $ganda = "Ganda";
                        $boolean = "Boolean";
                    ?>
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
                            <td><input type="radio" id="jawab_a" name="jawab" <?= (in_array( $jawaban, ['A','a'] )) ? 'checked' : ''; ?> disabled> <label for="jawab_a"><?= $data['jawab_a'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_b" name="jawab" <?= (in_array( $jawaban, ['B','b'] )) ? 'checked' : ''; ?> disabled> <label for="jawab_b"><?= $data['jawab_b'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_c" name="jawab" <?= (in_array( $jawaban, ['C','c'] )) ? 'checked' : ''; ?> disabled> <label for="jawab_c"><?= $data['jawab_c'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_d" name="jawab" <?= (in_array( $jawaban, ['D','d'] )) ? 'checked' : ''; ?> disabled> <label for="jawab_d"><?= $data['jawab_d'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_e" name="jawab" <?= (in_array( $jawaban, ['E','e'] )) ? 'checked' : ''; ?> disabled> <label for="jawab_e"><?= $data['jawab_e'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Jawaban Benar : <?= $jawab_option ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Hasil : <?php if ($jawaban == $jawab_option) : ?>Benar&ensp;<i class="fa fa-check" aria-hidden="true" style="color: green;"></i><?php else : ?>Salah&ensp;<i class="fa fa-times" aria-hidden="true"></i><?php endif; ?></td>
                        </tr>
                    <?php elseif ($jenisSoal == $essay) : ?>
                        <tr>
                            <td></td>
                            <td><p>Jawab : <input type="text" id="jawab_essay" name="jawab_essay" value="<?= $jawab_essay ?>" style="width : 1065px;" disabled></p></td>
                        </tr>
                    <?php elseif ($jenisSoal == $boolean) : ?>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="true" name="boolean" <?= (in_array( $jawaban, ['T','t'] )) ? 'checked' : ''; ?> disabled> <label for="true">True</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="false" name="boolean" <?= (in_array( $jawaban, ['F','f'] )) ? 'checked' : ''; ?> disabled> <label for="false">False</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Jawaban Benar : <?= ($jawab_option == 't') ? 'True' : 'False' ; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Hasil : <?php if ($jawaban == $jawab_option) : ?>Benar&ensp;<i class="fa fa-check" aria-hidden="true" style="color: green;"></i><?php else : ?>Salah&ensp;<i class="fa fa-times" aria-hidden="true" style="color: red;"></i><?php endif; ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="mt-2 justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for ( $k = 1; $k <= $totalHalaman; $k++ ) : ?>
                                    <?php if ($k == $halaman) : ?>
                                        <a type="submit" href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $id_attempt ?>&id_modul=<?= $id_modul ?>&page=<?= $k; ?>" class="btn btn-light active"><?= $k; ?></a>
                                    <?php else : ?>
                                        <a type="submit" href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $id_attempt ?>&id_modul=<?= $id_modul ?>&page=<?= $k; ?>" class="btn btn-light"><?= $k; ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </table>
                <div class="mt-2 justify-content-end d-flex">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if ($halaman > 1) : ?>
                                <a type="submit" href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $id_attempt ?>&id_modul=<?= $id_modul ?>&page=<?= $halaman - 1 ?>" class="btn btn-danger" name="previous">Previous</a>
                            <?php endif; ?>
                            <?php if ($halaman < $totalHalaman) : ?>
                                <a type="submit" href="?halaman=modul_praktik&perihal=preview_quiz&id_attempt_mhs=<?= $id_attempt ?>&id_modul=<?= $id_modul ?>&page=<?= $halaman + 1 ?>" class="btn btn-primary" name="next">Next</a>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="card-footer bg-dark text-dark">.</div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>