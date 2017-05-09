<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/9/17
 * Time: 7:13 AM
 */

require_once __DIR__.'/../vendor/autoload.php';
$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);

if(!empty($data)) {
    $patient = new \Hudutech\Entity\Patient();

    if( !empty($data['patientNo']) and
        !empty($data['idNo']) and
        !empty($data['surName']) and
        !empty($data['firstName']) and
        !empty($data['maritalStatus']) and
        !empty($data['phoneNumber']) and
        !empty($data['occupation']) and
        !empty($data['patientType']) and
        !empty($data['sex'])){

        $patient->setPatientNo($data['patientNo']);
        $patient->setIdNo($data['idNo']);
        $patient->setSurName($data['surName']);
        $patient->setFirstName($data['firstName']);
        $patient->setOtherName($data['otherName']);
        $patient->setMaritalStatus($data['maritalStatus']);
        $patient->setPhoneNumber($data['phoneNumber']);
        $patient->setOccupation($data['occupation']);
        $patient->setPatientType($data['patientType']);
        $patient->setSex($data['sex']);

        $patientCtrl = new \Hudutech\Controller\PatientController();
        $created = $patientCtrl->create($patient);
        if ($created) {
            //add patient to visit list
            $patientVisit = new \Hudutech\Entity\PatientVisit();
            $patientVisit->setPatientId(\Hudutech\Controller\PatientController::getPatientId($data['patientNo'])['id']);
            $patientVisit->setStatus("active");
            $patientVisitCtrl = new \Hudutech\Controller\PatientVisitController();

            $patientVisitCtrl->create($patientVisit);
            //add the patient to the queue
            \Hudutech\Controller\PatientController::addToQueue(\Hudutech\Controller\PatientController::getPatientId($data['patientNo']['id']));

            print_r(json_encode(array(
                "statusCode"=>200,
                "message"=>"Patient registered successfully and was added to the Queue"
            )));
        }
        else{
          print_r(json_encode(
              array(
                  "statusCode"=>500,
                  "message"=>"error occurred while registering the patient please try again later"
              )
          ));
        }


    } else{
        print_r(json_encode(
            array(
                "statusCode"=>500,
                "message"=>"Error. all fields required"
            )
        ));
    }

}
else{
    print_r(json_encode(
        array(
            "statusCode"=>500,
            "message"=>"no data supplied"
        )
    ));

}