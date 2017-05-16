<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/16/17
 * Time: 10:00 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\SalesInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Sales;

class SalesController implements SalesInterface
{
    public function create(Sales $sales)
    {
        $db = new DB();
        $conn = $db->connect();
        $patientNo = $sales->getPatientNo();
        $inventoryId = $sales->getInventoryId();
        $qty = $sales->getQty();
        $price = $sales->getPrice();
        $datePurchased = $sales->getDatePurchased();
        $servedBy = $sales->getServedBy();

        try{

            $stmt = $conn->prepare("INSERT INTO sales(
                                                        patientNo,
                                                        inventoryId,
                                                        qty,
                                                        price,
                                                        datePurchased,
                                                        servedBy
                                                    )
                                                    VALUES
                                                     (
                                                        :patientNo,
                                                        :inventoryId,
                                                        :qty,
                                                        :price,
                                                        :datePurchased,
                                                        :servedBy
                                                    )");
            $stmt->bindParam(":patientNo", $patientNo);
            $stmt->bindParam(":inventoryId",$inventoryId);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":datePurchased",$datePurchased);
            $stmt->bindParam(":servedBy",$servedBy);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            return false;
        }
    }

    public function update(Sales $sales, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $patientNo = $sales->getPatientNo();
        $inventoryId = $sales->getInventoryId();
        $qty = $sales->getQty();
        $price = $sales->getPrice();
        $datePurchased = $sales->getDatePurchased();
        $servedBy = $sales->getServedBy();

        try {

            $stmt = $conn->prepare("UPDATE sales SET
                                                    patientNo=:patientNo,
                                                    inventoryId=:inventoryId,
                                                    qty=:qty,
                                                    price=:price,
                                                    datePurchased=:datePurchased,
                                                    servedBy=:servedBy 
                                                     WHERE id=:id
                                                  ");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":patientNo", $patientNo);
            $stmt->bindParam(":inventoryId", $inventoryId);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":datePurchased", $datePurchased);
            $stmt->bindParam(":servedBy", $servedBy);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("DELETE FROM sales WHERE id=:id");
            $stmt->bindParam(":id", $id);
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
          $stmt = $conn->prepare("SELECT t.* FROM sales t WHERE t.id=:id");
          $stmt->bindParam(":id", $id);
          return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch(\PDO::FETCH_ASSOC) : [];
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
            $stmt = $conn->prepare("SELECT t.* FROM sales t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS |\PDO::FETCH_PROPS_LATE, Sales::class);
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch() : null;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }

    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT t.* FROM sales t WHERE 1");
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

}