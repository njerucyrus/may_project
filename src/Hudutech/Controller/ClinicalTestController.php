<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 4/22/17
 * Time: 2:27 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ClinicalTestInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\ClinicalTest;

class ClinicalTestController implements ClinicalTestInterface
{
    public function create(ClinicalTest $clinicalTest)
    {
        $db = new DB();
        $conn= $db->connect();
        $testName = $clinicalTest->getTestName();
        $cost = $clinicalTest->getCost();

        try{
            $sql = "INSERT INTO clinical_tests (test_name, cost) VALUES (:test_name, :cost)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":test_name", $testName);
            $stmt->bindParam(":cost", $cost);
            return $stmt->execute() ? true : false;

        }catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }


    }

    public function update(ClinicalTest $clinicalTest, $id)
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

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function getClinicalTestObject($id)
    {
        // TODO: Implement getClinicalTestObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}