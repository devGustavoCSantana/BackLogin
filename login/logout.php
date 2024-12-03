
<?php
/*
 * Logout do Sistema
 * Este código encerra a sessão do usuário e redireciona para a página inicial.
 * Deve ser utilizado em sistemas com autenticação para permitir que o usuário
 * realize logout de forma segura.
 */

// Verifica se a sessão já foi iniciada
if (!isset($_SESSION)) {
    // Inicia uma nova sessão, caso ainda não exista
    session_start();
}

/*
 * Destroi a sessão atual.
 * Isso remove todas as variáveis e dados armazenados na sessão,
 * garantindo que o usuário seja completamente desconectado.
 */
session_destroy();

/*
 * Redireciona o usuário para a página inicial (index.php).
 * Após o logout, o usuário será levado para a página inicial do sistema.
 */
header("Location: index.php");
?>
