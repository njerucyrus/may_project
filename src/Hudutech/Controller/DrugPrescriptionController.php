<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/8/17
 * Time: 3:52 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\DrugPrescriptionInterface;
use Hudutech\Entity\DrugPrescription;

class DrugPrescriptionController implements DrugPrescriptionInterface
{
    public function create(DrugPrescription $drugPrescription)
    {
        // TODO: Implement create() method.
    }

    public function update(DrugPrescription $drugPrescription, $id)
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

    public static function getAllPrescriptions($patientId)
    {
        // TODO: Implement getAllPrescriptions() method.
    }

    public static function markIssued($id)
    {
        // TODO: Implement markIssued() method.
    }


}