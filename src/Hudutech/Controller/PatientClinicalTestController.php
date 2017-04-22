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

            $sql = "INSERT INTO patient_clinical_tests(
                                                        clinician_id,
                                                        patient_id,
                                                        test_id,
                                                        test_result,
                                                        description
                                                      ) 
                                                VALUES
                                                 (
                                                        :clinician_id,
                                                        :patient_id,
                                                        :test_id,
                                                        :test_result,
                                                        :description
                                                 )";

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
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
    }

    public static function showClinicalTests($patientId, $date)
    {
    }

}