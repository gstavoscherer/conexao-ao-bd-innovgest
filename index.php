<?php
session_start();

include_once("./config/config.php");

$mensagem = "";
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos do formulário foram enviados corretamente
    if (
        isset($_POST["nome"]) &&
        isset($_POST["telefone"]) &&
        isset($_POST["email"]) &&
        isset($_POST["senha"])
    ) {
        // Recupere os valores do formulário
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Hash da senha
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

        // Conexão com o banco de dados
        $conn = conectarBD();

        // Preparação da consulta SQL
        $sql = "INSERT INTO `usuarios` (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";

        try {
            // Prepara e executa a consulta
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $hashedPassword);
            $stmt->execute();
            
            $mensagem = "Usuário registrado com sucesso!";

            $_SESSION['mensagem'] = $mensagem;

            header("Location: login.php");
            exit();

        } catch (PDOException $e) {
            echo "Erro ao inserir usuário: " . $e->getMessage();
        }
    } else {
        echo "Todos os campos do formulário devem ser preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="./css/styleregister.css" rel="stylesheet">
    </link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS types</title>
</head>

<body>
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
                <button id="botaoDiv3"><img onclick="abrirPainel()" src="imagens/user.png" id="imgUser"></img></button>
           
            
                <a href="config.html"><img src="imagens/config.png" id="configImg"></a>
            
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
                        <div id="loginNome">
                            <input type="text" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div id="loginTelefone">
                            <input type="number" id="telefone" name="telefone" placeholder="Telefone"></input>
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