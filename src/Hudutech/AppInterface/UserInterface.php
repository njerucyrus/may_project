<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/6/17
 * Time: 3:01 PM
 */

namespace Hudutech\AppInterface;


use Hudutech\Entity\User;

interface UserInterface
{
  public function create(User $user);
  public function update(User $user, $id);
  public static function getId($id);
  public static function getUserObject($id);
  public static function all();
}