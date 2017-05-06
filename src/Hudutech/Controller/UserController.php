<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/6/17
 * Time: 3:05 PM
 */

namespace Hudutech\Controller;


use Hudutech\AppInterface\UserInterface;
use Hudutech\DBManager\DB;
use Hudutech\Entity\User;

class UserController implements UserInterface
{
    public function create(User $user)
    {
        $db = new DB();
        $conn = $db->connect();

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $userLevel = $user->getUserLevel();
        $password = $user->getPassword();

        try{
            $stmt = $conn->prepare("INSERT INTO clinic_db.users(
                                                                    firstName,
                                                                    lastName,
                                                                    email,
                                                                    username,
                                                                    userLevel,
                                                                    password
                                                                ) VALUES (
                                                                    :firstName,
                                                                    :lastName,
                                                                    :email,
                                                                    :username,
                                                                    :userLevel,
                                                                    :password
                                                                ) 
                                                                ");
            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":userLevel", $userLevel);
            $stmt->bindParam(":password",$password);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update(User $user, $id)
    {

    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function getUserObject($id)
    {
        // TODO: Implement getUserObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}