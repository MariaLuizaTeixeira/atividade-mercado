<?php ?>

<head>
    <link rel="stylesheet" href="/assets/css/header.css">
</head>

<header>
    <div class="header-container">
        <div class="logo-container">
            <a href="../home/home.php">
                <img src="/assets/images/logo.png">

                <div class="logo-text">
                    <h3>Mercado</h3>
                </div>
            </a>


        </div>

        <div class="search-container">
        <form action="/buscar" method="GET">
                <input type="search" name="q" placeholder="O que vai levar hoje?">
                <img src="/assets/images/icons/search.svg">
        </form>
        </div>

        <div class="actions-container">
            <div class="user-container">
                <a href="../profile/user.php">
                    <img src="/assets/images/icons/user.svg">
                    <p>Conta</p>
                </a>

            </div>

            <div class="cart-container">
                <a href="../cart/cart.php"><img src="/assets/images/icons/shopping-cart.svg"></a>
            </div>
        </div>
    </div>
</header>
