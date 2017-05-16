<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/16/17
 * Time: 9:49 AM
 */

namespace Hudutech\AppInterface;

use Hudutech\Entity\Sales;

interface SalesInterface
{
    public function create(Sales $sales);
    public function update(Sales $sales, $id);
    public static function delete($id);
    public static function getId($id);
    public static function getObject($id);
    public static function all();
}