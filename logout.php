<?php
session_start();
session_destroy();

echo "<script src='assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
    <link rel='stylesheet' href='assets/js/sweetalert2/dist/sweetalert2.min.css'>";
    echo "<script type='text/javascript'>
          setTimeout(function() {
			      Swal.fire({
			      	title: 'Logout Berhasil',
			      	icon: 'success',
			      	timer: 2000,
              showConfirmButton: false
			      });
		      }, 100);
          window.setTimeout(function(){
            document.location='index.php';
          }, 2000); 
          </script>";
