<?php
$PDF_HEADER_TITLE = 'listado-censo';
$PDF_MARGIN_HEADER = 30;
$PDF_MARGIN_TOP = 40;
$PDF_PAGE_ORIENTATION = 'l';
$PDF_PAGE_FORMAT = 'LEGAL';
// Include the main TCPDF library (search for installation path).
require_once('assets/lib/TCPDF/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        $PDF_HEADER_TITLE = 'Lista de personas Censadas';
        $LOGO = 'assets/image/escudo-tachira.png';
        // Logo
        $image_file = $LOGO;
        $this->Image($image_file, 10, 12, 25, '', 'png', '', 'T', true, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 24);
        // Title
        $this->Cell(0, 10, $PDF_HEADER_TITLE, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF($PDF_PAGE_ORIENTATION, PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Estudiante');
$pdf->SetTitle($PDF_HEADER_TITLE);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin($PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists('assets/lib/TCPDF/lang/spa.php')) {
    require_once('assets/lib/TCPDF/lang/spa.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// Set some content to print
$cedula = $_POST['cedula'];

if (!isset($cedula) || $cedula == '') {
    $html = '
<table class="table" border="1" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="2%">N</th>
                <th width="7%">CEDULA</th>
                <th width="8%">NOMBRE</th>
                <th width="8%">APELLIDO</th>
                <th width="8%">TELEFONO</th>
                <th width="6%">HIJOS</th>
                <th width="6%">HIJOS -10 AÑOS</th>
                <th width="9%">PROFESION</th>
                <th width="7%">TRABAJA</th>
                <th width="7%">JEFE DE FAMILIA</th>
                <th width="8%">PATOLOGIA</th>
                <th width="8%">VIVIENDA PROPIA</th>
                <th width="8%">DIRECCION</th>
                <th width="8%">FECHA</th>
            </tr>
        </thead>
</table> 
';
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    include_once('conexion.php');

    $consulta = "SELECT
u.cedula,
u.nombre,
u.apellido,
u.telefono,
c.cantHijos,
c.hijos10,
c.profesion,
c.trabaja,
c.jefeFamilia,
c.patologia,
c.viviendaPropia,
c.direccion,
c.fecha 
FROM
usuarios AS u
INNER JOIN censo AS c ON u.cedula = c.cedula";

    $resultado = mysqli_query($con, $consulta);


    while ($row = mysqli_fetch_array($resultado)) {
        $item += 1;
        $id = $row['cedula'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $tlf = $row['telefono'];
        $hijos = $row['cantHijos'];
        $hijos10 = $row['hijos10'];
        $profesion = $row['profesion'];
        $trabaja = $row['trabaja'];
        $jefe = $row['jefeFamilia'];
        $patologia = $row['patologia'];
        $vivienda = $row['viviendaPropia'];
        $direccion = $row['direccion'];
        $fecha = $row['fecha'];


        $html2 = '
    <table class="table">
            <tr align="center">
                    <td width="2%">' . $item . '</td>
                    <td width="7%">' . $id . '</td>
                    <td width="8%">' . $nombre . '</td>
                    <td width="8%">' . $apellido . '</td>
                    <td width="8%">' . $tlf . ' </td>
                    <td width="6%">' . $hijos . ' </td>
                    <td width="6%">' . $hijos10 . ' </td>
                    <td width="9%">' . $profesion . ' </td>
                    <td width="7%">' . $trabaja . ' </td>
                    <td width="7%">' . $jefe . ' </td>
                    <td width="8%">' . $patologia . ' </td>
                    <td width="8%">' . $vivienda . ' </td>
                    <td width="8%">' . $direccion . ' </td>
                    <td width="8%">' . $fecha . ' </td>
            </tr>
    </table
                    ';
                    // output the HTML content
$pdf->writeHTML($html2, true, false, true, false, '');
    }
} else {
    $txt1 = '
<table style="width: 100% !important;" cellpadding="2">
<thead>
<tr align="right">
<th><b>Fecha de Censo: ' . $fechaCenso . '</b></th>
</tr>
</thead>
</table>
<hr>
';
    $pdf->writeHTML($txt1, true, false, true, false, '');
    $html = '
<table class="table" border="1" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="3%">N°</th>
                <th width="7%">CEDULA</th>
                <th width="10%">NOMBRE</th>
                <th width="10%">APELLIDO</th>
                <th width="8%">TELEFONO</th>
                <th width="6%">HIJOS</th>
                <th width="9%">PROFESION</th>
                <th width="8%">TRABAJA</th>
                <th width="7%">JEFE DE FAMILIA</th>
                <th width="8%">VIVIENDA PROPIA</th>
                <th width="24%">DIRECCION</th>
            </tr>
        </thead>
</table> 
';
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    include_once('conexion.php');

    $consulta = "SELECT
u.cedula,
u.nombre,
u.apellido,
u.telefono,
c.cantHijos,
c.profesion,
c.trabaja,
c.jefeFamilia,
c.viviendaPropia,
c.direccion,
c.fecha 
FROM
usuarios AS u
INNER JOIN censo AS c ON u.cedula = c.cedula WHERE c.cedula = '$cedula'";


    $result = mysqli_query($con, $consulta);
    $contador = mysqli_num_rows($result);

    if ($contador <= 0) {
        $txt2 = '
        <table style="width: 100% !important;" cellpadding="2">
        <thead>
        <tr align="center">
        <th><b><h2> No Hay Registros de esta Fecha </h2></b></th>
        </tr>
        </thead>
        </table>
        <hr>
        ';
        $pdf->writeHTML($txt2, true, false, true, false, '');
       
    }

    $resultado = mysqli_query($con, $consulta);


    while ($row = mysqli_fetch_array($resultado)) {
        $item += 1;
        $id = $row['cedula'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $tlf = $row['telefono'];
        $hijos = $row['cantHijos'];
        $profesion = $row['profesion'];
        $trabaja = $row['trabaja'];
        $jefe = $row['jefeFamilia'];
        $vivienda = $row['viviendaPropia'];
        $direccion = $row['direccion'];
        $fecha = $row['fecha'];


        $html2 = '
    <table class="table">
        <tr align="center">
            <td width="3%">' . $item . '</td>
            <td width="7%">' . $id . '</td>
            <td width="10%">' . $nombre . '</td>
            <td width="10%">' . $apellido . '</td>
            <td width="8%">' . $tlf . ' </td>
            <td width="6%">' . $hijos . ' </td>
            <td width="9%">' . $profesion . ' </td>
            <td width="8%">' . $trabaja . ' </td>
            <td width="7%">' . $jefe . ' </td>
            <td width="8%">' . $vivienda . ' </td>
            <td width="24%">' . $direccion . ' </td>
        </tr>
    </table
            ';
            $pdf->writeHTML($html2, true, false, true, false, '');
    }
}

mysqli_free_result($resultado);
mysqli_close($con);



// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output($PDF_HEADER_TITLE . '.pdf', 'I');
                
                //============================================================+
// END OF FILE
//============================================================+
