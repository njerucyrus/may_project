<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/11/17
 * Time: 10:53 AM
 */

require_once __DIR__.'/../vendor/autoload.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data)) {

}