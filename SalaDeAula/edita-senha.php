<?php include_once("cabecalho.php"); ?>
<!--Carregando os dados para a alteração-->
<?php
if (isset($_SESSION['idUsuario'])) {
    //obtendo o ID da URL
    $id = $crud->limpaTexto($_SESSION['idUsuario']);
    //Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("SELECT senha FROM usuario WHERE id=$id");
    //Percorrendo os dados retornados
    foreach ($resultado as $linha) $senhaCriptografada = $linha['senha'];
}
?>

<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Alteração de Senha</h5>
    <div class="card-body">
        <!--Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/-->
        <form action="valida-senha.php" method="post" name="formSenha">

            <!--Código | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="nome">Identificação:</label>
                <div class="col-md-2">
                    <input id="id" name="id" type="text" value="<?php echo $id ?>" class="form-control" readonly>        
                </div>
            </div>

            <!--Senha | Password Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="senha">Nova senha*:</label>
                <div class="col-md-4">
                    <input id="senha" name="senha" type="password" placeholder="Senha do Usuário" class="form-control">    
                </div>
            </div>

            <!--Confirmação da Senha | Password input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="confirma">Confirmação da nova senha*:</label>
                <div class="col-md-4">
                    <input id="confirma" name="confirma" type="password" placeholder="Confirmação da Senha do Usuário" class="form-control" required>    
                </div>
            </div>

            <!--Botões-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="alterarSenha"></label>
                <div class="col-md-8">
                    <button id="alterarSenha" type="submit" name="alterarSenha" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Alterar</button>
                    <a href="menu.php" id="cancelar" name="cancelar" class="btn btn-danger" class="btn btn-danger"><i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-info">
        Campos marcados com * são de preenchimento obrigatório
    </div>
</div>
<?php include_once("rodape.php"); ?>