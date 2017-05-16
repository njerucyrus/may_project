<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/16/17
 * Time: 8:37 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ProductInventoryInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\ProductInventory;

class ProductInventoryController implements ProductInventoryInterface
{
    public function create(ProductInventory $productInventory)
    {
        $db = new DB();
        $conn = $db->connect();

        $batchNo = $productInventory->getBatchNo();
        $invoiceNo = $productInventory->getInvoiceNo();
        $productName = $productInventory->getProductName();
        $qtyReceived = $productInventory->getQtyReceived();
        $purchasePrice = $productInventory->getPurchasePrice();
        $salePrice = $productInventory->getSalePrice();
        $purchaseDate = $productInventory->getPurchaseDate();
        $expiryDate = $productInventory->getExpiryDate();

        try{
            $stmt = $conn->prepare("INSERT INTO product_inventory(
                                                                    batchNo,
                                                                    invoiceNo, 
                                                                    productName,
                                                                    qtyReceived,
                                                                    purchasePrice, 
                                                                    salePrice, 
                                                                    purchaseDate, 
                                                                    expiryDate
                                                                )
                                                                VALUES (
                                                                    :batchNo,
                                                                    :invoiceNo, 
                                                                    :productName,
                                                                    :qtyReceived,
                                                                    :purchasePrice,
                                                                    :salePrice, 
                                                                    :purchaseDate, 
                                                                    :expiryDate
                                                                )");
            $stmt->bindParam(":batchNo",$batchNo);
            $stmt->bindParam(":invoiceNo", $invoiceNo);
            $stmt->bindParam(":productName", $productName);
            $stmt->bindParam(":qtyReceived", $qtyReceived);
            $stmt->bindParam(":purchasePrice", $purchasePrice);
            $stmt->bindParam(":salePrice", $salePrice);
            $stmt->bindParam(":purchaseDate", $purchaseDate);
            $stmt->bindParam(":expiryDate", $expiryDate);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }


    }

    public function update(ProductInventory $productInventory, $id)
    {

    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
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