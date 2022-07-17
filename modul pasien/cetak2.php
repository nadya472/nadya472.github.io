<?php

require '../vendor/autoload.php';
require 'function2.php';
$pasien = query("SELECT * from pasien");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Daftar Data Pasien</title>
    <link rel="stylesheet" href="../print.css">
</head>
<body>
    <h1> Daftar Data Pasien </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th> No. </th>
            <th style="text-align:center"> ID Pasien </th>
            <th style="text-align:center"> Nama Pasien </th>
            <th style="text-align:center"> Jenis Kelamin </th>
            <th style="text-align:center"> Umur </th>
        </tr>';
    $no = 1;
    foreach($pasien as $row) {
      $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['id_pasien'].'</td>
                <td>'. $row['nama_pasien'].'</td>
                <td>'. $row['jenis_kelamin'].'</td>
                <td>'. $row['umur'].'</td>
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
                        <td width="33%" style="text-align: right;">Data Pasien</td>
                    </tr>
                </table>
              ');
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Data-Pasien.pdf', \Mpdf\Output\Destination::INLINE);

?>

