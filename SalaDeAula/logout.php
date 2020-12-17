<?php
// Logout
session_start();
// Limpando as variáveis de sessão
unset($_SESSION['emailUsuario']);
unset($_SESSION['idUsuario']);
// Destruindo a sessão corrente
session_destroy();
// Direcionando para a tela principal
header ('Location: index.php');
exit;
?>