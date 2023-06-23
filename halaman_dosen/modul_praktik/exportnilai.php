<link rel="stylesheet" href="assets/css/styleexport.css">
<div class="card bg-primary">
    <div class="card-body">
        <?php
          $id_modul = $_GET['id_modul'];
          $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
          $data = mysqli_fetch_array($tampil);
        ?>
        <h6 class="m-0 font-weight-bold text-white">Export Nilai</h6>
    </div>
</div>
<hr>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title"><i class="fa-solid fa-graduation-cap"></i></h2>
        <p class="card-text">Export Nilai Mahasiswa</p>
          <a href="?halaman=modul_praktik&perihal=Export_nilai_mhs&id_modul=<?= $data['id_modul']?>" class="btn btn-primary" id="btn1" name="export_mhs">Export</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title"><i class="fa-solid fa-user"></i></h2>
        <p class="card-text">Export Nilai Guest</p>
        <a href="?halaman=modul_praktik&perihal=Export_nilai_guest&id_modul=<?= $data['id_modul']?>" class="btn btn-primary" id="btn2">Export</a>
      </div>
    </div>
  </div>
</div>

<!--Script SweetAlert2-->
<script src="dist/sweetalert2.all.min.js"></script>
<script>
  const btn = document.getElementById('#');
  btn.addEventListener('click', function(){
    Swal.fire({
    title: 'Want to export ?',
    text: "Student Grades",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Export'
    }).then((result) => {
      if (result.isConfirmed) {
        //script export mysql to excel
        Swal.fire(
          'Success!',
          'Your file has been export.',
          'success'
        )
      }
    })
  });

  const btn2 = document.getElementById('#');
  btn2.addEventListener('click', function(){
    Swal.fire({
    title: 'Want to export ?',
    text: "Guest Grades",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Export'
    }).then((result) => {
      if (result.isConfirmed) {
        //script export mysql to excel
        Swal.fire(
          'Success!',
          'Your file has been export.',
          'success'
        )
      }
    })
  });
</script>
<!--
<hr>
<button type="button" class="btn btn-success" id="mahasiswa">Mahasiswa</button>
<button type="button" class="btn btn-info" id="guest">Guest</button>-->

