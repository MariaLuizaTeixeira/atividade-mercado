<?php

use Controller\ProdutoController;

include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../layouts/header.php';
include_once(__DIR__ . '/../../controller/ProdutoController.php');

$produtoController = new ProdutoController();
$produtos = $produtoController->listarAleatoriamente();
?>

<head>
    <link rel="stylesheet" href="../../assets/css/home.css">
</head>
<body>
    <div class="page-container">
        <div class="categories-container">
            <div class="categories">
                <button class="category">🧼 Higiene e Limpeza</button>

                <button class="category">🍎 Hortifruti</button>

                <button class="category">🥩 Açougue e Peixaria</button>

                <button class="category">🥖 Padaria e confeitaria</button>

                <button class="category">🍶 Fríos e Laticínios</button>

                <button class="category">🧃 Bebidas</button>

                <button class="category">🥫 Mercearia</button>
            </div>
        </div>

        <div class="hero-banner-container">
            <div class="hero-banner-texts">
                <div class="hero-banner-title">
                    <h1>Arraiá de Ofertas chegou!</h1>
                </div>

                <div class="hero-banner-paragraph">
                    <p>Entre no clima da Festa Junina com descontos especiais em comidas típicas, bebidas, doces e ingredientes para o seu arraial. Aproveite promoções exclusivas por tempo limitado e receba tudo no conforto da sua casa.</p>
                </div>

                    <div class="hero-banner-button">
                        <button>Ver ofertas</button>
                    </div>
            </div>

            <div class="hero-banner-image">
                <img src="../../assets/images/pratos-festa-junina.jpg">
            </div>
        </div>

        <div class="featured-products-container">
            <div class="featured-products-text">
                <div class="featured-products-title">
                    <h3>Mais Pedidos</h3>
                </div>

                <div class="featured-products-descriptions">
                    <p>Os produtos favoritos para receber rápido na sua casa.</p>
                </div>
            </div>

            <div class="featured-products-content">
                <?php foreach($produtos as $produto) : ?>

                <div class="featured-product-card">
                    <img src="../../assets/images/produtos/<?= $produto['imagem'] ?>">

                    <div class="product-card">
                        <span class="product-category"><?= $produto['setor'] ?></span>

                        <h2><?= $produto['nome'] ?></h2>

                        <p class="product-description"><?= $produto['descricao'] ?></p>

                        <div class="product-footer">
                            <span class="product-price">
                                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </span>

                            <a href="#" class="buy-product-button">+</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>


