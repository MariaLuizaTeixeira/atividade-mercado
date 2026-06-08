<?php

use Controller\UsuarioController;

include_once __DIR__ . '/../../controller/UsuarioController.php';
include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../layouts/header.php';

$idUsuario = $_GET['usuario'];

$usuarioController = new UsuarioController();
$usuario = $usuarioController->acharPorId($idUsuario);
?>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow border-0 mx-auto" style="max-width: 700px;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <img src="/assets/images/user.png"
                     class="rounded-circle border"
                     width="120"
                     height="120">

                <h2 class="mt-3 fw-bold">
                    <?= $usuario['nome_completo'] ?>
                </h2>

                <p class="text-muted">
                    Cliente do Mercado
                </p>
            </div>

            <hr>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    E-mail
                </label>

                <input
                        type="text"
                        class="form-control"
                        value="<?= $usuario['email'] ?>"
                        readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Telefone
                </label>

                <input
                        type="text"
                        class="form-control"
                        value="<?= $usuario['telefone'] ?>"
                        readonly>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Endereço
                </label>

                <input
                        type="text"
                        class="form-control"
                        value="<?= $usuario['endereco'] ?>"
                        readonly>
            </div>
        </div>
    </div>
    <a href="/view/products/product/add.php"
       class="btn btn-warning btn-lg fw-bold">
        Cadastrar Produto
    </a>
</div>
<?php include_once '../layouts/footer.php'; ?>
</body>
