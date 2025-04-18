<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf('P','A4','fr');

$stylesCSS = "<style>
            h1{
                text-align:center;
            }  
            table{
                width: 90%;
                border: 1px solid #000000;
                margin: auto;
                border-collapse: collapse;
                text-align:center;
            }
            td, th{
                padding: 10px;
                border: 1px solid #000000;
            }
            th{
                width: 50px;
                background-color: #dddddd;
            }
        </style>";

if(isset($_POST['rawhtml']) && isset($_POST['niveau'])){
    $niveau = $_POST['niveau'];
    $rawHtml = $_POST['rawhtml'];
    $rawHtml = $stylesCSS.$rawHtml;

    $html2pdf->writeHTML($rawHtml);
    $html2pdf->output("phasefinale-$niveau.pdf", 'D');
}else{
    echo "Html ou niveau non définis !";
}
 ?>
