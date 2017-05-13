<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 08:55
 */
$success_msg= "";
$error_msg= "";


    if (!empty($_POST['sex'])) {

        $patient = new \Hudutech\Entity\Patient();
        $patient->setPatientNo($_POST['patientNo']);
        $patient->setIdNo($_POST['idNo']);
        $patient->setSurName($_POST['surName']);
        $patient->setFirstName($_POST['firstName']);
        $patient->setOtherName($_POST['otherName']);
        $patient->setMaritalStatus($_POST['maritalStatus']);
        $patient->setPhoneNumber($_POST['phoneNumber']);
        $patient->setOccupation($_POST['occupation']);
        $patient->setPatientType($_POST['patientType']);
        $patient->setSex($_POST['sex']);

        $patientController = new \Hudutech\Controller\PatientController();
        if ($patientController->create($patient)) {
            $success_msg .= "Patient  Registered successfully";
        } else {
            $error_msg .= 'error saving user, please try again ';
        }
    } else {

        $error_msg .= 'All fields required';
    }
