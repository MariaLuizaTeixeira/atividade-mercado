<?php

use Controller\CarrinhoController;
use Controller\ProdutoCarrinhoController;
use Util\Conexao;

require_once __DIR__ . '/../util/Conexao.php';
require_once __DIR__ . '/../controller/CarrinhoController.php';
require_once __DIR__ . '/../controller/ProdutoCarrinhoController.php';

$conexao = Conexao::getConexao();
$carrinhoController = new CarrinhoController();
$produtoCarrinhoController = new ProdutoCarrinhoController();

$usuarioId = $_POST['usuario_id'];
$produtoId = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];


$cart = $carrinhoController->acharPorUsuarioId($usuarioId);

if (!$cart) {
    $carrinhoController->criar($usuarioId);

    $cart = $carrinhoController->acharPorUsuarioId($usuarioId);
}

$item = $produtoCarrinhoController->acharProdutoPorId($cart['id'], $produtoId);

if ($item) {

    $sql = "UPDATE cart_items
            SET quantity = quantity + ?
            WHERE cart_id = ?
            AND produtos_id = ?";

    $stm = $conexao->prepare($sql);
    $stm->execute([
        $quantidade,
        $cart['id'],
        $produtoId
    ]);

} else {
    $produtoCarrinhoController->salvarProduto($cart['id'], $produtoId, $quantidade);
}

header("Location: ".BASE_URL."view/cart/cart.php");
exit;
