<?php
// Verificando se o usuário está logado
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
        </nav>
        <div class="card border-info">
            <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Inclusão de Professores</h5>
            <div class="card-body">
                
                <!-- Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/ -->
                <form action="valida-professor.php" method="post" name="formProfessor" >
                    <!--Nome | Text input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="nome_prof">Nome do(a) Professor(a)*:</label>
                        <div class="col-md-8">
                            <input id="nome_prof" name="nome_prof" type="text" placeholder="Nome completo" class="form-control" required>
                        </div>
                    </div>

                    <!--Data de Nascimento | Date input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="data_nascimento">Data de Nascimento*:</label>
                        <div class="col-md-4">
                            <input id="data_nascimento" name="data_nascimento" type="date" class="form-control" required>
                        </div>
                    </div>

                    <!--Botões-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="salvar"></label>
                        <div class="col-md-8">
                            <button id="salvar" type="submit" name="salvar" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Salvar</button>
                            <a href="adiciona-usuario.php" id="cancelar" name="cancelar" class="btn btn-danger" class="btn btn-danger"><i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-info">
                Campos marcados com * são de preenchimento obrigatório
            </div>
        </div>
        <?php include_once("rodape.php"); ?>