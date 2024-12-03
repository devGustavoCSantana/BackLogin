<?php
// Configurações de conexão com o banco de dados
$usuario = 'root'; // Usuário do banco de dados (default para MySQL é 'root')
$senha = '';       // Senha do banco de dados (default para MySQL é vazio em ambientes locais)
$database = 'logins'; // Nome do banco de dados a ser acessado
$host = 'localhost';  // Host onde o banco está rodando (geralmente 'localhost' em ambientes locais)

// Cria uma nova conexão com o banco de dados usando a classe mysqli
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verifica se houve algum erro ao tentar conectar ao banco de dados
if($mysqli->error) {
    // Exibe uma mensagem de erro e interrompe a execução do script
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>
