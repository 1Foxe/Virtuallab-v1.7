<!-- Tambah Data Guest -->
<a href="?halaman=user_guest&perihal=tambahdata" class="btn btn-primary btn-xl mb-4"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data Guest</a>

<form action="" method="POST">  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Guest</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username Guest</th>
                            <th>Email</th>
                            <th>Pilihan</th>
                            <th class="text-center">Check all - <input type="checkbox" id="checkAll" value="<?php echo $data['id_guest']?>"></input></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_guest order by id_guest asc");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) :

                        ?>
                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $data['username'] ?> </td>
                            <td> <?= $data['email_guest'] ?> </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="?halaman=user_guest&perihal=edit&id=<?= $data['id_guest'] ?>" class="btn btn-warning btn-sm mb-2" data-toggle="tooltip" title="Ubah"><i class="fa-solid fa-pen-to-square text-white rounded"></i></a> </li>
                                    <li class="list-inline-item"><a href="?halaman=user_guest&perihal=hapus&id=<?= $data['id_guest'] ?>" class=" btn btn-danger btn-sm mb-2 delete-data" data-toggle="tooltip" title="Hapus"><i class="fa-solid fa-trash-can text-white rounded"></i></a></li>
                                </ul>  
                            </td>
                            <td class="text-center"><input type="checkbox" class="checkItem" value="<?= $data['id_guest'] ?>" name="id_guest[]"></td>

                        </tr>

                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-danger btn-xl mb-4 float-right multi-delete-guest"><i  class="fa-solid fa-trash-can text-white rounded mr-2"></i>Hapus Beberapa Data</button>
    
</form>

<!-- Jquery and Popper untuk Tooltip -->
<script src="./assets/js/jquery-3.6.1.js"></script> 
<script src="./assets/js/popper.min.js"></script> 
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#checkAll").click(function(){
            if($(this).is(":checked")){
                $(".checkItem").prop('checked',true);
            }
            else{
                $(".checkItem").prop('checked',false);
            }
        });
    });
</script>