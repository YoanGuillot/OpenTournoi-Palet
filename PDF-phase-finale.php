<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
$html2pdf = new Html2Pdf('P','A4','fr');

$stylesCSS = "<style>
            h1{
                text-align:center;
                font-size: 24px;
            }  
            table{
                width: 90%;
                border: 1px solid #000000;
                margin: auto;
                border-collapse: collapse;
                text-align:center;
            }
            td, th{
                padding-top: 15px;
                padding-bottom: 15px;
                padding-left: 10px;
                padding-right: 10px;
                border: 1px solid #000000;
                font-size: 18px;
            }
            th{
                width: 54px;
                background-color: #dddddd;
                text-transform : uppercase;
                font-weight: bold;
                vertical-align: middle;
            }
            
            .enteteImpression{
                display:block;
                border: 1px solid #000000;
                background-color: #dddddd;
                font-weight: bold;
                font-size: 30px;
                text-align:center;
                text-transform: uppercase;
                width: 90%;
                margin: auto;
            }

            .numplaque{
                font-weight: bold;
                background-color: #eeeeee;
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
