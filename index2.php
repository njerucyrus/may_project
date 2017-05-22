<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/21/17
 * Time: 11:15 PM
 */
session_start();
require_once __DIR__.'/vendor/autoload.php';

require_once __DIR__.'/public/assets/report/fpdf.php';


$pdf = new FPDF();
$pdf->AddPage();
       // Set font for report subject (new page)
$pdf->SetY(0);
$pdf->SetX(50);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Sales Receipt',0);

// Set font for column headings (new page)
        $pdf->SetY(10);
        $pdf->SetX(20);
        $pdf->Cell(95,6,'Item Name','B',0,'L',0);
        $pdf->Cell(30,6,'Qty','B',0,'L',0);
        $pdf->Cell(30,6,'Unit Price','B',0,'L',0);
        $pdf->Cell(15,6,'Amount','B',0,'L',0);

        //Go to next row
        $y_axis =0;


    $item_name ="panadol";
    $qty ="24";
    $unit_price ="100";
    $amount = "50";

    $pdf->SetY(10);
    $pdf->SetX(20);
    $pdf->Cell(95,42,$item_name,0,0,'L',0);
    $pdf->Cell(30,42,$qty,0,0,'L',0);
    $pdf->Cell(30,42,$unit_price,0,0,'L',0);
    $pdf->Cell(15,42,$amount,0,0,'L',0);

    $staff = "sam";
    $date = "19-5-2017";
    $receipt_no ="23543423";
    $gTotal="230";

    $pdf->SetXY(20,65);

    $pdf->Cell(30,5,'Date:',0,0,'C',0);
    $pdf->Cell(75,5,$date,0,0,'L',0);

    $pdf->Cell(30,5,'Operator:',0,0,'C',0);
    $pdf->Cell(55,5,$staff,0,0,'L',0);

    $pdf->Cell(30,5,'Receipt No:',0,0,'C',0);
    $pdf->Cell(45,5,$receipt_no,0,0,'L',0);

    $pdf->SetXY(100,90);
    $pdf->Cell(50,92,'Gross Total',0,0,'L',0);
     $pdf->Cell(65,92,$gTotal,0,0,'L',0);

    $pdf->SetY($y_axis);
    $pdf->SetX(50);




//Send file
$pdf->Output();










//echo date('Y-m-d');
//$loggedInAs = \Hudutech\Controller\UserController::getLoggedInUser('admin');
//echo $loggedInAs;
//$ctrl = new \Hudutech\Controller\PatientController();
//$patient  = new \Hudutech\Entity\Patient();
//
//$patient->setPatientId(rand(0, 1000));
//$patient->setIdNo(373833);
//$patient->setSirName("NJIIRI");
//$patient->setFirstName("JOHN");
//$patient->setOtherName("KIMEMIA");
//$patient->setMaritalStatus("single");
//$patient->setPhoneNumber("0783383939");
//$patient->setOccupation("FARMER");
//$patient->setPatientType("out_patient");
//$patient->setSex("M");

 //$ctrl->create($patient);

//print_r(\Hudutech\Controller\PatientController::all());

//$ctrl = \Hudutech\Controller\PatientClinicalTestController::destroy();
//
//print_r($ctrl);

//$ctrl = \Hudutech\Controller\PatientVisitController::all();
//print_r($ctrl);

//echo \Hudutech\Controller\PatientController::getPatientId(48494)['id'];

//$today = date('Y-m-d');
//$patientTests = \Hudutech\Controller\PatientClinicalTestController::showClinicalTests(5, $today);
//print_r($patientTests);

//$patientId = \Hudutech\Controller\PatientController::getPatientId('4844')['id'];
//print_r($patientId);

//$queuePatients= \Hudutech\Controller\PatientController::showInQueue();
//print_r(json_encode($queuePatients));


//$product = new \Hudutech\Entity\ProductInventory();
//$product->setBatchNo(1234);
//$product->setInvoiceNo(345667);
//$product->setProductName("Sugar");
//$product->setQtyReceived(42);
//$product->setPurchaseDate(date('Y-m-d'));
//$product->setSupplier('hudutech');
//$product->setSalePrice(56);
//$product->setPurchasePrice(30);
//$product->setExpiryDate(date('Y-m-d'));
//
//$inventoryCtrl = new \Hudutech\Controller\ProductInventoryController();
//$created = $inventoryCtrl->create($product);
//if ($created) {
//    echo "worked";
//} else{
//    echo "didnt work";
//}

//$queuePatients= \Hudutech\Controller\PatientController::showInQueue();
//print_r($queuePatients);
//echo date('Y-m-d');

//$prescriptions = \Hudutech\Controller\DrugPrescriptionController::getPrescriptions(2836);
//print_r($prescriptions);

//$cart = \Hudutech\Controller\SalesController::showCartItems($_SESSION['receiptNo']);
//
//print_r($cart);
//$checked = \Hudutech\Controller\SalesController::checkout($cart);

//$receipt = \Hudutech\Controller\SalesController::createReceipt($cart[0]['patientId'], $cart[0]['receiptNo']);

$user = \Hudutech\Controller\UserController::getLoggedInUser('njeru');
print_r($user);