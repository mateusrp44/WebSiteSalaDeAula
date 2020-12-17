<?php include_once("cabecalho.php"); ?>
<!--Carregando os dados para a alteração-->
<?php
if (isset($_SESSION['idUsuario'])) {
    //obtendo o ID da URL
    $id = $crud->limpaTexto($_SESSION['idUsuario']);
    //Selecionando os dados a partir do ID informado
    $resultado = $crud->getDados("SELECT email FROM usuario WHERE id=$id");
    //Percorrendo os dados retornados
    foreach ($resultado as $linha) {
        $email = $linha['email'];
    }
}
?>
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Alteração de E-Mail</h5>
    <div class="card-body">
        <!-- Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/ -->
        <form action="valida-email.php" method="post" name="formUsuario" >

            <!-- Código | Text input -->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="nome">Identificação:</label>
                <div class="col-md-2">
                    <input id="id" name="id" type="text" value="<?php echo $id ?>" class="form-control" readonly>        
                </div>
            </div>

            <!-- Email | Email Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="email">E-Mail*:</label>
                <div class="col-md-8">
                    <input id="email" name="email" type="email" placeholder="Email do Usuário" class="form-control" value="<?php echo $email ?>">    
                </div>
            </div>

            <!-- Senha | Password Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="senha">Senha*:</label>
                <div class="col-md-4">
                    <input id="senha" name="senha" type="password" placeholder="Senha do Usuário" class="form-control">    
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
                <label class="col-md-2 col-form-label" for="alterarEmail"></label>
                <div class="col-md-8">
                    <button id="alterarEmail" type="submit" name="alterarEmail" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Alterar</button>
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