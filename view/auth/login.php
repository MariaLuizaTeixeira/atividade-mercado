<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/../components/header.php';
?>

<head>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Login</title>
</head>

<body>
    <?php if(isset($_GET['erro'])): ?>
        <div class="alert alert-danger">
            Email ou senha inválidos.
        </div>
    <?php endif; ?>

    <div class="container-fluid min-vh-100">
        <div class="d-flex justify-content-end py-3 px-4">
            <img src="/assets/images/logo.png" style="width:70px;">
        </div>

        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <h1 class="fw-bold mb-2">Bem-vindo de volta</h1>
                    <p class="text-muted mb-4">Entre e aproveite as melhores ofertas</p>

                    <form action="/util/login.php" onsubmit="return validarForm()" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email/Telefone</label>
                            <input type="text" class="form-control obrigatorio" placeholder="joaosilva@gmail.com" name="email" id="email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>

                            <div class="input-group">
                                <input type="password" class="form-control obrigatorio" placeholder="Insira sua senha" name="senha" id="senha">

                                <button class="btn btn-outline-secondary" type="button">
                                    <img src="/assets/images/icons/visibility-off.svg">
                                </button>
                            </div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember">

                            <label class="form-check-label" for="remember">Mantenha-me logado</label>
                        </div>

                        <button class="btn btn-primary w-100 py-2 mb-3">Login</button>

                        <p class="text-center mb-4">Não tem uma conta?
                            <a href="sign-up.php" class="text-warning fw-bold text-decoration-none">Cadastre-se</a>
                        </p>

                        <div class="d-flex align-items-center mb-4">
                            <hr class="flex-grow-1">
                            <span class="px-3 text-muted">Ou faça login com</span>
                            <hr class="flex-grow-1">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <img src="/assets/images/google-logo.webp" width="20">Google
                                </button>
                            </div>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <img src="/assets/images/apple-logo.png" width="20">Apple
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7 text-center">
                    <img src="/assets/images/grocery-app.avif" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <script src="/util/Validacao.js"></script>
</body>

