<?php

require '../vendor/autoload.php';
require 'function5.php';
$users = query("SELECT * from users");


$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Daftar Data User</title>
    <link rel="stylesheet" href="../print.css">
</head>
<body>
    <h1> Daftar Data User </h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th> No. </th>
            <th style="text-align:center"> ID User </th>
            <th style="text-align:center"> Nama User </th>
            <th style="text-align:center"> Password </th>
        </tr>';
    $no = 1;
    foreach($users as $row) {
      $html .= '<tr>
                <td>'. $no++ .'</td>
                <td>'. $row['id'].'</td>
                <td>'. $row['username'].'</td>
                <td>'. $row['password'].'</td>
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
                        <td width="33%" style="text-align: right;">Data User</td>
                    </tr>
                </table>
              ');
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Data-User.pdf', \Mpdf\Output\Destination::INLINE);

?>

