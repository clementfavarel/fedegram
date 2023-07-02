<?php
include('Model/Model.php');

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (isset($_SESSION['user'])) {
            include 'View/app.php';
        } else {
            if (isset($_GET['login'])) {
                include 'View/login.php';
            } else if (isset($_GET['register'])) {
                include 'View/register.php';
            } else {
                include 'View/login.php';
            }
        }
    }
}
