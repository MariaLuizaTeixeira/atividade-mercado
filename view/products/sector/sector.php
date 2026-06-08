<?php

use Controller\ProdutoController;

include_once __DIR__ . '/../../components/header.php';
include_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../controller/ProdutoController.php';

$produtoController = new ProdutoController();

if (!isset($_GET['setor']))
    header("Location: ".BASE_URL."view/home/home.php");

switch ($_GET['setor']) {
    case "higiene-limpeza":
        $setor = "Higiene e Limpeza";
        break;

    case "hortifruti":
        $setor = "Hortifruti";
        break;

    case "acougue-peixaria":
        $setor = "Açougue e Peixaria";
        break;

    case "padaria-confeitaria":
        $setor = "Padaria e Confeitaria";
        break;

    case "frios-laticinios":
        $setor = "Frios e Laticínios";
        break;

    case "bebidas":
        $setor = "Bebidas";
        break;

    case "mercearia":
        $setor = "Mercearia";
        break;
}


$produtos = $produtoController->acharPorSetor($setor);

$visualizacao = "card";
if (isset($_GET['visualizacao']))
    $visualizacao = $_GET['visualizacao'];

?>

<head>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <div class="container-fluid p-0">
        <section class="py-5" style="background:#FCBC64; min-height:82vh;">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h1 class="display-3 fw-bold text-white">Arraiá de Ofertas chegou!</h1>

                        <p class="lead text-white opacity-75 my-4">
                            Entre no clima da Festa Junina com descontos especiais em comidas típicas,
                            bebidas, doces e ingredientes para o seu arraial. Aproveite promoções
                            exclusivas por tempo limitado e receba tudo no conforto da sua casa.
                        </p>

                        <button class="btn btn-light btn-lg rounded-pill px-4 fw-bold">Ver ofertas</button>
                    </div>

                    <div class="col-lg-6 text-center">
                        <img src="assets/images/pratos-festa-junina.jpg" alt="Arraiá de Ofertas" class="img-fluid rounded-4 shadow">
                    </div>
                </div>
            </div>
        </section>

        <section id="produtos" class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Mais Pedidos</h2>

                    <p class="text-secondary">Os produtos favoritos para receber rápido na sua casa.</p>
                </div>

                <div class="text-center mb-4">
                    <a href="view/products/sector/sector.php?visualizacao=card&setor=<?= $_GET['setor'] ?>#produtos" class="btn <?= $visualizacao == 'card' ? 'btn-success' : 'btn-outline-success' ?> me-2">
                        Cards
                    </a>

                    <a href="view/products/sector/sector.php?visualizacao=tabela&setor=<?= $_GET['setor'] ?>#produtos" class="btn <?= $visualizacao == 'tabela' ? 'btn-success' : 'btn-outline-success' ?>">
                        Tabela
                    </a>
                </div>

                <div class="row g-4">
                    <?php if ($visualizacao == "card"): ?>
                        <?php foreach($produtos as $produto): ?>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <?php if (str_contains($produto['imagem'], "http")): ?>
                                        <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>"
                                            class="card-img-top" style="height:220px; object-fit:cover;">
                                    <?php else: ?>
                                        <img src="assets/images/produtos/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>"
                                            class="card-img-top" style="height:220px; object-fit:cover;">
                                    <?php endif; ?>

                                    <div class="card-body d-flex flex-column">
                                        <span class="text-uppercase text-secondary small fw-semibold">
                                            <?= $produto['setor'] ?>
                                        </span>

                                        <h5 class="fw-bold mt-2"><?= $produto['nome'] ?></h5>

                                        <p class="text-secondary flex-grow-1"><?= $produto['descricao'] ?></p>

                                        <div class="d-flex justify-content-between align-items-center">
                                                <span class="fs-4 fw-bold">
                                                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                                                </span>

                                            <a href="view/products/product/product.php?produto=<?= $produto['id'] ?>"
                                            class="btn btn-success fw-bold">+
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($visualizacao == "tabela"): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Setor</th>
                                        <th>Descrição</th>
                                        <th>Preço</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($produtos as $produto): ?>
                                        <tr>
                                            <td>
                                                <strong><?= $produto['nome'] ?></strong>
                                            </td>

                                            <td>
                                                <?= $produto['setor'] ?>
                                            </td>

                                            <td>
                                                <?= $produto['descricao'] ?>
                                            </td>

                                            <td>
                                                <strong>
                                                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                                                </strong>
                                            </td>

                                            <td>
                                                <a
                                                    href="view/products/product/product.php?produto=<?= $produto['id'] ?>"
                                                    class="btn btn-success">
                                                    +
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</body>



