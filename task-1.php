<?php

require "vendor/autoload.php";

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = K_PATH_IMAGES.'step.jpg';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stephanie Basilio');
$pdf->SetTitle('Task #1 - Display Personal Information');
$pdf->SetSubject('TCPDF Generating PDF Files');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('times', '', 40);

// add a page
$pdf->AddPage();

// Print a text
$html = '<span style="background-color:#b2d8d8;color:#004c4c;">&nbsp; Student Information&nbsp;</span>
<p stroke = "0.2" fill="true" strokecolor="#b2d8d8" color="#004c4c" style="font-family:sans-serif;font-weight:bold;font-size:24pt;">
Full Name: Stephanie Diaz Basilio <br>Program: College of Computer Studies - Information Technology<br>Email: basilio.stephanie@auf.edu.ph<br>Address: Balibago, Angeles City, Pampanga<br>Student Number: 18-0515-388 </p>';
$pdf->writeHTML($html, true, false, true, false, '');


//Close and output PDF document
$pdf->Output('task-1.pdf', 'I');

