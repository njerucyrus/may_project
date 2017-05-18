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
        $patientId = $sales->getPatientId();
        $receiptNo = $sales->getReceiptNo();
        $inventoryId = $sales->getInventoryId();
        $qty = $sales->getQty();
        $price = $sales->getPrice();
        $datePurchased = $sales->getDatePurchased();
        $servedBy = $sales->getServedBy();

        try {

            $stmt = $conn->prepare("INSERT INTO sales(
                                                        patientId,
                                                        inventoryId,
                                                        receiptNo,
                                                        qty,
                                                        price,
                                                        datePurchased,
                                                        servedBy
                                                    )
                                                    VALUES
                                                     (
                                                        :patientId,
                                                        :inventoryId,
                                                        :receiptNo,
                                                        :qty,
                                                        :price,
                                                        :datePurchased,
                                                        :servedBy
                                                    )");
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":inventoryId", $inventoryId);
            $stmt->bindParam(":receiptNo", $receiptNo);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":datePurchased", $datePurchased);
            $stmt->bindParam(":servedBy", $servedBy);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            return false;
        }
    }

    public function update(Sales $sales, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $patientId = $sales->getPatientId();
        $inventoryId = $sales->getInventoryId();
        $receiptNo = $sales->getReceiptNo();
        $qty = $sales->getQty();
        $price = $sales->getPrice();
        $datePurchased = $sales->getDatePurchased();
        $servedBy = $sales->getServedBy();

        try {

            $stmt = $conn->prepare("UPDATE sales SET
                                                    patientId=:patientId,
                                                    inventoryId=:inventoryId,
                                                    receiptNo=:receiptNo,
                                                    qty=:qty,
                                                    price=:price,
                                                    datePurchased=:datePurchased,
                                                    servedBy=:servedBy 
                                                     WHERE id=:id
                                                  ");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":receiptNo", $receiptNo);
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
        try {
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

        try {
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

        try {
            $stmt = $conn->prepare("SELECT t.* FROM sales t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Sales::class);
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

        try {
            $stmt = $conn->prepare("SELECT t.* FROM sales t WHERE 1");
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function generateReceiptNo()
    {
        $length = 8;
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return strtoupper(substr(bin2hex($bytes), 0, $length));
    }


    public static function createCart(array $cart){
        $db = new DB();
        $conn = $db->connect();

        $inventoryId = $cart['inventoryId'];
        $patientId = isset($cart['patientId']) ? $cart['patientId'] : null;
        $receiptNo = $cart['receiptNo'];
        $qty = $cart['qty'];
        $price = $cart['price'];


        try{
            $stmt = $conn->prepare("INSERT INTO cart(
                                                        patientId,
                                                        inventoryId,
                                                        receiptNo,
                                                        qty, 
                                                        price, 
                                                        createdAt
                                                    )
                                                    VALUES (
                                                        :patientId,
                                                        :inventoryId,
                                                        :receiptNo,
                                                        :qty,
                                                        :price,
                                                        CURDATE()
                                                    )");
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":inventoryId", $inventoryId);
            $stmt->bindParam(":receiptNo", $receiptNo);
            $stmt->bindParam(":qty", $qty);
            $stmt->bindParam(":price", $price);
            return $stmt->execute() ? true : false;
        }catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function showCartItems($receiptNo){
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT d.productName, c.qty, c.price FROM drug_inventory d , cart c 
                                    INNER JOIN cart cr ON cr.inventoryId = d.id 
                                    WHERE cr.inventoryId=d.id AND cr.receiptNo=:receiptNo");
            $stmt->bindParam(":receiptNo", $receiptNo);
            return $stmt->execute() && $stmt->rowCount() > 0 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function updateInventoryQty($inventoryId, $qty){
        $db = new DB();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("UPDATE drug_inventory SET qtyInStock=qtyInStock-'{$qty}'
                                    WHERE id=:inventoryId");
            $stmt->bindParam(":inventoryId", $inventoryId);
            return $stmt->execute() ? true: false;
        } catch (\PDOException $exception){
            echo $exception->getMessage();
            return false;
        }
    }
    public static function checkout(array $cart)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("INSERT INTO sales(
                                                        patientId,
                                                        inventoryId,
                                                        qty, 
                                                        price,
                                                        datePurchased,
                                                        servedBy,
                                                        receiptNo
                                                    ) VALUES (
                                                        :patientId,
                                                        :inventoryId,
                                                        :qty, 
                                                        :price,
                                                        :datePurchased,
                                                        :servedBy,
                                                        :receiptNo
                                                    )");

            foreach ($cart as $cartItem) {
                $stmt->bindParam(":patientId", $cartItem['patientId']);
                $stmt->bindParam(":inventoryId", $cartItem['inventoryId']);
                $stmt->bindParam(":qty", $cartItem['qty']);
                $stmt->bindParam(":price", $cartItem['price']);
                $stmt->bindParam(":datePurchased", $cartItem['datePurchased']);
                $stmt->bindParam(":receiptNo", $cartItem['receiptNo']);
                if ($stmt->execute()){
                    self::updateInventoryQty($cartItem['inventoryId'], $cartItem['qty']);
                }
            }

            return true;

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public static function paidRegFee($patientId)
    {
        $db = new DB();
        $conn = $db->connect();
        // check if the patient is registered
        try {
            $stmt = $conn->prepare("SELECT t.* FROM patients t WHERE t.id=:patientId");
            $stmt->bindParam(":patientId", $patientId);
            if ($stmt->execute() && $stmt->rowCount() == 1) {
                // the user is registered so we check if he/she paid the reg fee
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $paid = $row['regFeePaid'];
                if ($paid == 1) {
                    return true;
                } elseif ($paid == 0) {
                    return false;
                } else {
                    return true;
                }

            } else {
                return true;
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return 01;
        }
    }

    public static function canPayConsultationFee($patientId)
    {
        $db = new DB();
        $conn = $db->connect();
        try {

            $stmt = $conn->prepare("SELECT t.id FROM clinical_notes t WHERE
                                  t.patientId=:patientId AND date(t.date)=CURDATE()");
            $stmt->bindParam(":patientId", $patientId);
            if ($stmt->execute() and $stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return 01;
        }
    }

    public static function getTotalDrugCost($patientId)
    {
        $db = new DB();
        $conn = $db->connect();
        try {
            $stmt = $conn->prepare("SELECT SUM(t.price) as totalPrice FROM sales t
                                    WHERE t.patientId=:patientId AND
                                     date(t.datePurchased)=CURDATE()");
            $stmt->bindParam(":patientId", $patientId);
            if ($stmt->execute() && $stmt->rowCount() == 1) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                return (float)$row['totalPrice'];
            } else {
                return null;
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return null;
        }
    }

    public static function getPatientBill($patientId)
    {
        $bill = array();
        $paidRegFee = self::paidRegFee($patientId);
        $canPayConsultationFee = self::canPayConsultationFee($patientId);
        if (!$paidRegFee) {
            $bill['regFee'] = ChargeController::getRegistrationFee();
        }
        if ($canPayConsultationFee) {
            $bill['consultationFee'] = ChargeController::getConsultationFee();
        }
        $bill['drugCost'] = self::getTotalDrugCost($patientId);
        $totalCharges = isset($bill['regFee']) && isset($bill['consultationFee']) ?
                        (float)($bill['regFee'] + $bill['consultationFee']) : 0;

        $totalCost = $totalCharges + $bill['drugCost'];
        $bill['totalCost'] = $totalCost;
        return $bill;
    }

    public static function markPaidRegFee($patientId){
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("UPDATE patients SET regFeePaid=1 WHERE id=:patientId");
            $stmt->bindParam(":patientId", $patientId);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception){
            echo $exception->getMessage();
            return false;
        }
    }

    public static function createReceipt($patientId, $receiptNo) {
        $db = new DB();
        $conn = $db->connect();

        $bill = self::getPatientBill($patientId);
        $regFee = isset($bill['regFee'])? $bill['regFee'] : null;
        $consultFee = isset($bill['consultationFee'])? $bill['consultationFee'] : null;
        $totalCost = $bill['totalCost'];

        try{
            $stmt = $conn->prepare("INSERT INTO sales_receipts(
                                                                patientId, 
                                                                receiptNo,
                                                                consultationFee,
                                                                regFee,
                                                                totalCost
                                                              ) 
                                                            VALUES
                                                             (
                                                                :patientId,
                                                                :receiptNo,
                                                                :consultationFee,
                                                                :regFee,
                                                                :totalCost
                                                            )");
            $stmt->bindParam(":patientId", $patientId);
            $stmt->bindParam(":receiptNo", $receiptNo);
            $stmt->bindParam(":consultationFee", $consultFee);
            $stmt->bindParam(":regFee", $regFee);
            $stmt->bindParam(":totalCost", $totalCost);
            if ($stmt->execute()){
                if (!is_null($regFee)) {
                    self::markPaidRegFee($patientId);
                }
                return true;
            }
            else{
                return false;
            }
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }


}