<?php
include_once __DIR__ . '/../components/header.php';
?>

<head>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Cadastre-se</title>
</head>

<body>

    <div class="container-fluid min-vh-100">

        <div class="d-flex justify-content-end py-3 px-4">
            <img src="assets/images/logo.png" style="width:70px">
        </div>

        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="bg-light rounded p-4 text-center">
                        <img
                            src="assets/images/grocery-bag.webp"
                            class="img-fluid"
                            alt="Cadastro">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="mx-auto" style="max-width:500px;">
                        <h1 class="fw-bold mb-2">Cadastre-se</h1>

                        <p class="text-muted mb-4">As melhores ofertas estão a um cadastro de distância!</p>

                        <form method="POST" action="util/sign-up.php" onsubmit="return validarForm()">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Primeiro Nome</label>

                                    <input type="text" class="form-control obrigatorio" placeholder="João" id="primeiroNome" name="primeiroNome">
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Sobrenome</label>

                                    <input type="text" class="form-control obrigatorio" placeholder="Silva" id="sobrenome" name="sobrenome">
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Telefone</label>

                                    <input type="text" class="form-control obrigatorio" placeholder="(99) 99999-9999" id="telefone" name="telefone">
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>

                                    <input type="email" class="form-control obrigatorio" placeholder="joaosilva@gmail.com" id="email" name="email">
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Endereço</label>

                                    <input type="text" class="form-control obrigatorio" placeholder="Rua das Flores, 250 - Centro" id="endereco" name="endereco">
                                    <div class="invalid-feedback">Campo obrigatório</div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Senha</label>

                                    <div class="input-group">
                                        <input type="password" class="form-control obrigatorio" placeholder="Digite uma senha" id="senha" name="senha">
                                        <div class="invalid-feedback">Campo obrigatório</div>

                                        <button type="button" class="btn btn-outline-secondary">
                                            <img src="assets/images/icons/visibility-off.svg">
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Confirmar senha</label>

                                    <div class="input-group">
                                        <input type="password" class="form-control obrigatorio" placeholder="Digite sua senha novamente" id="confirmar-senha" name="confirmar-senha">
                                        <div class="invalid-feedback">Campo obrigatório</div>

                                        <button type="button" class="btn btn-outline-secondary">
                                            <img src="assets/images/icons/visibility-off.svg">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="contrato" name="aceite">
                                <label class="form-check-label" for="contrato">Li e concordo com os
                                    <span class="text-warning fw-bold">Termos de Uso</span>
                                    e a
                                    <span class="text-warning fw-bold">Política de Privacidade</span>
                                </label>
                            </div>

                            <button class="btn btn-primary w-100 mt-4 py-2">Criar conta</button>

                            <p class="text-center mt-3">Já possui uma conta?
                                <a href="login.php" class="text-warning fw-bold text-decoration-none">Entrar</a>
                            </p>

                            <div class="d-flex align-items-center my-4">
                                <hr class="flex-grow-1">
                                <span class="px-3 text-muted">Ou faça cadastro com</span>
                                <hr class="flex-grow-1">
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                        <img src="assets/images/google-logo.webp" width="20">Google
                                    </button>
                                </div>

                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <img src="assets/images/apple-logo.png" width="20">Apple
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="util/Validacao.js"></script>
</body>
