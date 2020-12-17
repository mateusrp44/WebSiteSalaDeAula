<?php include_once('cabecalho.php'); ?>
<?php
    if(isset($_SESSION['idUsuario']))
    {
        //Obtendo o ID da URL
        $id = $crud->limpaTexto($_SESSION['idUsuario']);
        $query = ("SELECT `disciplina`.`id` AS `id_disciplina`, `disciplina`.`nome_disciplina`, `disciplina`.`id_prof` FROM `disciplina` WHERE `disciplina`.`id_prof`='$id'");
        $resultado = $crud->getDados($query);
        foreach ($resultado as $linha) $id_disciplina = $linha['id_disciplina'];
    }
?>
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">bookmarks</i> Inclusão de Notas de Auxíĺios da Disciplina ao Aluno(a)</h5>
    <div class="card-body">
        
        <!--Formulário gerado em https://bloggify.github.io/bootstrap-form-builder/-->
        <form action="valida-auxilio-disciplina-aluno.php" method="post" name="formAuxilioDisciplinaAluno">
            
            <!--ID da Disciplina | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="id_disciplina">ID da Disciplina*:</label>
                <div class="col-md-8">
                    <select id="id_disciplina" name="id_disciplina" class="col-md-6 form-control">
                        <option value="">Selecione...</option>
                            <?php
                                foreach ($resultado as $key => $linha) echo "<option value='" . $linha['id_disciplina'] . "'>" . "ID: " . $linha['id_disciplina'] . " - Nome: " . $linha['nome_disciplina'] . "</option>";
                            ?>
                    </select>
                </div>
            </div>
            
            <!--Tópico | Text Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="topico">Tópico*:</label>
                <div class="col-md-8">
                    <input id="topico" name="topico" placeholder="Do que se trata a postagem" class="form-control" required>
                </div>
            </div>
            
            <!--Descrição | Text input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="descricao">Descrição*:</label>
                <div class="col-md-8">
                    <textarea id="descricao" name="descricao" placeholder="Descrição da postagem" class="form-control" required></textarea>
                </div>
            </div>
            
            <!--Data | Date Input-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="data">Data*:</label>
                <div class="col-md-2">
                    <input id="data" name="data" type="date" placeholder="Dia, Mês e Ano" class="form-control">
                </div>
            </div>
            
            <!--File Button | File Button-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="filebutton">Anexo:</label>
                <div class="col-md-8">
                    <input id="filebutton" name="filebutton" class="input-file" type="file">
                </div>
            </div>
            
            <!--Botões-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="salvar"></label>
                <div class="col-md-8">
                    <button id="salvar" type="submit" name="salvar" class="btn btn-success"><i class="material-icons vertical-align-middle">save</i> Salvar</button>
                    <a href="auxilio-disciplina-aluno.php" id="cancelar" name="cancelar" class="btn btn-danger" class="btn btn-danger"><i class="material-icons vertical-align-middle">reply</i> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer text-info">
        Campos marcados com * são de preenchimento obrigatório
    </div>
</div>
<?php include_once("rodape.php"); ?>