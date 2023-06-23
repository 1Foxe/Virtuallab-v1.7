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

?>

