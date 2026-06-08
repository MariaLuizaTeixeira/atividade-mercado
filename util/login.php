<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Controller\UsuarioController;
use DAO\UsuarioDAO;
use Mapper\UsuarioMapper;

require_once __DIR__ . "/../controller/UsuarioController.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";
require_once __DIR__ . "/../mapper/UsuarioMapper.php";

$usuarioController = new UsuarioController();
$usuarioDAO = new UsuarioDAO();

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = $usuarioDAO->encontrarPorEmail($email);
if ($usuarioController->verificarCredenciais($email, $senha)) {
    session_start();
    session_destroy();
    session_start();
    $_SESSION['usuario'] = UsuarioMapper::bancoParaUsuario($usuario);
    header("Location: ".BASE_URL."view/home/home.php");
    exit;

}
else {
    header("Location: ".BASE_URL."view/auth/login.php?erro=1");
    exit;
}
