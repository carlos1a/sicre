<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setFooterData(PDF_FOOTER_STRING,array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'lang/spa.php')) {
	require_once(dirname(__FILE__).'lang/spa.php');
	$pdf->setLanguageArray($l);
}

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

	$asignado=unserialize($_GET['asig']);




	$html='<link rel="stylesheet" href="../../css/bootstrap.css"><h3>Acta de Entrega de Activos Tecnológicos<br><br></h3>';
	$html.='<p align="justify"><i>   Por medio de la presente se hace constar que la Gerencia de Tecnología realiza la asignación de los equipos abajo descritos, los cuakes se encuentran en perfectas condiciones y completamente operativos<br><br></p>';
	$html.='<table border="1" >';
	$html.='<thead>';
        $html.='<tr>';

            $html.='<th>Responsable</th>';
            $html.='<th>Marca</th>';
            $html.='<th>Modelo</th>';
            $html.='<th>Tipo de Equipo</th>';
            $html.='<th>Serial</th>';
            $html.='<th>Asignado por</th>';
        $html.='</tr>';
    $html.='</thead>';
$html.='<tbody>';


    # code...
for ($i=0; $i < count($asignado); $i++) {
        $html.='<tr>';
            $html.='<td align="center">'.$asignado[$i][5].'</td>';
            $html.='<td  align="center">'.$asignado[$i][6].'</td>';
            $html.='<td align="center">'.$asignado[$i][7].'</td>';
            $html.='<td align="center">'.$asignado[$i][8].'</td>';
            $html.='<td align="center">'.$asignado[$i][9].'</td>';
            $html.='<td align="center">'.$asignado[$i][2].'</td>';
        $html.='</tr>';
}
$html.='</table><br><br>';
$html.='<p>   Compromiso de uso:</p><br>
<ul>
<li>Las Impresoras fiscales por ningún motivo deben ser conectadas a los UPS (Sistemas de Alimentación Ininterrumpida) o a Reguladores de Voltaje. Deben estar conectadas a la corriente directa</li>
<br>
<li>Los equipos son de uso exclusivo a las funciones operativas de la Farmacia, está terminantemente prohibido el uso con fines personales de los mismos, cualquier inconveniente debe ser reportado a través del correo electronico: Soportetecnico@farmapatria.com.ve</li>
<br>
<li>En caso de pérdida, deterioro, robo, hurto u extravío del equipo, se implementara el descuento del monto del valor del bien afectado, sin perjuicio de lo establecido en el Art. 53 de la ley Contra Corrupción. A tales fines la Gerencia de Recursos Humanos tomara las medidas pertinentes para establecer los procedimientos correspondientes, de acuerdo a los resultados de las actuaciones efectuadas por el Órgano de Control Interno.</li><br><br><br><br>
</ul>

<table border="0" style="position:fixed;">
    <thead>
        <tr>

            <th>Aprobado por </th>


        </tr>
    </thead>
    <tbody>
     	 <tr>
            <td>_______________</td>
         </tr>
		 <tr>
            <td>Jorge Espinoza</td>
         </tr>
          <tr>
            <td>C.I. 15.821.661</td>
         </tr>

    </tbody>
</table>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Asignación de Equipos.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
