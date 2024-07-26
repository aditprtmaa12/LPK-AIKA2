<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
$siswa = fetch($koneksi, 'siswa', ['id_siswa' => dekripsi($_GET['id'])]);
$tempdir = "../temp/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

//isi qrcode jika di scan
$codeContents = $siswa['nisn'] . '-' . $siswa['nama_siswa'];

//simpan file kedalam temp
//nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

QRcode::png($codeContents, $tempdir . $siswa['nisn'] . '.png', QR_ECLEVEL_M, 4);


$kelas = fetch($koneksi, 'jenjang', ['id_jenjang' => $siswa['kelas']]);
$tgl_lahirsiswa = $siswa['tgl_lahir'];
$tgl_mutasi = $siswa['tgl_mutasi'];
$tahun1 = date('Y');
$tahun2 = date('Y')+1;

?>

<style>
 #hed1 {
    font-family               : Verdana;
	font-size                 : 1px;
	border-collapse				: collapse;
	padding				:0px;
	    background:#999;
}
</style>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <title>Biotata_<?= $siswa['nama_siswa'] ?></title>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<style type="text/css">

body {
    background: #fff;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 12px

}

tr {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding				:0px;
    page-break-inside: avoid;
     page-break-after: auto ;
}
tab.td {
    font-family               : Verdana;
	font-size                 : 11px;
	border-collapse				: collapse;
	padding-left				:5px;
}
input, textarea{
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;

}
option, select {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color            : #000000;
	background-color : #FFFFFF;
}
a, a:link, a:visited, a:active {
    color           : black;
    font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px ;
	text-decoration : none;
}
a:hover {
    color           : red;
	font-weight     : bold;
    font-family     : Verdana;
    font-size       : 11px;
	text-decoration : none;
}
A.headerlink {
    margin           : 1px;
	font-size        : 11px;
	font-family      : Verdana;
	color       : #FFFFFF;
	
}
  
.page-portrait {
    position: relative;
    width: 21cm;
    margin: 0.5cm auto;
    padding: 1cm;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    -webkit-box-sizing: initial;
    -moz-box-sizing: initial;
    box-sizing: initial;

}

.but{
    cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#666;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
}
.disabled{
    background:#c0c0c0;
    padding: 1px 2px;
	color:#000000;
}

.textboxred{
	color:#000000;
	padding: 1px 2px;
	background-color: #FB4678;
}

