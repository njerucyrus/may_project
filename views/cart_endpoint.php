<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/18/17
 * Time: 10:06 AM
 */
require_once __DIR__ . '/../vendor/autoload.php';
$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data)) {

    if (!empty($data['inventoryId']) && !empty($data['qty'])) {
        $price = \Hudutech\Controller\DrugInventoryController::getPrice($data['inventoryId'], $data['qty']);
        $cartCreated = \Hudutech\Controller\SalesController::createCart(
            array(
                "inventoryId" => $data['inventoryId'],
                "qty" => $data['qty'],
                "receiptNo" => $data['receiptNo'],
                "patientId" => isset($data['patientId']) ? $data['patientId'] : null,
                "price" => $price
            ));
        if ($cartCreated) {
            print_r(json_encode(
                array(
                    "statusCode" => 200,
                    "message" => "Drug added to Cart"
                )));
        } else {
            print_r(json_encode(
                array(
                    "statusCode" => 500,
                    "message" => "Drug already exists in the Cart"
                )));
        }
    } else {
        print_r(json_encode(
            array(
                "statusCode" => 500,
                "message" => "Quantity cannot be empty"
            )));
    }

} else {
    print_r(json_encode(
        array(
            "statusCode" => 500,
            "message" => "No Data received"
        )));
}
