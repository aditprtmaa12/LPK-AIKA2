<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();


$buka  = new DateTime($setting['tgl_pengumuman']); //awal Buka
$tutup  = new DateTime($setting['tgl_tutup']); //awal Buka
$hariini = new DateTime(); // Waktu sekarang atau akhir
$diff  = $hariini->diff($buka);
$tgl_buka = $setting['tgl_pengumuman'];
$tgl_tutup = $setting['tgl_tutup'];
$tahun1 = 2022;
$tahun2 = $tahun1+1;
?>

<?php if ($setting['ppdb'] == 1) { ?>
<?php include "tema1.php" ?>
<?php } else { ?>
 <?php include "tema2.php" ?>
 <?php } ?>
			 
<!-- insert sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- catch success message from session -->
<?php if (isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $_SESSION['success'] ?>',
        })
    </script>

    <!-- delete session after shown -->
    <?php unset($_SESSION['success']); ?>
<?php } ?>
