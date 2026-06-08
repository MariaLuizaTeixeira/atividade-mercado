<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Controller\UsuarioController;
use DAO\UsuarioDAO;

require_once __DIR__ . "/../controller/UsuarioController.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";

$usuarioController = new UsuarioController();
$usuarioDAO = new UsuarioDAO();

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = $usuarioDAO->encontrarPorEmail($email);
if ($usuarioController->verificarCredenciais($email, $senha)) {
    header("Location: ".BASE_URL."view/home/home.php");
    exit;

}
else {
    header("Location: ".BASE_URL."view/auth/login.php?erro=1");
    exit;
}
