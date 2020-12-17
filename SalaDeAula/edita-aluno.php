<?php include_once("cabecalho.php"); ?>
<!--Carregando os dados para a alteração-->
<?php
    if (isset($_SESSION['idUsuario']))
    {
        //obtendo o ID da URL
        $id = $crud->limpaTexto($_SESSION['idUsuario']);
        
        //Selecionando os dados a partir do ID informado
        $resultado = $crud->getDados("SELECT * FROM aluno WHERE id=$id");
        
        //Percorrendo os dados retornados
        foreach ($resultado as $linha)
        {
            $id = $linha['id'];
            $nome_aluno = $linha['nome_aluno'];
            $data_nascimento = $linha['data_nascimento'];
            $necessidade_auxilio = $linha['necessidade_auxilio'];
        }
    }
?>
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">person_pin</i>Alteração de dados pessoais do(a) Aluno(a)</h5>
    <div class="card-body">
        <!-- Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/ -->
        <form action="valida-aluno.php" method="post" name="formAluno">
            
            <!--Código | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="id">Identificação:</label>
                <div class="col-md-2">
                    <input id="id" name="id" type="text" value="<?php echo $id ?>" class="form-control" readonly>
                </div>
            </div>

            <!--Nome do(a) Aluno(a) | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="nome_luno">Nome do(a) Aluno(a)*:</label>
                <div class="col-md-8">
                    <input id="nome_aluno" name="nome_aluno" type="text" placeholder="Nome completo" class="form-control" value="<?php echo $nome_aluno ?>">
                </div>
            </div>

            <!--Data de Nascimento | Date Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="data_nascimento">Data de nascimento*:</label>
                <div class="col-md-4">
                    <input id="data_nascimento" name="data_nascimento" type="date" placeholder="Dia, Mês e Ano" class="form-control" value="<?php echo $data_nascimento ?>">
                </div>
            </div>

            <!--Necessidade de Auxílio | Radio Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="necessidade_auxilio">Necessidade de auxílios*:</label>
                <div class="col-md-4">
                    <input type="radio" name="necessidade_auxilio" id="necessidade_auxilio1" value="1" required <?php echo ($necessidade_auxilio == "1") ? "checked" : null; ?>>
                    <label class="form-check-label" for="necessidade_auxilio1">Sim</label>
                    <input type="radio" name="necessidade_auxilio" id="necessidade_auxilio0" value="0" required <?php echo ($necessidade_auxilio == "0") ? "checked" : null; ?>>
                    <label class="form-check-label" for="necessidade_auxilio0">Não</label>
                </div>
            </div>

            <!--Botões-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="alterar"></label>
                <div class="col-md-8">
                    <button id="alterarEmail" type="submit" name="alterar" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Alterar</button>
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