<?php include_once('cabecalho.php'); ?>
<?php
//Obtendo os dados do registro pelo ID
$id = $crud->limpaTexto($_SESSION['idUsuario']);
$resultado = $crud->getDados("SELECT nivel FROM usuario WHERE id=$id");
//Percorrendo os dados retornados
foreach ($resultado as $linha) $nivel = $linha['nivel'];
//Apagando o registro da tabela pelo ID
$result = $crud->apagar($id, 'usuario');
if ($nivel == 1) $result = $crud->apagar($id, 'professor');
else $result = $crud->apagar($id, 'aluno');
$result = $crud->apagar($id, 'disciplina');
$result = $crud->apagar($id, 'auxilio_disciplina_aluno');
if ($result)
{
    //Se o resultado for true...
    echo $validacoes->mensagem('Tudo Certo!', 'Registro removido com sucesso', 'success');
    echo $validacoes->botao('Ir para a Página de Acesso', 'success', 'index.php', 'reply');
    // Logout
    session_start();
    // Limpando as variáveis de sessão
    unset($_SESSION['emailUsuario']);
    unset($_SESSION['idUsuario']);
    // Destruindo a sessão corrente
    session_destroy();
    // Direcionando para a tela principal
    header('Location: index.php');
    exit;
}
else
{
    echo 'Erro ao excluir a conta!';
}
?>
<?php include_once('rodape.php');?>