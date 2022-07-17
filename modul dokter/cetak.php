<?php

require '../vendor/autoload.php';
require 'function.php';
$dokter = query("SELECT * from dokter");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Daftar Data Dokter</title>
    <link rel="stylesheet" href="../print.css">
</head>
<body>
    <h1> Daftar Data Dokter </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th> No. </th>
            <th style="text-align:center"> ID Dokter </th>
            <th style="text-align:center"> Nama Dokter </th>
        </tr>';
    $no = 1;
    foreach($dokter as $row) {
      $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['id_dokter'].'</td>
                <td>'. $row['nama_dokter'].'</td>
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
                        <td width="33%" style="text-align: right;">Data Dokter</td>
                    </tr>
                </table>
              ');
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Data-Dokter.pdf', \Mpdf\Output\Destination::INLINE);

?>

