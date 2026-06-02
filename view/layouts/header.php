<?php ?>

<head>
    <link rel="stylesheet" href="/assets/css/header.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg border-bottom py-3">
        <div class="container">
            <a href="/view/home/home.php" class="navbar-brand d-flex align-items-center gap-2">
                <img src="/assets/images/logo.png" alt="Logo" width="50" height="50">
                <h3 class="mb-0">Mercado</h3>
            </a>

            <form action="/buscar" method="GET" class="d-flex flex-grow-1 mx-lg-5 my-3 my-lg-0">
                <div class="input-group">
                    <input type="search" name="q" class="form-control" placeholder="O que vai levar hoje?">

                    <span class="input-group-text bg-light">
                        <img src="/assets/images/icons/search.svg" width="16" height="16">
                    </span>
                </div>
            </form>

            <div class="d-flex align-items-center gap-4">
                <a href="/view/profile/user.php" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
                    <img src="/assets/images/icons/user.svg" width="20" height="20">
                    <span>Conta</span>
                </a>

                <a href="/view/cart/cart.php">
                    <img src="/assets/images/icons/shopping-cart.svg" width="28" height="28">
                </a>
            </div>
        </div>
    </nav>

    <div class="border-top border-bottom py-3">
        <div class="container">
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="/view/products/category/category.php?category=higiene-limpeza"><button class="btn btn-link text-dark text-decoration-none p-0">🧼 Higiene e Limpeza</button></a>

                <a href="/view/products/category/category.php?category=hortifruti"><button class="btn btn-link text-dark text-decoration-none p-0">🍎 Hortifruti</button></a>

                <a href="/view/products/category/category.php?category=acougue-peixaria"><button class="btn btn-link text-dark text-decoration-none p-0">🥩 Açougue e Peixaria</button></a>

                <a href="/view/products/category/category.php?category=padaria-confeitaria"><button class="btn btn-link text-dark text-decoration-none p-0">🥖 Padaria e Confeitaria</button></a>

                <a href="/view/products/category/category.php?category=frios-laticinios"><button class="btn btn-link text-dark text-decoration-none p-0">🍶 Frios e Laticínios</button></a>

                <a href="/view/products/category/category.php?category=bebidas"><button class="btn btn-link text-dark text-decoration-none p-0">🧃 Bebidas</button></a>

                <a href="/view/products/category/category.php?category=mercearia"><button class="btn btn-link text-dark text-decoration-none p-0">🥫 Mercearia</button></a>
            </div>
        </div>
    </div>
</header>