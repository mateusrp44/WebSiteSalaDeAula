<!DOCTYPE html>
<html>
    <head>
        <title>AppSalaAula</title>
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
    <body onload="alunoProfessor()">
        <!--Menu de Navegação Para ver outros exemplos de navbar, acesse: https://getbootstrap.com/docs/4.1/examples/navbars/-->
        <nav class="navbar navbar-expand-md navbar-dark" style="background: tan">
            <a class="navbar-brand">AppSalaAula</a>
        </nav>
        <div class="card border-info">
            <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Inclusão de Usuários</h5>
            <div class="card-body">
                <!-- Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/ -->
                <form action="valida-usuario.php" method="post" name="formUsuario">
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
                    $login = $crud->limpaTexto($_POST['login']);
                    $email = $crud->limpaTexto($_POST['email']);
                    $documento = $crud->limpaTexto($_POST['radioAlunoProfessor']);
                    $nivel = $crud->limpaTexto($_POST['nivel']);
                    $senha = $crud->limpaTexto($_POST['senha']);
                    $confirma = $crud->limpaTexto($_POST['confirma']);
                    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT); //Criptografa a senha utilizando um hash aleatório

                    $msg = $validacoes->verifica_vazio($_POST, array('senha', 'confirma'));
                    $verifica_email = $validacoes->e_email($email);
                    $compara_senha = $validacoes->comparaSenha($senha, $confirma);

                    // Verificando se existe algum campo vazio
                    if ($msg != null) {
                        echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):', $msg, 'danger');
                        echo $validacoes->botaoVoltar('Voltar', 'danger');
                    } else if (!$verifica_email) {
                        echo $validacoes->mensagem('Ops!', 'O email informado é inválido!', 'danger');
                        echo $validacoes->botaoVoltar('Voltar', 'danger');
                    } else if (!$compara_senha) {
                        echo $validacoes->mensagem('Ops!', 'A senha e a confirmação da senha informadas são diferentes!', 'danger');
                        echo $validacoes->botaoVoltar('Voltar', 'danger');
                    } else {
                        // Caso todos os campos estejam ok...
                        if (isset($_POST['salvar'])) {
                            //efetua o insert no SGBD	
                            $insert = $crud->executarSql("INSERT INTO usuario(login, email, senha, nivel, documento) VALUES ('$login', '$email', '$senhaCriptografada', '$nivel', '$documento')");
                            if ($insert) {
                                //exibe a mensagem de sucesso
                                echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                                if ($nivel == 1) {
                                    echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                                    echo $validacoes->botao('Cadastrar professor', 'success', 'adiciona-professor.php', 'reply');
                                    include_once 'login2.php';
                                } else {
                                    echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                                    echo $validacoes->botao('Cadastrar aluno', 'success', 'adiciona-aluno.php', 'reply');
                                    include_once 'login3.php';
                                }
                            }
                        }
                    }
                    ?>
                    <?php include_once 'rodape.php'; ?>