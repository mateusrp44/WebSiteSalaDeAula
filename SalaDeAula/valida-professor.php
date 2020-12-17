<?php
//Verificando se o usuário está logado
if (empty($_SESSION)) session_start();
if (!isset($_SESSION['idUsuario']))
{
    // Se não tiver o id
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Carregando o CSS do Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Carregando a fonte Material Design para visualização dos ícones do Google Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Carregando a fonte Orbitron do Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <!-- CSS do Projeto -->
        <link href="css/estilo.css" rel="stylesheet">
        <!-- CSS do dataTable -->
        <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- CSS do jQueryUpload -->
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
        <!-- CSS do Editor de Texto jQuery TE -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.min.css" rel="stylesheet">
        <!-- Carregando as funções JS -->
        <script src="js/funcoes.js"></script>
        <!-- JS jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <!-- JS dataTable -->
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>	
        <!-- JS do jQueryUpload -->
        <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
        <!-- JS do Editor de Texto jQuery TE -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.min.js"></script>
        <!-- JS Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- JS do Masked -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: tan">
            <a class="navbar-brand">AppSalaAula</a>
        </nav>
        <?php
        //Carregando os arquivos necessários
        //incluindo as classes necessárias
        include_once("classes/validacoes.php");
        include_once ("classes/crud.php");
        //instanciando o objeto
        $validacoes = new Validacoes();
        $crud = new Crud();
        //O Isset verifica se veio o ID, pois na inclusão não existe.
        if (isset($_SESSION['idUsuario']))
            $id = $crud->limpaTexto($_SESSION['idUsuario']);

        $nome_prof = $crud->limpaTexto($_POST['nome_prof']);
        $data_nascimento = $crud->limpaTexto($_POST['data_nascimento']);

        $msg = $validacoes->verifica_vazio($_POST, array('nome_prof', 'data_nascimento'));

        // Verificando se existe algum campo vazio
        if ($msg != null) {
            echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):', $msg, 'danger');
            echo $validacoes->botaoVoltar('Voltar', 'danger');
        } else {
            // Caso todos os campos estejam ok...
            if (isset($_POST['salvar'])) {
                //efetua o insert no SGBD	
                $insert = $crud->executarSql("INSERT INTO professor(id, nome_prof, data_nascimento) VALUES ('$id', '$nome_prof', '$data_nascimento')");
                if ($insert) {
                    //exibe a mensagem de sucesso
                    echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                    echo $validacoes->botao('Ir para a Página Principal', 'success', 'menu.php', 'reply');
                }
            } else if (isset($_POST['alterar'])) {
                //efetua o update no SGBD
                $update = $crud->executarSql("UPDATE professor SET nome_prof='$nome_prof',data_nascimento='$data_nascimento' WHERE id=$id");
                if ($update) {//exibe a mensagem de sucesso		
                    echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>alterado</strong> com sucesso', 'success');
                    echo $validacoes->botao('Voltar para a Página Principal', 'success', 'menu.php', 'reply');
                }
            }
        }
        ?>
        <?php include_once 'rodape.php'; ?>