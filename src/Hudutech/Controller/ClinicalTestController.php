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
        $db = new DB();
        $conn= $db->connect();
        $testName = $clinicalTest->getTestName();
        $cost = $clinicalTest->getCost();

        try{
            $sql = "UPDATE clinical_tests SET test_name=:test_name, cost=:cost WHERE id=:id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":test_name", $testName);
            $stmt->bindParam(":cost", $cost);
            return $stmt->execute() ? true : false;

        }catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }

    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("DELETE FROM clinical_tests WHERE id=:id");
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
        try{
            $stmt = $conn->prepare("DELETE FROM clinical_tests ");
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
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