.header {
   border:outset 2px #000000;
     color:#000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.header1 {
    font-size        : 15px;
	font-weight:bold;
}
.header2 {
	font-family      : Arial;
    font-size        : 22px;
	font-weight:bold;
}
.header3 {
	font-family      : Arial;
    font-size        : 14px;
}
.headerpesan {
    border:outset 1px #ccc;
    background:#999;
    color:#FFFFFF;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2agreen.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlong {
    border:outset 2px #000000;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
}
.headerlink2 {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.headerlink2active {
	cursor:pointer;
    border:outset 1px #ccc;
    background:#999;
    color:#fcf300;
    font-weight:bold;
    padding: 1px 2px;
    background:url(formbg2a.gif) repeat-x left top;
    border-collapse    : collapse;
    font-size        : 12px;
	
}
.tab {
    font-family               : Verdana;
	font-size                 : 11px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : groove 2px #000000;
	border-collapse    : collapse;
}
.tab1 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.tab01 {
    font-family               : Verdana;
	font-size                 : 12px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	
}
.red {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tab2 {
    font-family               : Verdana;
	font-size                 : 11px;
	background-color          : #FFFFFF;
	color                     : #000000;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tab3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}


.headerlongar {
   
    font-weight:smooth;
    padding: 1px 2px;
    background:url(formbg.gif) repeat-x left top;
    border-collapse    : collapse;
 	font-size:15.0pt;
	line-height:105%;
	font-family:Verdana;
	
}


.tabar {
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : groove 2px #000000;
	border-collapse    : collapse;
	font-size:14.0pt;
	line-height:105%;
	font-family:Times New Roman;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
}
.tabar1 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}
.redar {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #FF0000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
}

.tabar2 {
    font-family               : Verdana;
	font-size                 : 11px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-right:none;
}

.tabar3 {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : outset 2px #000000;
	border-collapse    : collapse;
	border-left:none;
}

.ttd {
    font-family               : Verdana;
	font-size                 : 12px;
	color                     : #000000;
	background-color          : #FFFFFF;
	border            : none;
	border-collapse    : collapse;
}
.h {
		background-color:#565656;
		border-collapse    : collapse;
		color:#FFFFFF;
    	font-weight:bold;
	}
.back_table {
	background-image: url(../images/bktablelong.jpg);
	background-repeat: no-repeat;
}
.tab_kelas {
	background-color: #FFFFFF;
	border-bottom-style: none;
}
.miring {
	border-bottom-style: none;
	font-style: italic;
}
.brown {
	color: #663333;
}
.ukuran {
	width: 135px;
}
.ukuranemail {
	width: 150px;
}
.Ukuranketerangan {
	height: 40px;
	width: 200px;
}
.text_merah{
    background:#FFFFFF;
    padding: 1px 2px;
	color:#FF0000;
}
input,textarea,select{
	border:1px solid #333333; padding:1px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

div.page {
    page-break-before:always;
}
.style1{
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF
}
.style6 {
	font-size: 12px;
	font-weight: bold;
}
.style13 {
	font-size: 18px;
}
.style14 {color: #FFFFFF}
header { 
    position: fixed; 
    top: 25%; 
    left:     0px;
    width:    100%;
    height:   100%;
    opacity: .1;
 
}
header img { 
    width:    8cm;
    height:   8cm;
}
#watermark {
				display: block;
				position: fixed;
				top: -10%;
				left: 105px;
				transform: rotate(-45deg);
				transform-origin: 50% 50%;
				opacity: .15;
                font-family: Verdana;
                font-size: 20px;
				color: #76fd4a;
				width: 480px;
				text-align: center;
                white-space: nowrap;
               
			}

            @media print {
    body {
        background: #fff;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12px
    }
            .page {
            page-break-before: always;
        }  
       .page-portrait {
		width: 21cm;
        max-height: 29.7cm;
        padding-top: 1cm;
        padding-bottom: 1cm;
        padding-right: 1.5cm;
        padding-left: 2cm;
        margin: 0cm;
        box-shadow: none;

    }
        .footer {
        bottom: 0.7cm;
        left: 0.7cm;
        right: 0.7cm
    }
}
</style>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</HEAD>
<BODY>


    <div class="page-portrait">
<?php if ($setting['_kop'] == "1") { ?>
 <table width="100%" class="page_header1" >
    <tbody><tr>
       
        <td>
            <center><img src="../../<?= $setting['kop'] ?> " width="100%">
            </center></td>
       
    </tr>
	
    </tbody>
	</table>

		<hr>
	
<?php } else { ?>
    <table width="100%" class="page_header1" >
    <tbody><tr>
        <td style="width:75px;padding-bottom:4px;"><img src="../../<?= $setting['logo'] ?> " height="75px"></td>
        <td>
            <center>
                <span class="header1"><?= $setting['lembaga'] ?> </span><br>
                <span class="header2"><?= $setting['nama_sekolah'] ?></span><br>
                <span class="header3"><i>NSM <?= $setting['nsm'] ?> / NPSN <?= $setting['npsn'] ?><br>
                <?= $setting['alamat'] ?> Kecamatan <?= $setting['kec'] ?>, Kabupaten <?= $setting['kab'] ?> - <?= $setting['provinsi'] ?>                </i></span>
            </center></td>
        <td style="width:75px;padding-bottom:4px;"></td>
    </tr>
    </tbody>
</table>
<?php } ?>

		<table background="#000000" border="2" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                </td>
			</tr>
		</table>

<table width="60%" align="center" border="0">
    <tr>
        <td>

            <br>
            <div align="center" class="style13">
                    <b>FORMULIR PENDAFTARAN SISWA BARU TAHUN PELAJARAN <?= $setting['tahun_pelajaran'] ?> </b>
            </div>
            
        </td>
    </tr>
    </table>



        

        
                
                
                        <table style="font-size: 11pt;" class="table table-striped table-sm table-bordered" cellspacing="0" id="sampleTable">
                            <tbody>

                                <tr>
                                    <th>A.</th>
                                    <th colspan="5">KETERANGAN TENTANG DIRI SISWA</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>1.</td>
                                    <td colspan="2">No. PPDB</td>
                                    <td></td>
                                    <td><b style="font-size: 11pt;">
                                            <?= $siswa['no_daftar'] ?>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>a.</td>
                                    <td>Nama Lengkap</td>
                                    <td >:</td>
                                    <td width="40%">
                                        <b style="font-size: 11pt;">
                                            <?= $siswa['nama_siswa'] ?>
                                        </b>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>b.</td>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td> <b>
                                            <?= $siswa['nik'] ?>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>c.</td>
                                    <td>Nomor Kartu Keluarga</td>
                                    <td>:</td>
                                    <td> <b>
                                            <?= $siswa['no_kk'] ?>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2.</td>
                                    <td colspan="2">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td >
                                        <?php if ($siswa['jk'] == 'L') { ?>
                                            Laki-laki
                                        <?php } elseif ($siswa['jk'] == 'P') { ?>
                                            Perempuan
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>3.</td>
                                    <td colspan="2">Tempat dan Tanggal Lahir</td>
                                    <td>:</td>
                                    <td >
                                        <?= $siswa['tempat_lahir'] ?>, <?php echo tgl_indo("$tgl_lahirsiswa"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>4.</td>
                                    <td colspan="2">Agama</td>
                                    <td>:</td>
                                    <td ><?= $siswa['agama'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>5.</td>
                                    <td colspan="2">Kewarganegaraan</td>
                                    <td>:</td>
                                    <td ><?= $siswa['warga_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>6.</td>
                                    <td colspan="2">Anak Keberapa</td>
                                    <td>:</td>
                                    <td ><?= $siswa['anak_ke'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>7.</td>
                                    <td colspan="2">Jumlah Saudara kandung</td>
                                    <td>:</td>
                                    <td ><?= $siswa['saudara'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>8.</td>
                                    <td colspan="2">Anak Yatim / Piatu / Yatim Piatu</td>
                                    <td>:</td>
                                    <td>
                                        <?php if ($siswa['status_ayah'] == 'Sudah Meninggal') { ?>
                                            Yatim
                                        <?php } elseif ($siswa['status_ibu'] == 'Sudah Meninggal') { ?>
                                            Piatu
                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>9.</td>
                                    <td colspan="2">Cita_cita</td>
                                    <td>:</td>
                                    <td><?= $siswa['cita'] ?></td>
                                </tr>
								<tr>
                                    <th>B.</th>
                                    <th colspan="5">KETERANGAN TEMPAT TINGGAL</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>10.</td>
                                    <td colspan="2">Alamat</td>
                                    <td>:</td>
                                    <td style="text-transform: lowercase;">
                                        <?= $siswa['alamat_siswa'] ?>,&nbsp;
                                        <?= $siswa['desa'] ?>,&nbsp;
                                        <?= $siswa['kec'] ?>,&nbsp;
                                        <?= $siswa['kab'] ?>,&nbsp;
                                        <?= $siswa['prov'] ?>,&nbsp;
                                        <?= $siswa['kodepos_siswa'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>11.</td>
                                    <td colspan="2">Nomor Telepon/Hanphone</td>
                                    <td>:</td>
                                    <td><?= $siswa['no_hp'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>12.</td>
                                    <td colspan="2">Tinggal dengan Orang Tua/Saudara/ Di Asrama/Kost</td>
                                    <td>:</td>
                                    <td ><?= $siswa['status_tinggal_siswa'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>13.</td>
                                    <td colspan="2">Jarak Tempat Tinggal ke Sekolah</td>
                                    <td>:</td>
                                    <td ><?= $siswa['jarak'] ?></td>
                                </tr>
                                <tr>
                                    <th>C.</th>
                                    <th colspan="5">KETERANGAN KESEHATAN</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>14.</td>
                                    <td colspan="2">Kebutuhan Khusus</td>
                                    <td>:</td>
                                    <td><?= $siswa['keb_khusus'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>15.</td>
                                    <td colspan="2">Kebutuhan Disibilitas</td>
                                    <td>:</td>
                                    <td><?= $siswa['keb_disabilitas'] ?></td>
                                </tr>
                                <tr>
                                    <th>D.</th>
                                    <th colspan="5">KETERANGAN PENDIDIKAN</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>16.</td>
                                    <td colspan="2">Pendidikan Sebelumnya</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>a.</td>
                                    <td>Asal Sekolah / NPSN</td>
                                    <td>:</td>
                                    <td><?= $siswa['asal_sekolah'] ?>/<?= $siswa['npsn_sekolah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>b.</td>
                                    <td>No Seri Ijazah</td>
                                    <td>:</td>
                                    <td><?= $siswa['seri_ijazah'] ?></td>
                                </tr>

                                
                                
								<tr>
                                    <th>E.</th>
                                    <th colspan="5">KETERANGAN TENTANG AYAH KANDUNG</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>18.</td>
                                    <td colspan="2">Nama</td>
                                    <td>:</td>
                                    <td><?= $siswa['nama_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>19.</td>
                                    <td colspan="2">Tempat dan Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $siswa['tempat_lahir_ayah'] ?>, <?= $siswa['tgl_lahir_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>20.</td>
                                    <td colspan="2">Kewarganegaraan</td>
                                    <td>:</td>
                                    <td><?= $siswa['warga_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>21.</td>
                                    <td colspan="2">Pendidikan Terakhir</td>
                                    <td>:</td>
                                    <td><?= $siswa['pendidikan_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>22.</td>
                                    <td colspan="2">Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $siswa['pekerjaan_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>23.</td>
                                    <td colspan="2">Penghasilan per Bulan</td>
                                    <td>:</td>
                                    <td><?= $siswa['penghasilan_ayah'] ?></td>
                                </tr>
								<tr>
                                    <td></td>
                                    <td>24.</td>
                                    <td colspan="2">Alamat Rumah/Nomor Telepon</td>
                                    <td>:</td>
                                    <td style="text-transform: lowercase;">
                                        <?= $siswa['alamat_ayah'] ?>,&nbsp;
                                        <?= $siswa['desa_ayah'] ?>,&nbsp;
                                        <?= $siswa['kec_ayah'] ?>,&nbsp;
                                        <?= $siswa['kab_ayah'] ?>,&nbsp;
                                        <?= $siswa['prov_ayah'] ?>,&nbsp;
                                        <?= $siswa['kodepos_ayah'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>25.</td>
                                    <td colspan="2">Masih Hidup / Meninggal Dunia Tahun</td>
                                    <td>:</td>
                                    <td><?= $siswa['status_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <th>F.</th>
                                    <th colspan="5">KETERANGAN TENTANG IBU KANDUNG</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>26.</td>
                                    <td colspan="2">Nama</td>
                                    <td>:</td>
                                    <td><?= $siswa['nama_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>27.</td>
                                    <td colspan="2">Tempat dan Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $siswa['tempat_lahir_ibu'] ?>, <?= $siswa['tgl_lahir_ibu'] ?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>28.</td>
                                    <td colspan="2">Kewarganegaraan</td>
                                    <td>:</td>
                                    <td><?= $siswa['warga_ibu'] ?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>20.</td>
                                    <td colspan="2">Pendidikan Terakhir</td>
                                    <td>:</td>
                                    <td><?= $siswa['pendidikan_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>30.</td>
                                    <td colspan="2">Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $siswa['pekerjaan_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>31.</td>
                                    <td colspan="2">Penghasilan per Bulan</td>
                                    <td>:</td>
                                    <td><?= $siswa['penghasilan_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>32.</td>
                                    <td colspan="2">Alamat Rumah/Nomor Telepon</td>
                                    <td>:</td>
                                    <td style="text-transform: lowercase;">
                                        <?= $siswa['alamat_ibu'] ?>,&nbsp;
                                        <?= $siswa['desa_ibu'] ?>,&nbsp;
                                        <?= $siswa['kec_ibu'] ?>,&nbsp;
                                        <?= $siswa['kab_ibu'] ?>,&nbsp;
                                        <?= $siswa['prov_ibu'] ?>,&nbsp;
                                        <?= $siswa['kodepos_ibu'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>33.</td>
                                    <td colspan="2">Masih Hidup / Meninggal Dunia Tahun</td>
                                    <td>:</td>
                                    <td><?= $siswa['status_ibu'] ?></td>
                                </tr>

                                <tr>
                                    <th>G.</th>
                                    <th colspan="5">KETERANGAN TENTANG WALI</th>
                                </tr>
								 <tr>
								<td colspan="5"><?= $siswa['status_wali'] ?></td>
								 </tr>
                                

                                

                                
                                <tr>
                                    <td colspan="5"> Note : 
									<br>Formulir ini merupakan Hasil isian Data saya di Website Portal PPDB Online
									<br><b>Saya Bertanggung Jawab Penuh Atas Seluruh Iisan data di Formulir ini
									<br>
									<br>
									<br>
									<br>
										<b><?= $siswa['nama_siswa'] ?></b>
                                    </td>
                                   
                                    <td class="text-center">
                                        <img class="img" src="../../<?= $siswa['foto'] ?>" ec="H" style="width: 30mm; background-color: white; color: black;">
										
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="row footer">
                            <!-- <img src="https://jasaeditfoto.com/wp-content/uploads/2017/04/mengganti-warna-background-pas-foto.jpg" alt="foto_pas"> -->
                        </div>
                    </div>
                </div>
            </div>
            <p style="page-break-after: always;"></p>

            <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'></script>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        </body>


</html>
