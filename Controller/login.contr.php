<?php
include('../Model/Model.php');

$body = file_get_contents("php://input");

$login = json_decode($body);

$email = $login->email;
$pwd = $login->pwd;

if (!empty($email) && !empty($pwd)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pwd)) {
            // check if the email is already in the database
            $result = Model::getUserByMail($email);
            if (!empty($result)) {
                // check if the password is correct
                if (password_verify($pwd, $result['pwd'])) {
                    $body = array(
                        "success" => "Vous êtes bien connecté"
                    );
                    // start the session and store the userId in it
                    session_start();
                    $_SESSION['user'] = $result['id'];
                    $body = array(
                        "error" => "Le mot de passe est incorrect"
                    );
                }
            } else {
                $body = array(
                    "error" => "L'utilisateur n'existe pas"
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
