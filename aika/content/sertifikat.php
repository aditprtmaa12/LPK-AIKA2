<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Zamzar\ZamzarClient;

function fileExists($filePath)
{
    return file_exists($filePath);
}

function convertDocxToPdf($sourceDocx, $targetPdf, $zamzar)
{
    try {
        $job = $zamzar->jobs->create([
            'source_file' => $sourceDocx,
            'target_format' => 'pdf'
        ]);

        $job->waitForCompletion();

        $job->downloadTargetFiles($targetPdf);

        return true;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

try {
    $zamzar = new ZamzarClient([
        'api_key' => 'bc9c01bfdd3c9a8d470ec5bd842d3a7a99931382',
        'environment' => 'production'
    ]);

    $sourceDocx = __DIR__ . '/../../assets/sertifikat/format_sertifikat.docx';
    $targetPdf = __DIR__ . '/../../assets/sertifikat/format_sertifikat.pdf';
    $url = '';

    if (fileExists($targetPdf)) {
        echo 'Silahkan <a href="' . $url . './../assets/sertifikat/format_sertifikat.pdf">Download Sertifikat</a>';
    } else {
        if (convertDocxToPdf($sourceDocx, $targetPdf, $zamzar)) {
            echo 'Conversion successful. <a href="' . $url . './../assets/sertifikat/format_sertifikat.pdf">Download Sertifikat</a>';
        } else {
            echo 'Conversion failed. Please try again later.';
        }
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
