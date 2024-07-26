<?php
include 'koneksi.php';

$tanggal = $_POST['tanggal'];
$kode = $_POST['kode'];
$laporan_kegiatan = $_POST['laporan_kegiatan'];

// Upload file foto kegiatan
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto_kegiatan"]["name"]);
move_uploaded_file($_FILES["foto_kegiatan"]["tmp_name"], $target_file);
$foto_kegiatan = $target_file;

// Simpan data ke database
$sql = "INSERT INTO kegiatan (tanggal, laporan_kegiatan, kode, foto_kegiatan)
        VALUES ('$tanggal', '$laporan_kegiatan', '$kode', '$foto_kegiatan')";

if ($conn->query($sql) === TRUE) {
    echo "Data kegiatan berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
