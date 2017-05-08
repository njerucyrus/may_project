<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 11:53 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\PatientVisitInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\PatientVisit;

class PatientVisitController implements PatientVisitInterface
{
    public function create(PatientVisit $patientVisit)
    {
        $db = new DB();
        $conn = $db->connect();
        $patientId = $patientVisit->getPatientId();
        $status = $patientVisit->getStatus();

        try {
            $stmt = $conn->prepare("INSERT INTO patient_visits(patientId, status)
                                    VALUES (:patientId, :status)");
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":status", $status);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception){
            echo $exception->getMessage();
            return false;
        }
     }

    public function update(PatientVisit $patientVisit, $id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($patientId)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getId($patientId)
    {
        // TODO: Implement getId() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

    public static function markAsLeft($patientId)
    {
        // TODO: Implement markAsLeft() method.
    }

}