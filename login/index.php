<?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Verifica se os campos 'email' ou 'senha' foram enviados via POST
if (isset($_POST['email']) || isset($_POST['senha'])) {

    // Verifica se o campo 'email' está vazio
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail"; // Mensagem de erro se o campo estiver vazio
    } 
    // Verifica se o campo 'senha' está vazio
    else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha"; // Mensagem de erro se o campo estiver vazio
    } 
    // Se ambos os campos foram preenchidos
    else {
        // Escapa os valores para evitar SQL Injection
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Cria a consulta SQL para buscar o usuário com o e-mail e senha fornecidos
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        // Executa a consulta SQL
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        // Conta o número de registros retornados pela consulta
        $quantidade = $sql_query->num_rows;

        // Verifica se encontrou exatamente um registro
        if ($quantidade == 1) {
            // Obtém os dados do usuário
            $usuario = $sql_query->fetch_assoc();

            // Inicia a sessão, caso ainda não tenha sido iniciada
            if (!isset($_SESSION)) {
                session_start();
            }

            // Armazena informações do usuário na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redireciona o usuário para o painel
            header("Location: painel.php");
        } 
        // Caso não encontre um usuário com as credenciais fornecidas
        else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Cabeçalho do formulário -->
    <h1>Acesse sua conta</h1>
    <!-- Formulário de login -->
    <form action="" method="POST">
        <p>
            <!-- Campo para o e-mail do usuário -->
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <!-- Campo para a senha do usuário -->
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <!-- Botão de envio do formulário -->
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>
