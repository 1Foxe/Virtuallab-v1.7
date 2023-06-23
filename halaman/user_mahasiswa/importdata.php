<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Import Data</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="?halaman=user_mahasiswa&perihal=aksiexcel" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formFile">Import Data File Excel (xls, xlsx)</label>
                        <input type="file" class="form-control" id="formFile" name="filexls" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=user_mahasiswa" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>