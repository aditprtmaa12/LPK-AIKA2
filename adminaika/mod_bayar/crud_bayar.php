<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
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
    $today = date("Ymd");

    // cari id transaksi terakhir yang berawalan tanggal hari ini
    $query = "SELECT max(id_bayar) AS last FROM bayar WHERE id_bayar LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $data = [
        'id_bayar'      => $nextNoTransaksi,
        'id_siswa'     => $_POST['id'],
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'     => $_POST['tgl'],
        'id_user'       => $_SESSION['id_user']

    ];
    $exec = insert($koneksi, 'bayar', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];
    delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
}

if ($pg == 'verifikasi') {
    $id_bayar = $_POST['id_bayar'];

    $data = [
        'verifikasi' => 1
    ];


    $query = mysqli_query($koneksi, "select * from bayar a join siswa b ON a.id_siswa=b.id_siswa where a.id_bayar='$id_bayar'");
    while ($data0 = mysqli_fetch_array($query)) {

        $namaSiswa = $data0['nama_siswa'];
        $namauser = $user['nama_user'];
        $noHP   = $data0['no_hp'];
        $id = $data0['id_bayar'];
    }

    $pesanWA    .= "Assalamaulaikum wr wb.\nYth.*$namaSiswa*\nBerikut Kami Informasikan Bahwa Status Pembayaran Anda  dengn no transaksi *$id_bayar* *Sudah Di Verifikasi* oleh *Panitia PPDB*.\n\n";
    $pesanWA    .= "*Bukti Pembayaran*: http://$_SERVER[HTTP_HOST]/ppdb/content/pdf2_kwitansi.php?id=$id\n\n";
    $pesanWA    .= "Salam kami,\n";
    $pesanWA    .= "*$setting[nama_sekolah]*\n";
    $pesanWA    .= "$setting[klikchat]\n";


    $dataWA = [
        'api_key' => $setting['apikey'],
        'sender'  => $setting['sender'],
        'number'  => $noHP, //MASUKAN VARIABEL $noHP disini
        'message' => $pesanWA,


    ];


    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => "$setting[server]/api/send_jadwal.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($dataWA)
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}

if ($pg == 'batalverifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 0
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}


if ($pg == 'verifikasi_kegiatan') {
    $id = $_POST['id'];
    $status = true;

    $query = "UPDATE berkas SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($koneksi);
    }
}
if ($pg == 'tolak_kegiatan') {
    $id = $_POST['id'];
    $status = false;

    $query = "UPDATE berkas SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($koneksi);
    }
}

if ($pg == 'hapus_kegiatan') {
    $id = $_POST['id'];

    $query = "DELETE FROM berkas WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($koneksi);
    }
}
