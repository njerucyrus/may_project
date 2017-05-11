<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/21/17
 * Time: 11:15 PM
 */

require_once __DIR__.'/vendor/autoload.php';

//$ctrl = new \Hudutech\Controller\PatientController();
//$patient  = new \Hudutech\Entity\Patient();
//
//$patient->setPatientNo(rand(0, 1000));
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

$today = date('Y-m-d');
$patientTests = \Hudutech\Controller\PatientClinicalTestController::showClinicalTests(5, $today);
print_r($patientTests);