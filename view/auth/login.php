<?php ?>
<head>
    <meta charset="UTF-8">
    <title>Página de login</title>

    <link rel="stylesheet" href="../../assets/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="logo-container">
    <img src="../../assets/images/logo.png">
</div>

<div class="page-container">
    <div class="register-container">
        <div class="form-heading">
            <h1 class="form-title">Bem-vindo de volta</h1>
            <p class="form-subtitle">Entre e aproveite as melhores ofertas</p>
        </div>

        <div class="form-container">
            <form class="register-form" action="login.php">
                <div class="form-fields">
                    <div class="input-row">
                        <div class="field-group">
                            <p>Email/Telefone</p>
                            <input type="text" placeholder="joaosilva@gmail.com" name="email/phone" id="email/phone">
                        </div>

                    </div>

                    <div class="field-group">
                        <p>Senha</p>
                        <div class="password-container">
                            <input type="password" placeholder="Insira sua senha" class="full-width" name="confirmarSenha" id="confirmarSenha">
                            <button type="button" class="toggle-password"> <img src="../../assets/images/visibility-off.svg"> </button>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="terms">
                        <input type="checkbox" class="keep-logged">
                        <label>Mantenha-me logado</span></label>
                    </div>

                    <button class="submit-form">Login</button>

                    <div class="already-signed-in">
                        <p>Não tem uma conta?<a href="sign-up.php" class="text-contrast"><b> Cadastre-se</b></a></p>
                    </div>

                    <div class="divider">
                        <div class="line"></div>
                        <span>Ou faça login com</span>
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

    <div class="login-image">
        <img src="../../assets/images/grocery-app.avif">
    </div>
</div>


</body>

