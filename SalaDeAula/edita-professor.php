<?php include_once 'cabecalho.php'; ?>
<?php
    if (isset($_SESSION['idUsuario']))
    {
        //obtendo o ID da URL
        $id = $crud->limpaTexto($_SESSION['idUsuario']);
        //Selecionando os dados a partir do ID informado
        $resultado = $crud->getDados("SELECT * FROM professor WHERE id=$id");
        //Percorrendo os dados retornados
        foreach ($resultado as $linha)
        {
            $id = $linha['id'];
            $nome_prof = $linha['nome_prof'];
            $data_nascimento = $linha['data_nascimento'];
        }
    }
?>
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Alteração de dados pessoais do(a) Professor(a)</h5>
    <div class="card-body">

        <!-- Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/ -->
        <form action="valida-professor.php" method="post" name="formProfessor" >

            <!--Código | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="id">Identificação:</label>
                <div class="col-md-2">
                    <input id="id" name="id" type="text" value="<?php echo $id ?>" class="form-control" readonly>
                </div>
            </div>

            <!--Nome | Text input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="nome_prof">Nome do(a) Professor(a)*:</label>
                <div class="col-md-8">
                    <input id="nome_prof" name="nome_prof" type="text" placeholder="Nome completo" class="form-control" required value="<?php echo $nome_prof ?>">
                </div>
            </div>

            <!--Data de Nascimento | Date input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="data_nascimento">Data de Nascimento*:</label>
                <div class="col-md-4">
                    <input id="data_nascimento" name="data_nascimento" type="date" class="form-control" required value="<?php echo $data_nascimento ?>">
                </div>
            </div>

            <!--Botões-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="alterar"></label>
                <div class="col-md-8">
                    <button id="salvar" type="submit" name="alterar" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Salvar</button>
                    <a href="menu.php" id="cancelar" name="cancelar" class="btn btn-danger" class="btn btn-danger"><i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-info">
        Campos marcados com * são de preenchimento obrigatório
    </div>
</div>
<?php include_once 'rodape.php'; ?>