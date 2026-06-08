<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Controller\UsuarioController;
use DAO\UsuarioDAO;
use Mapper\UsuarioMapper;
use Controller\CarrinhoController;

require_once __DIR__ . "/../controller/UsuarioController.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";
require_once __DIR__ . "/../controller/CarrinhoController.php";
require_once __DIR__ . "/../mapper/UsuarioMapper.php";

$usuarioController = new UsuarioController();
$usuarioDAO = new UsuarioDAO();
$carrinhoController = new CarrinhoController();

$usuarioController->criar($_POST);

$email = $_POST["email"];
$usuarioArray = $usuarioDAO->encontrarPorEmail($email);
$usuario = UsuarioMapper::bancoParaUsuario($usuarioArray);
$carrinhoController->criar($usuario->getId());


header("Location: ".BASE_URL."view/auth/login.php");
