<?php
require('../FPDF_library/fpdf.php');
session_start();

//Session data
$lastTicketID = $_SESSION['lastTicketID'];
$seatCount = $_SESSION['seatCount'];
$totalTicketPrice = $_SESSION['totalTicketPrice'];
$showID = $_SESSION['selectedShowID'];
$movieName = $_SESSION['movieName'];

$playTime = $_SESSION['playTime'];
$date = new DateTime($playTime);
$localDate = $date->format('d.m.Y');
$localTime = $date->format('H:i');

$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = "Best Movie Kolektion - Cinema";
$reportNameYPos = 160;
$logoFile = "../FPDF_library/BMKLogo.png";
$barcodeFile = "../FPDF_library/barcode.png";
$logoXPos = 5;
$logoYPos = 0;
$logoWidth = 25;
$columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
$rowLabels = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Product";
$chartYLabel = "2009 Sales";
$chartYStep = 20000;

$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );

$data = array(
          array( 9940, 10100, 9490, 11730 ),
          array( 19310, 21140, 20560, 22590 ),
          array( 25110, 26260, 25210, 28370 ),
          array( 27650, 24550, 30040, 31980 ),
        );

$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 17 );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', 'B', 20 );
$pdf->Write( 19, "Ticket Confirmation" );
$pdf->Ln( 16 );

$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "This is a confirmation and a Digital Ticket for the movie " );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "$movieName " );

$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "taking place " );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "$localDate " );

$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "at " );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "$localTime " );

$pdf->Ln( 12 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "You have paid " );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "$totalTicketPrice EUR " );

$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "for " );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "$seatCount " );

$pdf->Write( 6, "seats" );

$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, "." );

$pdf->Ln( 12 );
$pdf->Write( 6, "Show this barcode at event enterance!" );
$pdf->Image( $barcodeFile, '15', 80, 75 );

$pdf->Output( "ticket.pdf", "I" );

?>

