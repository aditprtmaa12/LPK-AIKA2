<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();

// register student
if ($pg == 'register') {
    // get max code student
    $query = "SELECT max(no_daftar) as maxKode FROM siswa";
    $hasil = mysqli_query($koneksi, $query);
    $maxKode  = mysqli_fetch_array($hasil);
    $kodedaftar = $maxKode['maxKode'];

    // generate new code student by incrementing the last code
    $noUrut = (int) substr($kodedaftar, 8, 3);
    $noUrut++;

    // generate new code student
    $char = "ITTIBA" . date('Y');
    $newID = $char . sprintf("%03s", $noUrut);

    // sanitize input data
    $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama_siswa'])));

    // prepare data to be inserted
    $data = [
        'no_daftar' => $newID,
        'jenis' => $_POST['jenis'],
        'asal_sekolah' => $_POST['asal_sekolah'],
        'jurusan' => $_POST['jurusan'],
        'nisn' => $_POST['nisn'],
        'nama_siswa' => $nama,
        'no_hp' => $_POST['nohp'],
        'tempat_lahir' => ucwords($_POST['tempat']),
        'tgl_lahir' => $_POST['tgllahir'],
        'password' => $_POST['password'],
        'status' => 0

    ];

    // check if nisn already registered
    $cek = rowcount($koneksi, 'siswa', ['nisn' => $_POST['nisn']]);
    if ($cek == 0) {
        $exec = insert($koneksi, 'siswa', $data);

        // redirect to index file and send success message via session
        $_SESSION['success'] = "Pendaftaran Berhasil. Silahkan Login dengan NIM dan Password Anda";
        return header('Location: index.php');
    } else {
        $pesan = [
            'pesan' => 'NIM sudah terdaftar'
        ];
        echo json_encode($pesan);
    }
}

if ($pg == 'simpan') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        
        $query = "SELECT max(no_daftar) as maxKode FROM siswa";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $char = "ITTIBA" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama_siswa'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
			'asal_sekolah' => $_POST['asal_sekolah'],
			'jurusan' => $_POST['jurusan'],
            'nisn' => $_POST['nisn'],
            'nama_siswa' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'password' => $_POST['password'],
            'status' => 0
			
        ];

$cek = rowcount($koneksi, 'siswa', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'siswa', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
				'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];
                $pesanWAadmin    = "Assalamualaikum wr wb.\n\nSiswa atas nama Yth.*$_POST[nama_siswa]*\n\nTelah Berhasil Mendaftar dengan No Pendaftaran *$newID*\n\n";
				$pesanWA    = "Assalamualaikum wr wb.\n\nKepada Yth.*$_POST[nama_siswa]*\n\nProses Pendaftaran anda  di *$setting[nama_sekolah]* Telah berhasil\n\n";
                $pesanWA    .= "*Berikut Detail Akun anda*.\n";
                $pesanWA    .= "No Pendaftaran: *$newID*\n";
                $pesanWA    .= "Nama: *$nama*\n";
                $pesanWA    .= "Tempat Lahir: *$_POST[tempat]*\n";
                $pesanWA    .= "Tanggal Lahir: *$_POST[tgllahir]*\n";
                $pesanWA    .= "Asal Sekolah: *$_POST[asal_sekolah]*\n";
				$pesanWA    .= "No Hp: *$_POST[nohp]*\n";
                $pesanWA    .= "Username: *$_POST[nisn]*\n";
                $pesanWA    .= "Password: *$_POST[password]*\n\n";;
                $pesanWA    .= "Salam kami,\n";
                $pesanWA    .= "*$setting[nama_sekolah]*\n\n";
				
				
                
                $dataWA = [
                    'api_key' => $setting['apikey'],
					'sender'  => $setting['sender'],
					'number'  => $_POST['nohp'], //MASUKAN VARIABEL $noHP disini
                    'message' => $pesanWA
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
				$dataWAadmin = [
                    'api_key' => $setting['apikey'],
					'sender'  => $setting['sender'],
					'number'  => $setting['nolivechat'],
                    'message' => $pesanWAadmin
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
				
                
                
                echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}
if ($pg == 'simpan2') {
    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['kodepengaman']) == false) {
        $pesan = [
            'pesan' => 'KODE CAPTCHA SALAH'
        ];
        echo json_encode($pesan);
    } else {
        
        $query = "SELECT max(no_daftar) as maxKode FROM siswa";
        $hasil = mysqli_query($koneksi, $query);
        $data  = mysqli_fetch_array($hasil);
        $kodedaftar = $data['maxKode'];
        $noUrut = (int) substr($kodedaftar, 8, 3);
        $noUrut++;
        $char = "ITTIBA" . date('Y');
        $newID = $char . sprintf("%03s", $noUrut);
        $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama_siswa'])));
        $data = [
            'no_daftar' => $newID,
            'jenis' => $_POST['jenis'],
			'asal_sekolah' => $_POST['asal_sekolah'],
            'nisn' => $_POST['nisn'],
            'nama_siswa' => $nama,
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => ucwords($_POST['tempat']),
            'tgl_lahir' => $_POST['tgllahir'],
            'password' => $_POST['password'],
            'status' => 0
			
        ];

$cek = rowcount($koneksi, 'siswa', ['nisn' => $_POST['nisn']]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'siswa', $data);
            $namapendek = explode(" ", $nama);
            $pesan = [
                'pesan' => 'ok',
                'id' => $newID,
				'nisn' => $_POST['nisn'],
                'pass' => $_POST['password'],
                'nama' => $namapendek[0]
            ];



echo json_encode($pesan);
        } else {
            $pesan = [
                'pesan' => 'Nisn sudah terdaftar'
            ];
            echo json_encode($pesan);
        }
    }
}
if ($pg == 'login') {
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE status in (0,1) and nisn='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Data Anda Belum Terdaftar!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_siswa'];
               
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
    }
if ($pg == 'login2') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa WHERE no_siswa='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan Hubungi Operator Sekolah!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_siswa'];
                mysqli_query($koneksi, "UPDATE siswa set online='1' where id_siswa='$siswa[id_siswa]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}
