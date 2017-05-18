<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/18/17
 * Time: 10:06 AM
 */
require_once __DIR__.'/../vendor/autoload.php';
$data = json_decode(file_get_contents('php://input'), true);

if(!empty($data)){
    if (!isset($_SESSION['receiptNo'])){
        $_SESSION['receiptNo'] = \Hudutech\Controller\SalesController::generateReceiptNo();
    }
}
