<?php
include('../Model/Model.php');

$body = file_get_contents("php://input");

$register = json_decode($body);

$nom = $register->nom;
$prenom = $register->prenom;
$age = $register->age;
$filiere = $register->filiere;
$email = $register->email;
$pwd = $register->pwd;
$pwd_confirm = $register->pwd_confirm;

if (!empty($nom) && !empty($prenom) && !empty($age) && !empty($filiere) && !empty($email) && !empty($pwd) && !empty($pwd_confirm)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pwd)) {
            if ($pwd === $pwd_confirm) {
                // check if the email is not already in the database
                $result = Model::getUserByMail($email);
                if (empty($result)) {
                    // hash the pwd
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // insert the user in the database
                    User::create($nom, $prenom, $age, $filiere, $email, $pwd);
                    // start the session and store the userFirstname in it
                    session_start();
                    $user = Model::getUserByMail($email);
                    $_SESSION['user'] = $user['id'];
                    $body = array(
                        "success" => "Votre compte a bien été créé"
                    );
                } else {
                    $body = array(
                        "error" => "Cette adresse mail est déjà utilisée"
                    );
                }
            } else {
                $body = array(
                    "error" => "Les mots de passe ne correspondent pas"
                );
            }
        } else {
            $body = array(
                "error" => "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial"
            );
        }
    } else {
        $body = array(
            "error" => "Veuillez entrer une adresse mail valide"
        );
    }
} else {
    $body = array(
        "error" => "Veuillez remplir tous les champs"
    );
}

echo json_encode($body);
