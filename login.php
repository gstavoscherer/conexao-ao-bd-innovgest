<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="./css/stylelogin.css" rel="stylesheet">
    </link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS types</title>
</head>

<body>
    <?php
    // Verifica se há uma mensagem na sessão
    if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        echo "<p>{$mensagem}</p>";

        // Remove a mensagem da sessão para não exibi-la novamente
        unset($_SESSION['mensagem']);
    }
    ?>
    <header>
        <div id="div01header">
            <nav>
                <a href="index.html"><img src="imagens/InnovGest_B+-2.png" id="logo"></a>
            </nav>
        </div>
        <div id="div02header">
            <div id="nomeBarbeiro">
                <h1>Barber SHOP</h1>
            </div>
        </div>
        <div id="div03header">
            <div>
                <button id="botaoDiv3"><img onclick="abrirPainel()" src="imagens/user.png" id="imgUser"></img></button>
            </div>
            <div>
                <a href="config.html"><img src="imagens/config.png" id="configImg"></a>
            </div>
        </div>
    </header>
    <main>
        <div id="container">
            <div id="aba">
                <div id="abasup01">

                </div>
                <div id="abasup02">

                </div>
                <div id="abareal">
                    <a id="pabareal01" href="login.php">
                        Login
                    </a>
                    <a id="pabareal02" href="index.php">
                        Registrar
                    </a>
                    <img id="abarealimg" src="imagens/X.png" onclick="fecharPainel()">
                </div>
            </div>
            <div class="foraLogin">
                <form action="index.php" method="post">
                    <div id="login">
                        <div id="loginEntrar">
                            <img src="imagens/logobarb.jpg">
                        </div>
                        
                        <div id="loginEmail">
                            <input type="text" id="email" name="email" placeholder="E-mail">

                        </div>
                        <div id="loginPassbox">
                            <input type="password" id="loginSenha" name="senha" placeholder="Senha">
                            <a id="loginForgotPassword" href="forgotpassword.html">Esqueceu?</a>
                        </div>
                        <div id="loginEntrar">
                            <button id="loginEntrarBotao" type="submit">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div id="div01footer">
            <div id="div01footerVolte">
                <a href="#TOP">
                    Voltar ao início
                </a>
            </div>
        </div>
        <div id="div02footer">
            © 2024 InnovGest
        </div>
        <div id="div03footer">
            <p>
                Made by
            </p>
            <img src="imagens/InnovGest.png">
        </div>
    </footer>
    <script src="./js/register.js"></script>
</body>

</html>