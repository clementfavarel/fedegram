<?php
include('ConnectDb.php');
include('User.php');

class Model
{
    public static function getUserByMail($email)
    {
        $conn = ConnectDb::getInstance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
