<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];

if ($pg == 'ubah') {
    $verifikasi = (isset($_POST['verifikasi'])) ? 1 : 0;
    $data = [
        'nama_bayar' => $_POST['nama'],
        'verifikasi' => $verifikasi
    ];
    $id_bayar = $_POST['id_bayar'];
    $excec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    echo $exec;
}
if ($pg == 'tambah') {
    $siswa = $_POST['nama_siswa'];
    $today = date("Ymd");
    $query = "SELECT max(id_bayar) AS last FROM bayar WHERE id_bayar LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $ektensi = ['jpg', 'jpeg','png'];
    if ($_FILES['bukti']['name'] <> '') {
        $logo = $_FILES['bukti']['name'];
        $temp = $_FILES['bukti']['tmp_name'];
        $ext = explode('.', $logo);
        $ext = end($ext);
        //$siswa = fetch($koneksi, 'siswa', ['id_siswa' => $id]);
        if (in_array($ext, $ektensi)) {
            $dest = 'bukti_transaksi/bukti_' . $nextNoTransaksi . '.' . $ext;
            $upload = move_uploaded_file($temp,  $dest);
            if ($upload) {
                $data = [
                    'id_bayar'      => $nextNoTransaksi,
                    'id_siswa'     => $_POST['id'],
                    'jumlah'        => str_replace(",", "", $_POST['jumlah']),
                    'tgl_bayar'     => $_POST['tgl'],
                    'id_user'       => 0,
                    'bukti'         => $dest
                ];


                $exec = insert($koneksi, 'bayar', $data);
                if ($exec) {
                    
                    echo 'ok';
                    
                } else {
                    echo "pembayaran tidak tersimpan ulangi lagi yak";
                }
            } else {
                echo "pembayaran tidak tersimpan ulangi lagi yak";
            }
        }
    }
}
if ($pg == 'tambah') {

                					
				$pesanWA    = "Assalamualaikum *$siswa*....\n\nStatus Pembayaran Anda Sudah Terkirim*\n\n";
				$pesanWA    .= "Tanggal: *$_POST[tgl]*\n";
                $pesanWA    .= "Jumlah: *Rp.$_POST[jumlah]*\n";
                $pesanWA    .= "Kode Transaksi*: *$nextNoTransaksi*\n";
                $pesanWA    .= "*Bukti Transaksi*: https://$_SERVER[HTTP_HOST]/ppdb/content/$dest\n\n";
                $pesanWA    .= "Salam kami,\n";
                $pesanWA    .= "*$setting[nama_sekolah]*\n";
				$pesanWA    .= "*$setting[klikchat]*\n";
				$pesanWA2    = "Assalamualaikum Admin....\n\nSiswa Atas Nama *$siswa* telah melakukan Pembayaran di  *$setting[nama_sekolah]*\n\n";
                $pesanWA2    .= "Tanggal: *$_POST[tgl]*\n";
                $pesanWA2    .= "Jumlah: *Rp.$_POST[jumlah]*\n";
                $pesanWA2    .= "Kode Transaksi*: *$nextNoTransaksi*\n";
                $pesanWA2    .= "*Bukti Transaksi*: https://$_SERVER[HTTP_HOST]/ppdb/content/$dest\n\n";
                $pesanWA2    .= "Salam kami,\n";
                $pesanWA2    .= "*$setting[nama_sekolah]*\n";


                $dataWAadmin = [
					'api_key' => $setting['apikey'],
					'sender'  => $setting['sender'],
                    'number'  => $setting['nolivechat'], 
                    'message' => $pesanWA2,
					
				

                ];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "$setting[server]/api/send_jadwal.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode($dataWAadmin))
                );

                $response = curl_exec($curl);

				curl_close($curl);
				
				
				$dataWA = [
					'api_key' => $setting['apikey'],
					'sender'  => $setting['sender'],
                    'number'  => $_POST['no_hp'], 
                    'message' => $pesanWA,
					
				

                ];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                   CURLOPT_URL => "$setting[server]/api/send_jadwal.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode($dataWA))
                );

                $response = curl_exec($curl);

				curl_close($curl);



    }


if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];

    $bayar = fetch($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    if (file_exists($bayar['bukti'])) {
        if (unlink($bayar['bukti'])) {
            delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
        }
    }
}
