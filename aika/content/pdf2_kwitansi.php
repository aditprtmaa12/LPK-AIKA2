<?php
ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
$id_bayar = $_GET['id'];
$bayar = fetch($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
$b_total = $bayar['jumlah'];
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => $bayar['id_siswa']]);
$tgl_bayar = $bayar['tgl_bayar'];
?>

<html>
<head>
<title>Faktur Pembayaran</title>
<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:12pt;'>
<center>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b><?= $setting['nama_sekolah'] ?></b></span><br>
Alamat <?= $setting['alamat'] ?> <br>
Telp : <?= $setting['no_telp'] ?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'>BUKTI PEMBAYARAN</span></b><br>
No Trans. : <?= $id_bayar ?><br>
Tanggal : <?php echo tgl_indo("$tgl_bayar");?></br>
</td>
</table>
<br>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Nama Siswa : <?= $siswa['nama_siswa'] ?><br>
No Daftar : <?= $siswa['no_daftar'] ?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Hp : <?= $siswa['no_hp'] ?>
</td>
</table>
<br>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 
<tr align='center'>
<td width='10%'>No Transaksi</td>
<td width='20%'>Jenis Pembayaran</td>
<td width='13%'>Harga</td>
<td width='4%'>Qty</td>
<td width='7%'>Discount</td>
<td width='13%'>Total Harga</td>
<tr><td><?= $id_bayar ?></td>
<td><?= $bayar['keterangan'] ?></td>
<td><?= "Rp " . number_format($bayar['jumlah'], 2, ",", ".") ?></td>
<td>1</td>
<td>Rp0,00</td>
<td style='text-align:right'><?= "Rp " . number_format($bayar['jumlah'], 2, ",", ".") ?></td>


<tr>
<td colspan = '5'><div style='text-align:right'>Total Yang Sudah Dibayar : </div></td>
<td style='text-align:right'><?= "Rp " . number_format($bayar['jumlah'], 2, ",", ".") ?> </td>
</tr>

<tr>
<td colspan = '6'><div style='text-align:right'>Terbilang : <b><?php echo terbilang("$b_total");?> Rupiah </b></div></td>
</tr>

</table>
 
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
<tr>
<td align='center'>Diterima Oleh,<br><br><br><u>(............)</u></td>
<td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
<td align='center'>Pendaftar,<br><br><br><u>(<?= $siswa['nama_siswa'] ?>)</u></td>
</tr>
</table>
</center>
</body>
</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);
?>