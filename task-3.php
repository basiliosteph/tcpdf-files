<?php

require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stephanie Basilio');
$pdf->SetTitle('Task #3 - Display Novel Chapters');
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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('courierB', '', 12);

// add a page
$pdf->AddPage();

// get esternal file content
$chapter1 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-1.txt', false);
$chapter2 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-2.txt', false);
$chapter3 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-3.txt', false);
$chapter4 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-4.txt', false);
$chapter5 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-5.txt', false);
$chapter6 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-6.txt', false);
$chapter7 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-7.txt', false);
$chapter8 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-8.txt', false);
$chapter9 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-9.txt', false);
$chapter10 = file_get_contents('vendor/tecnickcom/tcpdf/examples/data/chapter-10.txt', false);


// set color for text
$pdf->SetTextColor(205, 133, 0);

//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

// write the text
$pdf->Write(3, $chapter1, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter2, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter3, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter4, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter5, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter6, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter7, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter8, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter9, '', 0, '', false, 0, false, false, 0);
$pdf->Write(3, $chapter10, '', 0, '', false, 0, false, false, 0);

//Close and output PDF document
$pdf->Output('task-3.pdf', 'I');
