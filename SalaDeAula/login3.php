<?php
// Carregando a classe crud
include_once ("classes/crud.php");
// Instanciando o objeto
$crud = new Crud();
// Verificando se o controle de sessão está iniciado
if (empty($_SESSION)) session_start();
// Veio algo via POST no login?
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
// Apenas para teste
// echo "O email é ".$email." e a senha é ".$senha;
// Selecionando o usuário a partir dos dados
$select = $crud->getDados("select id, email, senha from usuario where email='$email'");
// Percorrendo os dados retornados
    foreach ($select as $linha)
    {
        $senhaCriptografada = $linha['senha'];
        $idUsuario = $linha['id'];
    }
    // A senha informada é igual a senha criptografada do banco?
    if (password_verify($senha, $senhaCriptografada))
    {
        $_SESSION['emailUsuario'] = $_POST['email'];
        $_SESSION['idUsuario'] = $idUsuario;
        header("Location: adiciona-aluno.php");
        // Direcionamos para o menu
        exit;
    }
    else
    {
        echo "<script>
        alert('Usuário ou senha inválidos!');
        location.href='index.php'; </script>";
    }
}