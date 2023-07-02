<?php

class User
{
    public $id;
    public $firstname;
    public $lastname;
    public $age;
    public $filiere;
    public $email;
    public $pwd;
    public $status;

    public function __construct($id, $firstname, $lastname, $age, $filiere, $email, $pwd, $status)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->filiere = $filiere;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->status = $status;
    }

    public static function create($firstname, $lastname, $age, $filiere, $email, $pwd)
    {
        $db = ConnectDb::getInstance()->getConnection();
        $sql = "INSERT INTO users (firstname, lastname, age, filiere, email, pwd) VALUES (:firstname, :lastname, :age, :filiere, :email, :pwd)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->execute();
    }
}
