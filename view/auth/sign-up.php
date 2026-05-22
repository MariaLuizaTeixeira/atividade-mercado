<?php

use Util\Conexao;

require_once("../../util/Conexao.php");
require_once("../../util/config.php");

$conexao = Conexao::getConexao();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$conexao = Conexao::getConexao();

$msgErro = "";

$primeiroNome = "";
$sobrenome = "";
$telefone = "";
$email = "";
$endereco = "";
$senha = "";
$confirmacaoSenha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $primeiroNome = trim($_POST["primeiroNome"] ?? "");
    $sobrenome = trim($_POST["sobrenome"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $endereco = trim($_POST["endereco"] ?? "");
    $senha = trim($_POST["senha"] ?? "");
    $confirmacaoSenha = trim($_POST["confirmar-senha"] ?? "");

    $msgs = [];

    if (!$primeiroNome)
        $msgs[] = "Informe o primeiro nome!";
    elseif (strlen($primeiroNome) < 2)
        $msgs[] = "Primeiro nome deve ter ao menos 2 caracteres!";

    if (!$sobrenome)
        $msgs[] = "Informe o sobrenome!";
    elseif (strlen($sobrenome) < 2)
        $msgs[] = "Sobrenome deve ter ao menos 2 caracteres!";

    if (!$telefone)
        $msgs[] = "Informe o telefone!";

    if (!$email)
        $msgs[] = "Informe o email!";

    if (!$endereco)
        $msgs[] = "Informe o endereço!";

    if (!$senha)
        $msgs[] = "Informe a senha!";

    if (!$confirmacaoSenha)
        $msgs[] = "Informe a confirmação de senha!";

    if ($senha != $confirmacaoSenha)
        $msgs[] = "As senhas são diferentes!";

    if(empty($msgs)){

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios
                (nome_completo, email, senha_hash, telefone)
                VALUES (?, ?, ?, ?)";

        $stm = $conexao->prepare($sql);

        $nomeCompleto = $primeiroNome . " " . $sobrenome;

        $stm->execute([
                $nomeCompleto,
                $email,
                $senhaHash,
                $telefone
        ]);

    } else {
        $msgErro = implode("<br>", $msgs);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title>Página de cadastro</title>

    <link rel="stylesheet" href="../../assets/css/sign-up.css">
</head>

<body>
    <div class="logo-container">
        <img src="../../assets/images/logo.png">
    </div>

    <div class="page-container">
        <div class="sign-up-image">
            <img src="../../assets/images/grocery-bag.webp">
        </div>

        <div class="register-container">
            <div class="form-heading">
                <h1 class="form-title">Cadastre-se</h1>
                <p class="form-subtitle">As melhores ofertas estão a um cadastro de distância!</p>
            </div>

            <div class="form-container">
                <form class="register-form" method="POST">
                    <div class="input-row">
                        <div class="field-group">
                            <p>Primeiro Nome</p>
                            <input type="text" placeholder="João" name="primeiroNome" id="primeiroNome">
                        </div>

                        <div class="field-group">
                            <p>Sobrenome</p>
                            <input type="text" placeholder="Silva" name="sobrenome" id="sobrenome">
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="field-group">
                            <p>Telefone</p>
                            <input type="text" placeholder="(99) 99999-9999" name="telefone" id="telefone">
                        </div>

                        <div class="field-group">
                            <p>Email</p>
                            <input type="text" placeholder="joaosilva@gmail.com" name="email" id="email">
                        </div>
                    </div>

                        <div class="field-group">
                            <p>Endereço</p>
                            <input type="text" placeholder="Rua das Flores, 250 - Centro" name="endereco" id="endereço">
                        </div>

                        <div class="field-group">
                            <p>Senha</p>
                            <div class="password-container">
                                <input type="password" placeholder="Digite uma senha" class="full-width" name="senha" id="senha">
                                <button type="button" class="toggle-password"> <img src="../../assets/images/visibility-off.svg"> </button>
                            </div>
                        </div>

                        <div class="field-group">
                            <p>Confirme senha</p>
                            <div class="password-container">
                                <input type="password" placeholder="Digite sua senha novamente" class="full-width" name="confirmar-senha" id="confirmar-senha">
                                <button type="button" class="toggle-password"> <img src="../../assets/images/visibility-off.svg"> </button>
                            </div>
                        </div>
                    </div>

            <div style="color: red;">
                <?= $msgErro ?>
            </div>

                    <div class="form-actions">
                        <div class="terms">
                            <input type="checkbox" id="contrato" name="aceite" value="termos">
                            <label>Li e concordo com os <span class="text-contrast"><b>Termos de Uso</b></span> e a
                                <span class="text-contrast"><b>Política de Privacidade</b></span></label>
                        </div>

                        <button class="submit-form">Criar conta</button>

                        <div class="already-signed-in">
                            <p>Já possui uma conta? <a href="login.php" class="text-contrast"><b>Entrar</b></a></p>
                        </div>

                        <div class="divider">
                            <div class="line"></div>
                            <span>Ou faça cadastro com</span>
                            <div class="line"></div>
                        </div>

                        <div class="register-apps">
                                <button class="app-button" >
                                    <img class="google-image" src="../../assets/images/google-logo.webp">
                                    <p>Google</p>
                                </button>

                            <button class="app-button">
                                <img class="apple-image" src="../../assets/images/apple-logo.png">
                                <p>Apple</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
