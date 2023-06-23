$('.delete-data').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Ingin Menghapus Data Ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.delete-modul').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Ingin Menghapus Modul Ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.multi-delete-jurusan').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_jurusan[]"]').serialize();

    if($('input[name="id_jurusan[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_jurusan.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Jurusan Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=jurusan';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-prodi').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_prodi[]"]').serialize();

    if($('input[name="id_prodi[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_prodi.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Prodi Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=prodi';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-matkul').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_matkul[]"]').serialize();

    if($('input[name="id_matkul[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_matkul.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Matkul Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=mata_kuliah';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-mhs').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_mhs[]"]').serialize();

    if($('input[name="id_mhs[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_mhs.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Mahasiswa Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_mahasiswa';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-lab').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_laboran[]"]').serialize();

    if($('input[name="id_laboran[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_lab.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Laboran Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_laboran';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-guest').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_guest[]"]').serialize();

    if($('input[name="id_guest[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_guest.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Guest Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_guest';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-dosen').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_dosen[]"]').serialize();

    if($('input[name="id_dosen[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_dosen.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Dosen Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_dosen';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.multi-delete-admin').on('click', function(e){
    e.preventDefault();
    let id = $('input[name="id_admin[]"]').serialize();

    if($('input[name="id_admin[]"]:checked').length < 1) {
        Swal.fire({
            title: 'Cek Data Yang Ingin Dihapus!',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: id,
                    url: 'multiDelete_admin.php',
                    success:function(){
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Admin Berhasil Dihapus',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_admin';
                        }, 2000);
                    }
                })
            }
        })
    }
})

$('.delete-soal').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Ingin Menghapus Soal Ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.delete-enroll').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Ingin Unenroll Matkul Ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.logout').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin Ingin Logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.mulaiQuiz').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin Ingin Mengerjakan Quiz?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})

$('.lanjutQuiz').on('click', function(e){
    e.preventDefault();
    var getlink = $(this).attr('href');

    Swal.fire({
        title: 'Quiz Anda Masih Ada Sisa Waktu, Ingin Melanjutkan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Lanjut',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = getlink;
        }
    })
})