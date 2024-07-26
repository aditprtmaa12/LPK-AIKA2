<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}


    $id_siswa = $_POST['id_siswa'];
    $data = [
        
        'status'         => 1
    ];
   
   update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
  $query = mysqli_query($koneksi, "select * from siswa WHERE id_siswa='$id_siswa'");
   while ($data0 = mysqli_fetch_array($query)) {

    $namaSiswa = $data0['nama_siswa'];
    $noHP   = $data0['no_hp'];
    $no_daftar = $data0['no_daftar'];

    }
    $pesanWA    .= "Assalamaulaikum wr wb.\nYth.*$namaSiswa*\nBerikut Kami Informasikan Bahwa Status Pendaftaran Anda  dengn no Pendaftaran *$no_daftar* Sudah Di Terima di *$setting[nama_sekolah]* .\n\n";
    $pesanWA    .= "Salam kami,\n";
    $pesanWA    .= "*$setting[nama_sekolah]*\n";
    
    $dataWA = [
        'api_key' => 'e4a1e24bedf30f13c494fda31c76881ab3f7138b',
        'sender'  => '6282342398998',
        'number'  => '087854743264' //MASUKAN VARIABEL $noHP disini
        'message' => $pesanWA,
        
    ];
    
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://wa.nwkaltara.web.id/api/send-message.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 0,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($dataWA))
    );
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;  
    




