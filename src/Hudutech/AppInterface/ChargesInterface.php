<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/16/17
 * Time: 11:05 AM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\Charges;

interface ChargesInterface
{
    public function create(Charges $charges);
    public function update(Charges $charges, $id);
    public static function delete($id);
    public static function getId($id);
    public static function getObject($id);
    public static function all();
}