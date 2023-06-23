
<?php
 $id_modul = $_GET['id_modul'];
 $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
 $data = mysqli_fetch_array($tampil);
?>

<form action="#" method="post">
    <button class="btn btn-primary mb-3" type="button" id="export" onclick="exportTableToExcel()">Export</button>

    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai</th>
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
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
   function exportTableToExcel() {
        var table = document.getElementById("table1");
        var workbook = XLSX.utils.table_to_book(table);
        var worksheet = workbook.Sheets[workbook.SheetNames[0]];
        
        // Menyesuaikan lebar kolom dengan data
        var columnWidths = [
            { wch: 5 },
            { wch: 15 },
            { wch: 10 },
            { wch: 8 }
        ];
        worksheet["!cols"] = columnWidths;
        
        var excelBuffer = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

        var blob = new Blob([excelBuffer], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
        var url = URL.createObjectURL(blob);
        
        var downloadLink = document.createElement("a");
        downloadLink.href = url;
        downloadLink.download = "data_nilai_Mahasiswa.xlsx";
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>
