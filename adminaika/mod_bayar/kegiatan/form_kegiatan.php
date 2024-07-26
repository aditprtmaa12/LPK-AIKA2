<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Kegiatan</title>
</head>
<body>
    <h2>Form Input Kegiatan</h2>
    <form action="simpan_kegiatan.php" method="post" enctype="multipart/form-data">
        Tanggal: <input type="date" name="tanggal" required><br><br>
        Kode: <input type="text" name="kode" required><br><br>
        Laporan Kegiatan: <textarea name="laporan_kegiatan" rows="5" cols="40" required></textarea><br><br>
        Foto Kegiatan: <input type="file" name="foto_kegiatan" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
