<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/22/17
 * Time: 12:17 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ClinicalNoteInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\ClinicalNote;

class ClinicalNoteController implements ClinicalNoteInterface
{
    public function create(ClinicalNote $clinicalNote)
    {
        $db = new DB();
        $conn = $db->connect();

        $patientId = $clinicalNote->getPatientId();
        $complaint = $clinicalNote->getComplaint();
        $complaintHistory = $clinicalNote->getComplaintHistory();
        $familySocialHistory = $clinicalNote->getFamilySocialHistory();
        $physicalExamination = $clinicalNote->getPhysicalExamination();
        $date = $clinicalNote->getDate();

        try{

            $sql = "INSERT INTO clinical_notes(
                                                patient_id,
                                                complaint,
                                                complaint_history,
                                                family_social_history,
                                                physical_examination,
                                                date
                                              )
                                     VALUES
                                            (
                                                :patient_id,
                                                :complaint,
                                                :complaint_history,
                                                :family_social_history,
                                                :physical_examination,
                                                :date
                                            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":complaint", $complaint);
            $stmt->bindParam(":complaint_history", $complaintHistory);
            $stmt->bindParam(":family_social_history", $familySocialHistory);
            $stmt->bindParam(":physical_examination", $physicalExamination);
            $stmt->bindParam(":date", $date);

            return $stmt->execute() ? true : false;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;

        }

    }

    public function update(ClinicalNote $clinicalNote, $id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getByPatientId($patientId)
    {
        // TODO: Implement getByPatientId() method.
    }

}