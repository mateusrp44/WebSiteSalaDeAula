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

                    <!-- Email | Email input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="email">Email*:</label>
                        <div class="col-md-8">
                            <input id="email" name="email" type="email" placeholder="Email do Usuário" class="form-control">    
                        </div>
                    </div>

                    <!-- Login | text input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="login">Login*:</label>
                        <div class="col-md-4">
                            <input id="login" name="login" type="text" placeholder="Login do Usuário" class="form-control" maxlength="20" required>    
                        </div>
                    </div>

                    <!--Professor ou Aluno | Radio input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tipoUsuario">Tipo de usuário*: </label>
                        <div class="col-md-4">
                            <input type="radio" name="radioAlunoProfessor" id="radioProfessor" required value="1">
                            <label class="form-check-label" for="tipoUsuarioProfessor">Professor</label>
                            <input type="radio" name="radioAlunoProfessor" id="radioAluno" required value="2">    
                            <label class="form-check-label" for="tipoUsuarioAluno">Aluno</label>
                            <input type="text" id="inputProfessor" name="inputProfessor" placeholder="Registro de Funcionário(a)" style="display: none" onclick="alunoProfessor(this)">
                            <input type="text" id="inputAluno" name="inputAluno" placeholder="Registro de Aluno(a)" style="display: none" onclick="alunoProfessor(this)">
                        </div>
                    </div>

                    <!-- Nivel | Text Input -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="nivel">Nível*:</label>
                        <div class="col-md-4">
                            <input id="nivel" name="nivel" type="text" placeholder="Nível do usuário" class="form-control" required>
                        </div>
                    </div>

                    <!-- Senha | Password input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="senha">Senha*:</label>
                        <div class="col-md-4">
                            <input id="senha" name="senha" type="password" placeholder="Senha do Usuário" class="form-control" required>    
                        </div>
                    </div>

                    <!-- Confirmação da Senha | Password input-->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="confirma">Confirmação da Senha*:</label>
                        <div class="col-md-4">
                            <input id="confirma" name="confirma" type="password" placeholder="Confirmação da Senha do Usuário" class="form-control" required>
                        </div>
                    </div>

                    <!--  Botões -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="salvar"></label>
                        <div class="col-md-8">
                            <button id="salvar" type="submit" name="salvar" class="btn btn-success">
                                <i class="material-icons vertical-align-middle">save</i> Salvar
                            </button>
                            <a href="index.php" id="cancelar" name="cancelar" class="btn btn-danger">
                                <i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-info">
                Campos marcados com * são de preenchimento obrigatório
            </div>
        </div>
        <?php include_once("rodape.php"); ?>