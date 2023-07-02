<?php
session_start();
include('Controller/Controller.php');

$controller = new Controller();
$controller->invoke();
