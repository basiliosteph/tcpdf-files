<?php

require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stephanie Basilio');
$pdf->SetTitle('Task #6 - Display Calendar');
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

// set font
$pdf->SetFont('dejavusans', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, '2023 Calendar', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('dejavusans', '', 8);

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="8">Month of January 2023</th>
 </tr>
 <tr nobr="true">
  <td></td>
  <td>Sunday</td>
  <td>Monday</td>
  <td>Tuesday</td>
  <td>Wednesday</td>
  <td>Thursday</td>
  <td>Friday</td>
  <td>Saturday</td>
 </tr>
 <tr nobr="true">
 <td>First<br /><br />Week</td>
  <td><br /></td>
  <td><br /></td>
  <td style="background-color:#F38181;color:white;">1<br />New Year's Day</td>
  <td style="background-color:#00ADB5;color:white;">2<br />(Special Non-Working Day)</td>
  <td><br />3</td>
  <td><br />4</td>
  <td><br />5</td>
 </tr>
 <tr nobr="true">
 <td>Second<br /><br />Week</td>
  <td><br />6</td>
  <td><br />7</td>
  <td><br />8</td>
  <td><br />9</td>
  <td><br />10</td>
  <td><br />11</td>
  <td><br />12</td>
 </tr>
 <tr nobr="true">
 <td>Third<br /><br />Week</td>
  <td><br />13</td>
  <td><br />14</td>
  <td><br />15</td>
  <td><br />16</td>
  <td><br />17</td>
  <td><br />18</td>
  <td><br />19</td>
 </tr>
 <tr nobr="true">
 <td>Fourth<br /><br />Week</td>
  <td><br />20</td>
  <td><br />21</td>
  <td><br />22</td>
  <td><br />23</td>
  <td><br />24</td>
  <td><br />25</td>
  <td><br />26</td>
 </tr>
 <tr nobr="true">
 <td>Fifth<br /><br />Week</td>
  <td><br />27</td>
  <td><br />28</td>
  <td><br />29</td>
  <td><br />30</td>
  <td><br /></td>
  <td><br /></td>
  <td><br /></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Output('task-6.pdf', 'I');

