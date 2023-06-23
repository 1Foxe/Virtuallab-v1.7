<?php
include "config/koneksi.php";
if (isset($_POST['jurusan'])) {
    $jr = $_POST["jurusan"];

    $sql = "SELECT * FROM tbl_prodi WHERE id_jurusan=$jr";

    echo '<option value="">-- Pilih Program Studi --</option>';

    $hasil = mysqli_query($koneksi, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?php echo  $data['id_prodi']; ?>"><?php echo $data['nama_prodi']; ?></option>
        <?php
    }
}
if (isset($_POST['prodi'])) {
    $pr = $_POST["prodi"];

    $sql = "SELECT * FROM tbl_matakuliah WHERE id_prodi=$pr";

    echo '<option value="">-- Pilih Mata Kuliah --</option>';

    $hasil = mysqli_query($koneksi, $sql);
    $no = 0;
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option value="<?=$data['id_matkul']?>"><?php echo $data['kode_matkul']; ?> - <?php echo $data['nama_matkul']; ?></option>
        <?php
    }
}

?>

