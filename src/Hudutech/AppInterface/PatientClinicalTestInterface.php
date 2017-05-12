<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/22/17
 * Time: 7:54 PM
 */

namespace Hudutech\AppInterface;

use Hudutech\Entity\PatientClinicalTest;

interface PatientClinicalTestInterface
{
    public function create(PatientClinicalTest $patientClinicalTest);
    public function update(PatientClinicalTest $patientClinicalTest, $id);
    public static function delete($id);
    public static function destroy();
    public static function showClinicalTests($patientId, $date);
    public static function getClinicalTestTotalCost($patientId, $date);
    public static function getObject($id);
}