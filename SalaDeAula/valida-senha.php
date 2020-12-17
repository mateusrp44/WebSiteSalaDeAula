<?php include_once 'cabecalho.php'; ?>
<?php
//Carregando os arquivos necessários
//incluindo as classes necessárias
include_once("classes/crud.php");
include_once("classes/validacoes.php");
//instanciando o objeto
$crud = new Crud();
$validacoes = new Validacoes();
if (isset($_POST['id'])) $id = $crud->limpaTexto($_POST['id']);
//O Isset verifica se veio o ID, pois na inclusão não existe.
$email = $crud->limpaTexto($_POST['email']);
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT); //Criptografa a senha utilizando um hash aleatório
$msg = $validacoes->verifica_vazio($_POST, array('id', 'senha', 'confirma'));
$compara_senha = $validacoes->comparaSenha($senha, $confirma);
// Verificando se existe algum campo vazio
if ($msg != null) {
    echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):', $msg, 'danger');
    echo $validacoes->botaoVoltar('Voltar', 'danger');
} else if (!$compara_senha) {
    echo $validacoes->mensagem('Ops!', 'A senha e a confirmação da senha informadas são diferentes!', 'danger');
    echo $validacoes->botaoVoltar('Voltar', 'danger');
} else {
    if (isset($_POST['alterarSenha'])) {
        //efetua o update no SGBD
        $update = $crud->executarSql("UPDATE usuario SET senha='$senhaCriptografada' WHERE id=$id");
        if ($update) {//exibe a mensagem de sucesso
            echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>alterado</strong> com sucesso', 'success');
            echo $validacoes->botao('Voltar para a Página Principal', 'success', 'menu.php', 'reply');
        }
    }
}
?>
<?php include_once 'rodape.php'; ?>