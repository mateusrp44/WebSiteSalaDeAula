<?php include_once('cabecalho.php'); ?>
<!--Carregando os dados para a alteração-->
<?php
    if(isset($_GET['id']))
    {
        //obtendo o ID da URL
        $id_prof = $crud->limpaTexto($_GET['id']);
        //Selecionando os dados a partir do ID informado
        $resultado = $crud->getDados("SELECT * FROM disciplina WHERE id=$id_prof");
        //Percorrendo os dados retornados
        foreach ($resultado as $linha)
        {
            $id = $linha['id'];
            $nome_disciplina = $linha['nome_disciplina'];
            $duracao = $linha['duracao'];
            $aplicada = $linha['aplicada'];
            $id_prof = $linha['id_prof'];
        }
    }
?>
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">bookmarks</i> Alteração de Disciplina</h5>
    <div class="card-body">
        <!--Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/-->
        <form action="valida-disciplina.php" method="post" name="formDisciplina">
            <!--Nome | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="nome">Nome da Disciplina*:</label>
                <div class="col-md-8">
                    <input id="nome_disciplina" name="nome_disciplina" type="text" placeholder="Do que se trata a Disciplina" class="form-control" required value="<?php echo $nome_disciplina ?>">
                </div>
            </div>

            <!--Duração | Text input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="duracao">Duração*:</label>
                <div class="col-md-2">
                    <input id="duracao" name="duracao" type="time" placeholder="Tempo da aula" class="form-control" required value="<?php echo $duracao ?>">
                </div>
            </div>

            <!--Aplicada | Radio input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="aplicada">Aplicada*:</label>
                <div class="col-md-4">
                    <input type="radio" name="aplicada" id="aplicada1" value=1 required <?php echo ($aplicada == "1") ? "checked" : null; ?>>
                    <label class="form-check-label" for="aplicada1">Sim</label>
                    <input type="radio" name="aplicada" id="aplicada0" value=0 required <?php echo ($aplicada == "0") ? "checked" : null; ?>>
                    <label class="form-check-label" for="aplicada0">Não</label>
                </div>
            </div>

            <!--Professor da Disciplina | Text input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="id_prof">Professor da Disciplina*:</label>
                <div class="col-md-8">
                    <select id="id_prof" name="id_prof" class="col-md-6 form-control">
                        <option value="">Selecione...</option>
                            <?php
                                foreach ($resultado as $key => $linha) echo "<option value='" . $linha['id_prof'] . "'>" . "ID: " . $linha['id_prof'] . " - Nome: " . $linha['nome_prof'] . "</option>";
                            ?>
                    </select>
                </div>
            </div>

            <!--Botões-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="salvar"></label>
                <div class="col-md-8">
                    <button id="salvar" type="submit" name="alterar" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Alterar</button>
                    <a href="disciplinas.php" id="cancelar" name="cancelar" class="btn btn-danger" class="btn btn-danger"><i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-info">
        Campos marcados com * são de preenchimento obrigatório
    </div>
</div>
<?php include_once("rodape.php"); ?>