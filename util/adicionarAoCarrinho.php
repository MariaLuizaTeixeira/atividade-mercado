<?php

use Util\Conexao;

require_once __DIR__ . '/../util/Conexao.php';

$conexao = Conexao::getConexao();

$usuarioId = $_POST['usuario_id'];
$produtoId = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];

$sql = "SELECT * FROM carts WHERE user_id = ?";
$stm = $conexao->prepare($sql);
$stm->execute([$usuarioId]);

$cart = $stm->fetch();

if (!$cart) {

    $sql = "INSERT INTO carts (user_id)
            VALUES (?)";

    $stm = $conexao->prepare($sql);
    $stm->execute([$usuarioId]);

    $sql = "SELECT * FROM carts
            WHERE user_id = ?";

    $stm = $conexao->prepare($sql);
    $stm->execute([$usuarioId]);

    $cart = $stm->fetch();
}

$cartId = $cart['id'];

$sql = "SELECT * FROM cart_items
        WHERE cart_id = ?
        AND product_id = ?";

$stm = $conexao->prepare($sql);
$stm->execute([$cartId, $produtoId]);

$item = $stm->fetch();

if ($item) {

    $sql = "UPDATE cart_items
            SET quantity = quantity + ?
            WHERE cart_id = ?
            AND product_id = ?";

    $stm = $conexao->prepare($sql);
    $stm->execute([
        $quantidade,
        $cartId,
        $produtoId
    ]);

} else {

    $sql = "INSERT INTO cart_items
            (cart_id, product_id, quantity)
            VALUES (?, ?, ?)";

    $stm = $conexao->prepare($sql);
    $stm->execute([
        $cartId,
        $produtoId,
        $quantidade
    ]);
}

header("Location: /view/cart/cart.php?usuario=" . $usuarioId);
exit;
