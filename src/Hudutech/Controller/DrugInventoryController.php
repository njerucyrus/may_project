<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/15/17
 * Time: 11:56 PM
 */

namespace Hudutech\Controller;

use Hudutech\AppInterface\DrugInventoryInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\DrugInventory;

class DrugInventoryController implements DrugInventoryInterface
{
    public function create(DrugInventory $drugInventory)
    {
       $db = new DB();
       $conn = $db->connect();
       $batchNo = $drugInventory->getBatchNo();
       $invoiceNo = $drugInventory->getInvoiceNo();
       $productName = $drugInventory->getProductName();
       $qtyReceived = $drugInventory->getQtyReceived();
       $purchasePrice = $drugInventory->getPurchasePrice();
       $datePurchased = $drugInventory->getDatePurchased();
       $expiryDate= $drugInventory->getExpiryDate();
       $doseQty = $drugInventory->getDoseQty();
       $dosePrice = $drugInventory->getDosePrice();
       $qtyInStock = $drugInventory->getQtyInStock();

       try{
           $stmt = $conn->prepare("INSERT INTO drug_inventory(
                                                                batchNo,
                                                                invoiceNo,
                                                                productName, 
                                                                qtyReceived, 
                                                                purchasePrice,
                                                                datePurchased,
                                                                expiryDate, 
                                                                doseQty,
                                                                dosePrice, 
                                                                qtyInStock
                                                                )
                                                        VALUES (
                                                                :batchNo, 
                                                                :invoiceNo,
                                                                :productName,
                                                                :qtyReceived,
                                                                :purchasePrice,
                                                                :datePurchased, 
                                                                :expiryDate,
                                                                :doseQty, 
                                                                :dosePrice, 
                                                                :qtyInStock
                                                                )");

           $stmt->bindParam(":batchNo",$batchNo);
           $stmt->bindParam(":invoiceNo",$invoiceNo);
           $stmt->bindParam(":productName",$productName);
           $stmt->bindParam(":qtyReceived",$qtyReceived);
           $stmt->bindParam(":purchasePrice",$purchasePrice);
           $stmt->bindParam(":datePurchased", $datePurchased);
           $stmt->bindParam(":expiryDate",$expiryDate);
           $stmt->bindParam(":doseQty",$doseQty);
           $stmt->bindParam(":dosePrice",$dosePrice);
           $stmt->bindParam(":qtyInStock",$qtyInStock);
           return $stmt->execute() ? true : false;
       } catch (\PDOException $exception) {
           echo $exception->getMessage();
           return false;
       }
    }

    public function update(DrugInventory $drugInventory, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $batchNo = $drugInventory->getBatchNo();
        $invoiceNo = $drugInventory->getInvoiceNo();
        $productName = $drugInventory->getProductName();
        $qtyReceived = $drugInventory->getQtyReceived();
        $purchasePrice = $drugInventory->getPurchasePrice();
        $datePurchased = $drugInventory->getDatePurchased();
        $expiryDate= $drugInventory->getExpiryDate();
        $doseQty = $drugInventory->getDoseQty();
        $dosePrice = $drugInventory->getDosePrice();
        $qtyInStock = $drugInventory->getQtyInStock();

        try{
            $stmt = $conn->prepare("UPDATE drug_inventory SET
                                                                batchNo=:batchNo,
                                                                invoiceNo=:invoiceNo,
                                                                productName=:productName, 
                                                                qtyReceived=:qtyReceived, 
                                                                purchasePrice=:purchasePrice,
                                                                datePurchased=:datePurchased,
                                                                expiryDate=:expiryDate, 
                                                                doseQty=:doseQty,
                                                                dosePrice=:dosePrice, 
                                                                qtyInStock=:qtyInStock
                                                        WHERE id=:id"
                                                      );

            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":batchNo",$batchNo);
            $stmt->bindParam(":invoiceNo",$invoiceNo);
            $stmt->bindParam(":productName",$productName);
            $stmt->bindParam(":qtyReceived",$qtyReceived);
            $stmt->bindParam(":purchasePrice",$purchasePrice);
            $stmt->bindParam(":datePurchased", $datePurchased);
            $stmt->bindParam(":expiryDate",$expiryDate);
            $stmt->bindParam(":doseQty",$doseQty);
            $stmt->bindParam(":dosePrice",$dosePrice);
            $stmt->bindParam(":qtyInStock",$qtyInStock);
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
           $stmt = $conn->prepare("DELETE FROM drug_inventory WHERE id=:id");
           $stmt->bindParam(":id", $id);
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
            $stmt = $conn->prepare("SELECT t.* FROM drug_inventory t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch(\PDO::FETCH_ASSOC): [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function getObject($id)
    {
        // TODO: Implement getObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

    public static function getPrice($id, $qty)
    {
        // TODO: Implement getPrice() method.
    }

}