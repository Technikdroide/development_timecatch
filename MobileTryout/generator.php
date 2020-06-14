<?php

require_once "/var/customers/webs/ni205498_1/timecatch/MobileTryout/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\BaseReader;

$nameInput = $_POST['nameInput'];
$pidInput = $_POST['pidInput'];
$workerPlace = $_POST['workerPlace'];
$departFrom= $_POST['departFrom'];
$arrivalTo= $_POST['arrivalTo'];
$travelKindInput = $_POST['travelKindInput'];
$travelChoiceInput = $_POST['travelChoiceInput'];
$departInput = $_POST['departInput'];
$departDateForm = DateTime::createFromFormat('d.m.Y', $departInput);
$departTimeInput = $_POST['departTimeInput'];
$arrivalInput = $_POST['arrivalInput'];
$arrivalDateForm = DateTime::createFromFormat('d.m.Y', $arrivalInput);
$arrivalTimeInput = $_POST['arrivalTimeInput'];
$ticketCostInput = $_POST['ticketCostInput'];
$fileNameInput = $_POST['fileNameInput'];
$kostenstelleInput = $_POST['kostenstelleInput'];



$reader = IOFactory::createReaderForFile("rka_form_final.xlsx");
$reader->setReadDataOnly(false);
$spreadsheet = $reader->load("rka_form_final.xlsx");

$worksheet = $spreadsheet->getActiveSheet();

/** Iterate needed cells in $worksheet and change their values **/
$spreadsheet->getActiveSheet()->setCellValue('B3', 'ISTOS GmbH');
$spreadsheet->getActiveSheet()->setCellValue('I3', $workerPlace);
$spreadsheet->getActiveSheet()->setCellValue('C7', $nameInput);
$spreadsheet->getActiveSheet()->setCellValue('C8', $pidInput);
$spreadsheet->getActiveSheet()->setCellValue('C9', $kostenstelleInput);
$spreadsheet->getActiveSheet()->setCellValue('C10', "$departFrom -> $arrivalTo");
$spreadsheet->getActiveSheet()->setCellValue('J7', $departInput);
$spreadsheet->getActiveSheet()->setCellValue('J8', $arrivalInput);
$spreadsheet->getActiveSheet()->setCellValue('J9', $travelKindInput);


$spreadsheet->getActiveSheet()->setCellValue('B30', $departFrom);
$spreadsheet->getActiveSheet()->setCellValue('H30', $departInput);
$spreadsheet->getActiveSheet()->setCellValue('M30', $departTimeInput);

$spreadsheet->getActiveSheet()->setCellValue('B31', $arrivalTo);
$spreadsheet->getActiveSheet()->setCellValue('H31', $arrivalInput);
$spreadsheet->getActiveSheet()->setCellValue('M31', $arrivalTimeInput);

$spreadsheet->getActiveSheet()->setCellValue('H34', $ticketCostInput);
$spreadsheet->getActiveSheet()->setCellValue('P34', "=(N34-(N34/1.19))");

$spreadsheet->getActiveSheet()->setCellValue('K34', '1');

$spreadsheet->getActiveSheet()->setCellValue('N75', "=SUM(N34:N37)+SUM(N41:N47)+SUM(N52:N61)+SUM(N65:N71)");


$diff = abs(strtotime($arrivalInput) - strtotime($departInput));


$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

if($days == 0){
  $spreadsheet->getActiveSheet()->setCellValue('F41', '1');
} elseif($days <= 2){
  $spreadsheet->getActiveSheet()->setCellValue('F41', '1');
  $spreadsheet->getActiveSheet()->setCellValue('F43', '1');
} elseif($days > 2){
  $spreadsheet->getActiveSheet()->setCellValue('F41', '1');
  $spreadsheet->getActiveSheet()->setCellValue('F42', $days-2);
  $spreadsheet->getActiveSheet()->setCellValue('F43', '1');
}


$writer = IOFactory::createWriter($spreadsheet, "Xlsx");
$writer->setPreCalculateFormulas(false);
$writer->save("$fileNameInput.xlsx");


$file = "$fileNameInput.xlsx";
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);

}
