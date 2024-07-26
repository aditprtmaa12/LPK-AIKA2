<?php
// Include autoloader jika Anda menggunakan Composer
require 'vendor/autoload.php';

// Include DOMPDF jika Anda tidak menggunakan Composer
// require 'path/to/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Mengatur opsi DOMPDF (opsional)
$options = new Options();
$options->set('defaultFont', 'Courier');

// Membuat instance DOMPDF
$dompdf = new Dompdf($options);

// HTML yang akan diubah menjadi PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh PDF</title>
</head>
<body>
    <h1>Hello, World!</h1>
    <p>Ini adalah contoh pembuatan PDF menggunakan DOMPDF.</p>
</body>
</html>
';

// Memuat HTML ke DOMPDF
$dompdf->loadHtml($html);

// Mengatur ukuran dan orientasi kertas (opsional)
$dompdf->setPaper('A4', 'portrait');

// Merender HTML menjadi PDF
$dompdf->render();

// Menghasilkan file PDF ke browser (dengan nama file download)
$dompdf->stream("contoh_pdf.pdf", array("Attachment" => 0));
?>
