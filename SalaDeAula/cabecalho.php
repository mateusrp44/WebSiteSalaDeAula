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
<?php
    //incluindo as classes necessárias
    include_once("classes/crud.php");
    include_once("classes/validacoes.php");
    //instanciando o objeto
    $crud = new Crud();
    $validacoes = new Validacoes();
?>
<?php
    $professor = 'edita-professor.php';
    $aluno = 'edita-aluno.php';
    if (isset($_SESSION['idUsuario'])) {
        $id = $crud->limpaTexto($_SESSION['idUsuario']);
        $resultado = $crud->getDados("SELECT nivel FROM usuario WHERE id=$id");
        //Percorrendo os dados retornados
        foreach ($resultado as $linha) $nivel = $linha['nivel'];
    }
?>
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
    <body>
        <!--Menu de Navegação Para ver outros exemplos de navbar, acesse: https://getbootstrap.com/docs/4.1/examples/navbars/-->
        <nav class="navbar navbar-expand-md navbar-dark" style="background: tan">
            <a class="navbar-brand">AppSalaAula</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Alternar Navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="menu.php"><i class="material-icons vertical-align-middle">home</i> Início <span class="sr-only">(atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="menuCadastros" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons vertical-align-middle">list</i> Cadastros</a>
                        <div class="dropdown-menu" aria-labelledby="menuCadastros">
                            <a class="dropdown-item" <?php echo ($nivel == 1) ? "href='disciplinas.php'" : "style='display: none'"; ?>><i class="material-icons vertical-align-middle">bookmarks</i> Disciplinas</a>
                            <a class="dropdown-item" <?php echo ($nivel == 1) ? "href='auxilio-disciplina-aluno.php'" : "style='display: none'"; ?>><i class="material-icons vertical-align-middle">bookmarks</i> Auxílios de Disciplinas para os(as) Alunos(as)</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="configuracoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons vertical-align-middle">build</i> Configurações</a>
                        <div class="dropdown-menu" aria-labelledby="configuracoes">
                            <a class="dropdown-item" href="<?php echo ($nivel == 1) ? $professor : $aluno; ?>"><i class='material-icons vertical-align-middle'>account_circle </i> Alterar Dados Pessoais</a>
                            <a class="dropdown-item" href="edita-email.php"><i class="material-icons vertical-align-middle">alternate_email </i> Alterar E-Mail</a>
                            <a class="dropdown-item" href="edita-senha.php"><i class="material-icons vertical-align-middle">vpn_key </i> Alterar Senha</a>
                            <a class="dropdown-item" href="apaga-usuario.php" onClick="return confirm('Confirma a exclusão da conta?')" class='btn btn-danger btn-sm' title='Apagar o registro corrente'><i class="material-icons vertical-align-middle">remove_circle </i> Excluir conta</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php"><i class="material-icons vertical-align-middle">power_settings_new</i> Encerrar sessão</a>
                    </li>
                </ul>
                <p class="text-light"><span id="hora"></span></p>
            </div>
        </nav>