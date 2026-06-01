<?php

use Controller\ProdutoController;

include_once __DIR__ . '/../../components/header.php';
include_once __DIR__ . '/../../layouts/header.php';
include_once(__DIR__ . '/../../../controller/ProdutoController.php');
$produtoController = new ProdutoController();

$id = $_GET['id'];

$produto = $produtoController->acharPorId($id);
?>

<head>
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/produto.css">
</head>

<body>
<div class="page-container">
    <div class="product-container">

        <div class="product-image">
            <img src="../../../assets/images/produtos/<?= $produto['imagem'] ?>">
        </div>

        <div class="product-info">
            <span class="product-category">
                <?= $produto['setor'] ?>
            </span>

            <h1><?= $produto['nome'] ?></h1>

            <div class="product-price">
                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
            </div>

            <p class="product-description">
                <?= $produto['descricao'] ?>
            </p>

            <div class="quantity-container">
                <label>Quantidade</label>

                <input type="number" min="1" value="1">
            </div>

             <a href="/view/cart/cart.php"> <!-- trocar por js -->
                 <button class="add-cart-button">
                     Adicionar ao carrinho
                 </button>
             </a>
        </div>

    </div>
</div>
</body>
