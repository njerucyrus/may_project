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
    /**
     * @param ClinicalNote $clinicalNote
     * @return bool
     */
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

    /**
     * @param ClinicalNote $clinicalNote
     * @param $id
     * @return bool
     */
    public function update(ClinicalNote $clinicalNote, $id)
    {
        $db = new DB();
        $conn = $db->connect();

        $patientId = $clinicalNote->getPatientId();
        $complaint = $clinicalNote->getComplaint();
        $complaintHistory = $clinicalNote->getComplaintHistory();
        $familySocialHistory = $clinicalNote->getFamilySocialHistory();
        $physicalExamination = $clinicalNote->getPhysicalExamination();

        try {
            $sql = "UPDATE clinical_notes SET
                                         patient_id=:patient_id,
                                         complaint=:complaint,
                                         complaint_history=:complaint_history,
                                         family_social_history=:family_social_history,
                                         physical_examination=:physical_examination";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":complaint", $complaint);
            $stmt->bindParam(":complaint_history", $complaintHistory);
            $stmt->bindParam(":family_social_history", $familySocialHistory);
            $stmt->bindParam(":physical_examination", $physicalExamination);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try {
            $stmt = $conn->prepare("DELETE FROM clinical_notes WHERE id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() ? true : false;
        }  catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    /**
     * @return bool
     */
    public static function destroy()
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("DELETE FROM clinical_notes");
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    /**
     * @param $patientId
     * @return array
     */
    public static function getAllClinicalNoteByPatientId($patientId)
    {
       $db = new DB();
       $conn = $db->connect();

       try{
           $stmt = $conn->prepare("SELECT * FROM clinical_notes WHERE patient_id=:patient_id");
           $stmt->bindParam(":patient_id", $patientId);
           $stmt->execute();
           $notes = array();
           if ($stmt->rowCount() > 0) {
               while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                   $note = array(
                      "id"=>$row['id'],
                       "patient_id" =>$row['patient_id'],
                       "complaint" => $row['complaint'],
                       "complaint_history"=>$row['complaint_history'],
                       "family_social_history"=>$row['family_social_history'],
                       "physical_examination"=>$row['physical_examination'],
                       "date"=>$row['date']
                   );
                   $notes[] = $note;
               }
           }
           return $notes;

       } catch (\PDOException $exception) {
           echo $exception->getMessage();
           return [];
       }
    }

    /**
     * @param $patientId
     * @param $date
     * @return array
     */
    public static function getClinicalNoteByDate($patientId, $date)
    {

        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT * FROM clinical_notes WHERE patient_id=:patient_id AND date=:date");
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":date", $date);
            $stmt->execute();
            $notes = array();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $notes = array(
                        "id"=>$row['id'],
                        "patient_id" =>$row['patient_id'],
                        "complaint" => $row['complaint'],
                        "complaint_history"=>$row['complaint_history'],
                        "family_social_history"=>$row['family_social_history'],
                        "physical_examination"=>$row['physical_examination'],
                        "date"=>$row['date']
                    );

                }
            }
            return $notes;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    /**
     * @param $patientId
     * @param $date
     * @return ClinicalNote|null
     * use this method to get the instance of the ClinicalNote entity that
     * has the current values set for the database. set new attributes
     * which you want to update.
     * this makes work easier when updating.
     */
    public static function getObject($patientId, $date)
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT * FROM clinical_notes WHERE patient_id=:patient_id AND date=:date");
            $stmt->bindParam(":patient_id", $patientId);
            $stmt->bindParam(":date", $date);
            $stmt->execute();

            $clinicalNote = new ClinicalNote();
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);

                $clinicalNote->setPatientId($row['patient_id']);
                $clinicalNote->setComplaint($row['complaint']);
                $clinicalNote->setComplaintHistory($row['complaint_history']);
                $clinicalNote->setFamilySocialHistory($row['family_social_history']);
                $clinicalNote->setPhysicalExamination($row['physical_examination']);
                $clinicalNote->setDate($row['date']);
            }
            return $clinicalNote;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }


}