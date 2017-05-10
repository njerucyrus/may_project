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
        $isPerformed = $patientClinicalTest->isPerformed();

        try {

            $sql = "INSERT INTO patient_clinical_tests(
                                                        clinicianId,
                                                        patientId,
                                                        testId,
                                                        testResult,
                                                        description,
                                                        isPerformed)
                                                  VALUES
                                                   (
                                                        :clinicianId,
                                                        :patientId,
                                                        :testId,
                                                        :testResult,
                                                        :description,
                                                        :is_perfomed
                                                    )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":clinicianId", $clinicianId);
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":testId", $testId);
            $stmt->bindParam(":testResult", $testResult);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":isPerformed", $isPerformed);
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
        $isPerformed = $patientClinicalTest->isPerformed();

        try {
            $sql = "UPDATE patient_clinical_tests SET clinicianId=:clinicianId,
                                                      description=:description,
                                                      testResult=:testResult,
                                                      date=:date,
                                                      isPerformed=:is_parfomed
                                                      ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":clinicianId", $clinicianId);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":testResult", $testResult);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":isPerformed", $isPerformed);
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

            $stmt = $conn->prepare("DELETE FROM patient_clinical_tests");
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
            $sql = "SELECT DISTINCT ct.* FROM patient_clinical_tests pt, clinical_tests ct
                    INNER JOIN patient_clinical_tests pct ON pct.testId = ct.id
                    WHERE pt.patientId=:patientId AND 
                    date(`pt`.`date`)=:date AND
                    pct.id=ct.id ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":patientId", $patientId);
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