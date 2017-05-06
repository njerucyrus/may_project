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
        $db = new DB();
        $conn = $db->connect();

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $userLevel = $user->getUserLevel();
        $password = $user->getPassword();

        try{
            $stmt = $conn->prepare("UPDATE clinic_db.users SET
                                                            firstName=:firstName,
                                                            lastName=:lastLogin,
                                                            email=:email,
                                                            username=:username,
                                                            userLevel=:userLevel,
                                                            password=:password
                                                        WHERE
                                                            id=:id
                                                        ");
            $stmt->bindParam(":id", $id);
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

    public static function getId($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM clinic_db.users t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch(\PDO::FETCH_ASSOC) : [];
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function getUserObject($id)
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM clinic_db.users t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->setFetchMode(\PDO::FETCH_CLASS |\PDO::FETCH_PROPS_LATE, User::class);
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetch() : null;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

    public static function all()
    {
        $db = new DB();
        $conn = $db->connect();
        try{
            $stmt = $conn->prepare("SELECT t.* FROM clinic_db.users t WHERE t.id=:id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute() && $stmt->rowCount() == 1 ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : null;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            return [];
        }
    }

}