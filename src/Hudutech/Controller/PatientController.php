<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/21/17
 * Time: 7:48 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\PatientInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Patient;

class PatientController implements PatientInterface
{
    public function create(Patient $patient)
    {
        $db = new DB();
        $conn = $db->connect();

        $patientNo = $patient->getPatientNo();
        $sirName = $patient->getSirName();
        $idNo = $patient->getIdNo();
        $firstName = $patient->getFirstName();
        $otherName = $patient->getOtherName();
        $maritalStatus = $patient->getMaritalStatus();
        $phoneNumber = $patient->getPhoneNumber();
        $occupation = $patient->getOccupation();
        $patientType = $patient->getPatientType();
        $sex = $patient->getSex();


        try {

            $stmt = $conn->prepare("INSERT INTO patients(
                                                            patient_no,
                                                            id_no,
                                                            sir_name,
                                                            first_name, 
                                                            marital_status,
                                                            phone_number,
                                                            occupation,
                                                            patient_type,
                                                            sex, 
                                                            other_name
                                                        )  
                                                VALUES (
                                                            :patient_no,
                                                            :id_no,
                                                            :sir_name,
                                                            :first_name,
                                                            :other_name,
                                                            :marital_status,
                                                            :phone_number,
                                                            :occupation,
                                                            :patient_type,
                                                            :sex 
                                                        ) ");
            $stmt->bindParam(":patient_no", $patientNo);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":sir_name", $sirName);
            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":other_name", $otherName);
            $stmt->bindParam(":marital_status", $maritalStatus);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":patient_type", $patientType);
            $stmt->bindParam(":sex", $sex);
            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;

        }

    }

    public function update(Patient $patient, $id)
    {
        $db = new DB();
        $conn = $db->connect();

        $patientNo = $patient->getPatientNo();
        $sirName = $patient->getSirName();
        $idNo = $patient->getIdNo();
        $firstName = $patient->getFirstName();
        $otherName = $patient->getOtherName();
        $maritalStatus = $patient->getMaritalStatus();
        $phoneNumber = $patient->getPhoneNumber();
        $occupation = $patient->getOccupation();
        $patientType = $patient->getPatientType();
        $sex = $patient->getSex();

        try {

            $stmt = $conn->prepare("UPDATE patients SET
                                                        patient_no=:patient_no,
                                                        id_no=:id_no,
                                                        sir_name=:sir_name,
                                                        first_name=:first_name, 
                                                        marital_status=:marital_status,
                                                        phone_number=:phone_number,
                                                        occupation=:occupation,
                                                        patient_type=:patient_type,
                                                        sex=:sex, 
                                                        other_name=:other_name
                                                     WHERE id=:id
                                                     ");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":patient_no", $patientNo);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":sir_name", $sirName);
            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":other_name", $otherName);
            $stmt->bindParam(":marital_status", $maritalStatus);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":occupation", $occupation);
            $stmt->bindParam(":patient_type", $patientType);
            $stmt->bindParam(":sex", $sex);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            return false;
        }
    }

    public static function delete($id)
    {

        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("DELETE FROM patients WHERE id=:id");
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

        try {
            $stmt = $conn->prepare("DELETE FROM patients");
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT * FROM patients WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $patient = array();
            if ($stmt->rowCount() == 1) {
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    array_push($patient, array(
                        "id" => $row['id'],
                        "patient_no" => $row['patient_no'],
                        "id_no" => $row['id_no'],
                        "sir_name" => $row['sir_name'],
                        "first_name" => $row['first_name'],
                        "other_name" => $row['other_name'],
                        "marital_status" => $row['marital_status'],
                        "phone_number" => $row['phone_number'],
                        "occupation" => $row['occupation'],
                        "patient_type" => $row['patient_type'],
                        "sex" => $row['sex']
                    ));
                }
            }

            $db->closeConnection();
            return $patient;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}