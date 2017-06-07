<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/19/17
 * Time: 9:49 AM
 */
require_once __DIR__.'/../vendor/autoload.php';

$_SESSION['receiptNo'] = \Hudutech\Controller\SalesController::generateReceiptNo();

