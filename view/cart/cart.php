<?php

use Controller\CarrinhoController;
use Util\Conexao;


include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../../util/Conexao.php';
require_once __DIR__ . '/../../controller/CarrinhoController.php';

$conexao = Conexao::getConexao();

$carrinhoController = new CarrinhoController();

$cart = $carrinhoController->acharPorUsuarioId($usuario->getId());

if ($cart) {

    $sql = "
        SELECT
            p.*,
            ci.quantity
        FROM cart_items ci
        INNER JOIN produtos p
            ON p.id = ci.produtos_id
        WHERE ci.cart_id = ?
    ";

    $stm = $conexao->prepare($sql);
    $stm->execute([$cart['id']]);

    $produtos = $stm->fetchAll();
}

$total = 0;
?>

<div class="container py-5">

    <h1 class="mb-4">Meu Carrinho</h1>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach($produtos as $produto):

            $subtotal =
                    $produto['preco']
                    * $produto['quantity'];

            $total += $subtotal;
            ?>

            <tr>
                <td><?= $produto['nome'] ?></td>

                <td>
                    R$ <?= number_format(
                            $produto['preco'],
                            2,
                            ',',
                            '.'
                    ) ?>
                </td>

                <td><?= $produto['quantity'] ?></td>

                <td>
                    R$ <?= number_format(
                            $subtotal,
                            2,
                            ',',
                            '.'
                    ) ?>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <div class="text-end">

        <h3>
            Total:
            R$ <?= number_format(
                    $total,
                    2,
                    ',',
                    '.'
            ) ?>
        </h3>

    </div>

</div>
