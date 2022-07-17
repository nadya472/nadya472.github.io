<?php

require '../vendor/autoload.php';
require 'function4.php';
$berobat= query("SELECT * from berobat 
        JOIN pasien ON berobat.id_pasien = pasien.id_pasien
        JOIN dokter ON berobat.id_dokter = dokter.id_dokter
        JOIN obat ON berobat.id_obat = obat.id_obat
   
   ");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Daftar Rekam Medis</title>
    <link rel="stylesheet" href="../print.css">
</head>
<body>
    <h1> Daftar Rekam Medis </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th> No. </th>
            <th style="text-align:center"> Tanggal Berobat </th>
            <th style="text-align:center"> Nama Pasien </th>
            <th style="text-align:center"> Jenis Kelamin </th>
            <th style="text-align:center"> Umur </th>
            <th style="text-align:center"> Keluhan Pasien </th>
            <th style="text-align:center"> Hasil Diagnosa </th>
            <th style="text-align:center"> Nama Dokter </th>
            <th style="text-align:center"> Nama Obat </th>
            <th style="text-align:center"> Keterangan Pemeriksaan </th>

        </tr>';
    $no = 1;
    foreach($berobat as $row) {
      $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['tgl_berobat'].'</td>
                <td>'. $row['nama_pasien'].'</td>
                <td>'. $row['jenis_kelamin'].'</td>
                <td>'. $row['umur'].'</td>
                <td>'. $row['keluhan_pasien'].'</td>
                <td>'. $row['hasil_diagnosa'].'</td>
                <td>'. $row['nama_dokter'].'</td>
                <td>'. $row['nama_obat'].'</td>
                <td>'. $row['penatalaksanaan'].'</td>

                </tr>';

    }

  $html.='</table>

</body>

</html>';
$mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="33%">{DATE j-m-Y}</td>
                        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="text-align: right;">Data Rekam Medis</td>
                    </tr>
                </table>
              ');
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Rekam-Medis.pdf', \Mpdf\Output\Destination::INLINE);

?>

