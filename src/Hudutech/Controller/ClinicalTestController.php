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
        $db = new DB();
        $conn = $db->connect();

        try{

            $stmt = $conn->prepare("SELECT * FROM clinical_tests WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $clinicalTest = array();
            if ($stmt->rowCount() == 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $clinicalTest = array(
                    "id"=>$row['id'],
                    "test_name"=>$row['test_name'],
                    "cost"=>$row['cost']
                );
            }
            return $clinicalTest;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function getObject($id)
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $stmt = $conn->prepare("SELECT * FROM clinical_tests WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $clinicalTest = new ClinicalTest();
            if ($stmt->rowCount() == 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $clinicalTest->setTestName($row['test_name']);
                $clinicalTest->setCost($row['cost']);
            }
            return $clinicalTest;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();

        try{

            $stmt = $conn->prepare("SELECT * FROM clinical_tests WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $clinicalTests = array();
            if ($stmt->rowCount() == 0) {
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $clinicalTest = array(
                        "id" => $row['id'],
                        "test_name" => $row['test_name'],
                        "cost" => $row['cost']
                    );
                    $clinicalTests[] =$clinicalTest;
                }
            }
            return $clinicalTests;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

}