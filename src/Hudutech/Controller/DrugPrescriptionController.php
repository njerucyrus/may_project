<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 3:52 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\DrugPrescriptionInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\DrugPrescription;

class DrugPrescriptionController implements DrugPrescriptionInterface
{
    public function create(DrugPrescription $drugPrescription)
    {
        $db = new DB();
        $conn = $db->connect();
        $patientId = $drugPrescription->getPatientId();
        $drugName = $drugPrescription->getDrugName();
        $drugType = $drugPrescription->getDrugType();
        $quantity = $drugPrescription->getQuantity();
        $prescription = $drugPrescription->getPrescription();
        $status = $drugPrescription->getStatus();

        try{
            $sql = "INSERT INTO drug_prescriptions(
                                                        patientId,
                                                        drugName, 
                                                        drugType,
                                                        quantity,
                                                        prescription,
                                                        status
                                                  ) 
                                                  VALUES
                                                   (
                                                        :patientId,
                                                        :drugName,
                                                        :drugType,
                                                        :quantity,
                                                        :prescription,
                                                        :status
                                                  )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":drugName",$drugName);
            $stmt->bindParam(":drugType",$drugType);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":prescription", $prescription);
            $stmt->bindParam(":status", $status);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(DrugPrescription $drugPrescription, $id)
    {

        $db = new DB();
        $conn = $db->connect();
        $patientId = $drugPrescription->getPatientId();
        $drugName = $drugPrescription->getDrugName();
        $drugType = $drugPrescription->getDrugType();
        $quantity = $drugPrescription->getQuantity();
        $prescription = $drugPrescription->getPrescription();
        $status = $drugPrescription->getStatus();

        try{
            $sql = "UPDATE drug_prescriptions SET 
                                                patientId=:patientId,
                                                drugName=:drugName, 
                                                drugType=:drugType,
                                                quantity=:quantity,
                                                prescription=:prescription,
                                                status=:status
                                                WHERE id=:id
                                                  ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":drugName",$drugName);
            $stmt->bindParam(":drugType",$drugType);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":prescription", $prescription);
            $stmt->bindParam(":status", $status);
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
            $stmt = $conn->prepare("DELETE FROM drug_prescriptions WHERE id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() ? true : false;
        }catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function destroy()
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("DELETE FROM drug_prescriptions");
            return $stmt->execute() ? true : false;
        }catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function getPrescriptions($patientId)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT * FROM drug_prescriptions WHERE patientId=:patientId");
            $stmt->bindParam(":patientId", $patientId);
            return $stmt->execute() && $stmt->rowCount() > 0 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function markIssued($id)
    {
        // TODO: Implement markIssued() method.
    }


}