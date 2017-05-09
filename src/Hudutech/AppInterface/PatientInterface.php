<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/21/17
 * Time: 7:46 PM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Patient;

interface PatientInterface
{
    /**
     * @param Patient $patient
     * @return boolean
     */
    public function create(Patient $patient);

    /**
     * @param Patient $patient
     * @param $id
     * @return boolean
     */
    public function update(Patient $patient, $id);

    /**
     * @param $id
     * @return boolean
     */
    public static function delete($id);


    /**
     * @return boolean
     * delete all data from patients table
     */
    public static function destroy();

    /**
     * @param $id
     * @return array
     */
    public static function getId($id);

    /**
     * @param $id
     * @return object|null
     */
    public static function getObject($id);

    /**
     * @return array
     */
    public static function all();

    /**
     * @param $id
     * @return boolean
     */
    public static function addToQueue($id);

    /**
     * @return array
     */
    public static function showNotInQueue();

    /**
     * @param $patientNo
     * @return mixed
     */
    public static function getPatientId($patientNo);
}