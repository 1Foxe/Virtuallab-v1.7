<div class="card bg-primary">
    <div class="card-body">
    <?php
        $id_modul = $_GET['id_modul'];
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
        $data = mysqli_fetch_array($tampil);
    ?>
        <h6 class="m-0 font-weight-bold text-white"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?> - <?= $data['judul_modul'] ?></h6>
    </div>
</div>
<hr>

<button type="button" class="btn btn-success" id="mahasiswa">Mahasiswa</button>
<button type="button" class="btn btn-info" id="guest">Guest</button>
<div id="tbl_mhs">
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Nilai</th>
                            <th>Pilihan</th>
                        </tr>
                        <?php
                        $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs INNER JOIN tbl_attempt_mhs ON tbl_nilai_mhs.id_attempt_mhs = tbl_attempt_mhs.id_attempt_mhs INNER JOIN tbl_matkulmhs ON tbl_attempt_mhs.id_matkulmhs = tbl_matkulmhs.id_matkulmhs INNER JOIN tbl_mahasiswa ON tbl_matkulmhs.id_mhs = tbl_mahasiswa.id_mhs WHERE tbl_attempt_mhs.id_modul = '$id_modul'");
                        foreach ($tampil1 as $nomhs => $datamhs) :

                        ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $nomhs+1 ?></td>
                            <td><?= $datamhs['username'] ?></td>
                            <td><?= $datamhs['nim_mhs'] ?></td>
                            <td><?= $datamhs['nilai'] ?></td>
                            <td class="d-flex justify-content-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=preview_mhs&id_modul=<?= $datamhs['id_modul'] ?>&id_attempt_mhs=<?= $datamhs['id_attempt_mhs'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Preview"><i class="fa-solid fa-eye"></i></a></li>
                                    <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=edit_mhs&id_modul=<?= $datamhs['id_modul'] ?>&id_attempt_mhs=<?= $datamhs['id_attempt_mhs'] ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Nilai"><i class="fa-solid fa-pen-to-square text-white rounded"></i></a></li>
                                </ul>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="tbl_guest">
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Pilihan</th>
                        </tr>
                        <?php
                        $tampil2 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_guest INNER JOIN tbl_attempt_guest ON tbl_nilai_guest.id_attempt_guest = tbl_attempt_guest.id_attempt_guest INNER JOIN tbl_matkulguest ON tbl_attempt_guest.id_matkulguest = tbl_matkulguest.id_matkulguest INNER JOIN tbl_guest ON tbl_matkulguest.id_guest = tbl_guest.id_guest WHERE tbl_attempt_guest.id_modul = '$id_modul'");
                        foreach ($tampil2 as $noguest => $dataguest) :

                        ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $noguest+1 ?></td>
                            <td><?= $dataguest['username'] ?></td>
                            <td><?= $dataguest['nilai'] ?></td>
                            <td class="d-flex justify-content-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=preview_guest&id_modul=<?= $dataguest['id_modul'] ?>&id_attempt_guest=<?= $dataguest['id_attempt_guest'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Preview"><i class="fa-solid fa-eye"></i></a></li>
                                    <li class="list-inline-item"><a href="?halaman=modul_praktik&perihal=edit_guest&id_modul=<?= $dataguest['id_modul'] ?>&id_attempt_guest=<?= $dataguest['id_attempt_guest'] ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Nilai"><i class="fa-solid fa-pen-to-square text-white rounded"></i></a></li>
                                </ul>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/jquery-3.6.1.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $(document).ready(function(){
        $('#table1').DataTable();
        $('#table2').DataTable();
        document.getElementById("tbl_guest").style.display = "none";
        $("#mahasiswa").click(function(){
            document.getElementById("tbl_mhs").style.display = "block";
            document.getElementById("tbl_guest").style.display = "none";
        });
        $("#guest").click(function(){
            document.getElementById("tbl_mhs").style.display = "none";
            document.getElementById("tbl_guest").style.display = "block";
        });
    });
</script>