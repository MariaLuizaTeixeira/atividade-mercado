<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Controller\ProdutoCarrinhoController;

require_once __DIR__ . "/../controller/ProdutoCarrinhoController.php";

$produtoCarrinhoController = new ProdutoCarrinhoController();

$idUsuario = $_GET['idUsuario'];
$idProduto = $_GET['produto'];
$quantidade = $_POST['quantidade'];

$produtoCarrinhoController;

