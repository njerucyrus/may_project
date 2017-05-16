<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/16/17
 * Time: 11:07 AM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\ChargesInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\Charges;

class ChargesController implements ChargesInterface
{
    public function create(Charges $charges)
    {
        $db = new DB();
        $conn = $db->connect();
        $chargeName = $charges->getChargeName();
        $cost = $charges->getCost();
        try{
           $stmt = $conn->prepare("INSERT INTO charges(chargeName, cost) 
                                  VALUES (:chargeName, :cost)") ;
           $stmt->bindParam(":chargeName", $chargeName);
           $stmt->bindParam(":cost", $cost);
           return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(Charges $charges, $id)
    {
        $db = new DB();
        $conn = $db->connect();
        $chargeName = $charges->getChargeName();
        $cost = $charges->getCost();
        try{
            $stmt = $conn->prepare("UPDATE charges SET chargeName=:chargeName, cost=:cost
                                   WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":chargeName", $chargeName);
            $stmt->bindParam(":cost", $cost);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
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

}