<?php

require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stephanie Basilio');
$pdf->SetTitle('Task #5 - Display Favorite Quotes');
$pdf->SetSubject('TCPDF Generating PDF Files');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set default font subsetting mode
$pdf->setFontSubsetting(false);

$pdf->SetFont('times', 'B', 20);

$pdf->Write(0, 'My Favorite Quotes', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('dejavusans', 'B', 15);

$pdf->MultiCell(80, 0, "Id rather bend than break. - EXO Kai\n", 1, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(2);

$pdf->SetFont('cid0jp', 'B', 15);

$pdf->MultiCell(80, 0, "Being bad at something is the first step to becoming better. - Issa\n", 1, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(2);

$pdf->SetFont('courier', 'B', 15);

$pdf->MultiCell(80, 0, "It is during our darkest moments that we must focus to see the light. - Aristotle\n", 1, 'J', 0, 1, '', '', true, 0);

$pdf->Output('task-5.pdf', 'I');

