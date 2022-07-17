<?php

require '../vendor/autoload.php';
require 'function3.php';
$obat = query("SELECT * from obat");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Daftar Data Obat</title>
    <link rel="stylesheet" href="../print.css">
</head>
<body>
    <h1> Daftar Data Obat </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th> No. </th>
            <th style="text-align:center"> ID Obat </th>
            <th style="text-align:center"> Nama Obat </th>
        </tr>';
    $no = 1;
    foreach($obat as $row) {
      $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['id_obat'].'</td>
                <td>'. $row['nama_obat'].'</td>
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
                        <td width="33%" style="text-align: right;">Data Obat</td>
                    </tr>
                </table>
              ');
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Data-Obat.pdf', \Mpdf\Output\Destination::INLINE);

?>

