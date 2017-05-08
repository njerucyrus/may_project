<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 11:53 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\PatientVisitInterface;
use Hudutech\Entity\PatientVisit;

class PatientVisitController implements PatientVisitInterface
{
    public function create(PatientVisit $patientVisit)
    {
        // TODO: Implement create() method.
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