<?php
include 'koneksi.php';

$sql = "SELECT * FROM kegiatan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>" .
             "Tanggal: " . $row["tanggal"]. "<br>" .
             "Kode: " . $row["kode"]. "<br>" .
             "Laporan Kegiatan: " . $row["laporan_kegiatan"]. "<br>" .
             "Foto Kegiatan: <img src='" . $row["foto_kegiatan"] . "' width='200'><br><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
