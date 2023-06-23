
<?php
 $id_modul = $_GET['id_modul'];
 $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
 $data = mysqli_fetch_array($tampil);

?>

<form action="" method="post">
    <button class="btn btn-primary mb-3" type="button" id="export" onclick="exportTableToExcel()">Export</button>

    <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nilai</th>
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
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
  function exportTableToExcel() {
        var table = document.getElementById("table2");
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
        downloadLink.download = "data_nilai_Guest.xlsx";
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>
