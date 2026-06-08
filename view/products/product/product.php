<?php

use Controller\ProdutoController;

include_once __DIR__ . '/../../components/header.php';
include_once __DIR__ . '/../../layouts/header.php';
include_once(__DIR__ . '/../../../controller/ProdutoController.php');
$produtoController = new ProdutoController();

$idProduto = $_GET['produto'];

$produto = $produtoController->acharPorId($idProduto);
?>

<head>
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/produto.css">
</head>

<body>
    <div class="container py-5">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <img src="assets/images/produtos/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="img-fluid rounded-4 shadow">
            </div>

            <div class="col-lg-6">
                <form action="util/adicionarAoCarrinho.php" method="POST">
                    <input type="hidden" name="produto_id" value="<?= $produto['id']; ?>">
                    <input type="hidden" name="usuario_id" value="<?= $usuario->getId(); ?>">

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <span class="badge bg-success-subtle text-success px-3 py-2 mb-3">
                                <?= $produto['setor'] ?>
                            </span>

                            <h1 class="display-5 fw-bold mb-3"><?= $produto['nome'] ?></h1>

                            <div class="fs-1 fw-bold text-success mb-3">
                                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </div>

                            <p class="text-secondary mb-4"><?= $produto['descricao'] ?></p>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Quantidade</label>

                                <input type="number" name="quantidade" min="1" value="1" class="form-control"
                                       style="max-width:120px;">
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-3 fw-semibold">
                                Adicionar ao carrinho
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
