<!-- CSS -->
<link rel="stylesheet" href="./assets/css/style-gambar-soal.css">

<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">QUIZ</div>
            <div class="card-body">
                <?php
                    $id_modul = $_GET['id_modul'];
                    $query = mysqli_query($koneksi, "SELECT id_modul FROM tbl_modulpraktik WHERE id_modul = '$id_modul'");
                    $data = mysqli_fetch_array($query);
                ?>
                <a href="?halaman=modul_praktik&perihal=tambah_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-primary btn-lx mb-4"><i class="fa-solid fa-plus mr-2"></i>Tambah Soal</a>
                <a href="?halaman=modul_praktik&perihal=atur_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-success btn-lx mb-4"><i class="fa-solid fa-wrench mr-2"></i>Atur Lainnya</a>
                <table>
                    <?php
                        $limit          = (isset($_GET['limit']) && $_GET['limit'] >= 1) ? $_GET['limit'] : 1;
                        $hasil          = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id_modul = '$id_modul' ");
                        $jumlahData     = mysqli_num_rows($hasil);
                        $totalHalaman   = ceil($jumlahData / $limit);
                        $halaman        = $_GET['page'] ?? 1;
                        $dataAwal       = (isset($_GET['page']) && $_GET['page'] > 1) ? ($_GET['page'] - 1) * $limit : 0;
                        $tampil         = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id_modul = '$id_modul' LIMIT $dataAwal, $limit ");

                        foreach( $tampil as $i => $data ) :

                    ?>
                    <tr>
                        <td><?= $dataAwal += 1 ?>.&nbsp;</td>
                        <td><?= $data['pertanyaan'] ?> <a href="?halaman=modul_praktik&perihal=edit_soal&id_modul=<?= $data['id_modul'] ?>&id_soal=<?= $data['id_soal'] ?>"><i class="fa fa-pencil text-dark" aria-hidden="true"></i></a>
                        <a href="?halaman=modul_praktik&perihal=hapus_soal&id_modul=<?= $data['id_modul'] ?>&id_soal=<?= $data['id_soal'] ?>" class="fa-solid fa-trash-can text-danger delete-soal"></a></td>
                    </tr>
                    <?php
                        $jenisSoal = $data['jenis_soal'];
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
                            <td><input type="radio" id="jawab_a" name="jawab"> <label for="jawab_a"><?= $data['jawab_a'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_b" name="jawab"> <label for="jawab_b"><?= $data['jawab_b'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_c" name="jawab"> <label for="jawab_c"><?= $data['jawab_c'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_d" name="jawab"> <label for="jawab_d"><?= $data['jawab_d'] ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="jawab_e" name="jawab"> <label for="jawab_e"><?= $data['jawab_e'] ?></label></td>
                        </tr>
                    <?php elseif ($jenisSoal == $essay) : ?>
                        <tr>
                            <td></td>
                            <td><p>Jawab : <input type="text" id="jawab_essay" name="jawab_essay" style="width : 550px;"></p></td>
                        </tr>
                    <?php elseif ($jenisSoal == $boolean) : ?>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="true" name="boolean"> <label for="true">True</label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" id="false" name="boolean"> <label for="false">False</label></td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="mt-2 justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for ( $k = 1; $k <= $totalHalaman; $k++ ) : ?>
                                    <?php if ($k == $halaman) : ?>
                                        <a type="submit" href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>&page=<?= $k; ?>" class="btn btn-light active"><?= $k; ?></a>
                                    <?php else : ?>
                                        <a type="submit" href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>&page=<?= $k; ?>" class="btn btn-light"><?= $k; ?></a>
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
                                <a type="submit" href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>&page=<?= $halaman - 1 ?>" class="btn btn-danger" name="previous">Previous</a>
                            <?php endif; ?>
                            <?php if ($halaman < $totalHalaman) : ?>
                                <a type="submit" href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>&page=<?= $halaman + 1 ?>" class="btn btn-primary" name="next">Next</a>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="card-footer bg-dark text-dark">.</div>
        </div>
    </div>
</div>