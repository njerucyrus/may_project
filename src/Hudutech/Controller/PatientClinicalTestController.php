<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/22/17
 * Time: 7:57 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\PatientClinicalTestInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\PatientClinicalTest;

class PatientClinicalTestController implements PatientClinicalTestInterface
{
    public function create(PatientClinicalTest $patientClinicalTest)
    {
        $db = new DB();
        $conn = $db->connect();

        $clinicianId = $patientClinicalTest->getClinicianId();
        $patientId = $patientClinicalTest->getPatientId();
        $testId = $patientClinicalTest->getTestId();
        $testResult = $patientClinicalTest->getTestResult();
        $description = $patientClinicalTest->getDescription();

        try {

            $sql = "UPDATE  patient_clinical_tests SET
                                                        clinician_id=:clinician_id,
                                                        patient_id=: patient_id,
                                                        test_id=:test_id,
                                                        test_result=:test_result,
                                                        description=:description  
                                                  WHERE id=:id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":clinician_id", $clinicianId);
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":test_id", $testId);
            $stmt->bindParam(":test_result", $testResult);
            $stmt->bindParam(":description", $description);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(PatientClinicalTest $patientClinicalTest, $id)
    {
        $db = new DB();
        $conn = $db->connect();

        $clinicianId = $patientClinicalTest->getClinicianId();
        $description = $patientClinicalTest->getDescription();
        $testResult = $patientClinicalTest->getTestResult();
        $date = $patientClinicalTest->getDate();

        try {
            $sql = "UPDATE patient_clinical_tests SET clinician_id=:clinician_id,
                                                      description=:description,
                                                      test_result=:test_result,
                                                      date=:date";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":clinician_id", $clinicianId);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":test_result", $testResult);
            $stmt->bindParam(":date", $date);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }


    }

    public static function delete($id)
    {
       $db = new DB();
       $conn = $db->connect();

       try{

           $stmt = $conn->prepare("DELETE FROM patient_clinical_tests WHERE id=:id");
           $stmt->bindParam(":id", $id);
           return $stmt->execute() ? true : false;

       } catch (\PDOException $exception) {
           echo $exception->getMessage();
           return false;
       }
    }

    public static function destroy()
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $stmt = $conn->prepare("DELETE FROM patient_clinical_tests WHERE id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }

    public static function showClinicalTests($patientId, $date)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $sql = "SELECT * FROM patient_clinical_tests WHERE patient_id=:patient_id AND date=:date";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":date", $date);
            $tests = array();
            if($stmt->execute()){
                $tests = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
            return $tests;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

}