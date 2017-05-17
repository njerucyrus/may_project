<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/05/2017
 * Time: 08:55
 */
$success_msg = "";
$error_msg = "";


if (!empty($_POST['patientId']) and !empty($_POST['fullName']) and !empty($_POST['sex']) and !empty($_POST['age'])) {

    $patient = new \Hudutech\Entity\Patient();
    $patient->setPatientNo($_POST['patientId']);
    $patient->setIdNo(null);
    $patient->setSurName($_POST['fullName']);
    $patient->setFirstName(null);
    $patient->setOtherName(null);
    $patient->setMaritalStatus(null);
    $patient->setPhoneNumber($_POST['phoneNumber']);
    $patient->setOccupation(null);
    $patient->setPatientType($_POST['patientType']);
    $patient->setSex($_POST['sex']);
    $patient->setAge($_POST['age']);

    $patientController = new \Hudutech\Controller\PatientController();
    if ($patientController->create($patient)) {
        $success_msg .= "Patient  Registered successfully";
    } else {
        $error_msg .= 'error saving user, please try again ';
    }
} else {

    $error_msg .= 'All fields required';
}
