<?php

use Model\Carrinho;

include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../layouts/header.php';
include_once __DIR__ . '/../../model/carrinho.php';

$carrinho = new Carrinho();
?>

<head>
    <link rel="stylesheet" href="../../assets/css/cart.css">
</head>

<body>
    <div class="page-container">
        <div class="cart-container">
            <div class="cart-title">
                <h1>Seu carrinho</h1>
                <p>([x] items)</p>
            </div>
        </div>
    </div>

</body>
