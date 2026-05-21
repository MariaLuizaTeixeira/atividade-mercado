<?php ?>
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>

    <link rel="stylesheet" href="../assets/css/sign-up.css">
</head>

<body>
    <div class="logo-container">
        <img src="../assets/images/logo.png">
    </div>

    <div class="page-container">
        <div class="sign-up-image">
            <img src="../assets/images/grocery-bag.webp">
        </div>

        <div class="register-container">
            <div class="form-heading">
                <h1 class="form-title">Cadastre-se</h1>
                <p class="form-subtitle">As melhores ofertas estão a um cadastro de distância!</p>
            </div>

            <div class="form-container">
                <form class="register-form" action="login.php">
                    <div class="form-fields">
                        <div class="input-row">
                            <input type="text" placeholder="Digite o seu primeiro nome" name="primeiroNome" id="primeiroNome">
                            <input type="text" placeholder="Digite o seu sobrenome" name="sobrenome" id="sobrenome">
                        </div>

                        <div class="input-row">
                            <input type="text" placeholder="Digite o seu número de telefone" name="telefone" id="telefone">
                            <input type="text" placeholder="Digite o seu email" name="email" id="email">
                        </div>

                        <input type="text" placeholder="Digite o seu endereço" name="endereço" id="endereço">

                        <div class="password-container">
                            <input type="password" placeholder="Digite uma senha" class="full-width" name="senha" id="senha">
                            <button type="button" class="toggle-password"> <img src="../assets/images/visibility-off.svg"> </button>
                        </div>

                        <div class="password-container">
                            <input type="password" placeholder="Digite sua senha novamente" class="full-width" name="confirmarSenha" id="confirmarSenha">
                            <button type="button" class="toggle-password"> <img src="../assets/images/visibility-off.svg"> </button>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="terms">
                            <input type="checkbox" id="contrato" name="aceite" value="termos">
                            <label>Li e concordo com os <span class="text-contrast"><b>Termos de Uso</b></span> e a
                                <span class="text-contrast"><b>Política de Privacidade</b></span></label>
                        </div>

                        <button class="submit-form">Criar conta</button>

                        <div class="already-signed-in">
                            <p>Já possui uma conta? <a href="login.php">Entrar</a></p>
                        </div>

                        <div class="divider">
                            <div class="line"></div>
                            <span>Ou faça cadastro com</span>
                            <div class="line"></div>
                        </div>

                        <div class="register-apps">
                            <div class="app facebook"><img src="../assets/images/facebook-logo.webp"></div>
                            <div class="app google"><img src="../assets/images/google-logo.webp"></div>
                            <div class="app apple"><img src="../assets/images/apple-logo.png"></div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>
