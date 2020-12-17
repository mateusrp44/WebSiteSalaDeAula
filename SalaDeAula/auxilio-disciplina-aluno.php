<?php include_once('cabecalho.php'); ?>
<?php
    //obtendo os dados em ordem descendente
    $id = $crud->limpaTexto($_SESSION['idUsuario']);
    $resultado = $crud->getDados("SELECT `auxilio_disciplina_aluno`.`id`, `auxilio_disciplina_aluno`.`id_disciplina`, `auxilio_disciplina_aluno`.`topico`, `auxilio_disciplina_aluno`.`descricao`,`auxilio_disciplina_aluno`.`data` FROM `auxilio_disciplina_aluno` WHERE `auxilio_disciplina_aluno`.`id_disciplina` IN (SELECT `disciplina`.`id` FROM `disciplina` WHERE `disciplina`.`id_prof`='$id')");
?>
<!--Card-->
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">bookmarks</i> Listagem de Notas de Auxílios aos Alunos(as)</h5>
</div>
<?php echo $validacoes->botao('Novo Registro', 'primary', 'adiciona-auxilio-disciplina-aluno.php', 'note_add'); ?>
<br><br>
<!--Tabela-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-sm" id="tabelaDisciplina">
                <thead>
                    <tr class="table-info">
                        <th>ID</th>
                        <th>ID da Disciplina</th>
                        <th>Nome da Disciplina</th>
                        <th>Tópico</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                        foreach ($resultado as $key => $linha)
                        {
                            echo "<tr>";
                            echo "<td>" . $linha['id'] . "</td>";
                            echo "<td>" . $linha['id_disciplina'] . "</td>";
                            echo "<td>" . $linha['nome_disciplina'] . "</td>";
                            echo "<td>" . $linha['topico'] . "</td>";
                            echo "<td>" . $linha['descricao'] . "</td>";
                            echo "<td>" . $linha['data'] . "</td>";
                            echo "<td>
                                                                <a href=\"edita-auxilio-disciplina-aluno.php?id=$linha[id]\" class='btn btn-warning btn-sm' title='Editar o registro corrente'><i class='material-icons vertical-align-middle'>edit</i> Editar</a>
                                                                <a href=\"apaga-auxilio-disciplina-aluno.php?id=$linha[id]\" onClick=\"return confirm('Confirma a exclusão do registro?')\" class='btn btn-danger btn-sm' title='Apagar o registro corrente'><i class='material-icons vertical-align-middle'>delete</i>Apagar</a></td>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            /*Configurações para o Datatable na Tabela*/
            $(document).ready(function () {
                $('#tabelaDisciplina').DataTable({
                    "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
                });
            });
        </script>
    </div>
</div>
<?php include_once('rodape.php'); ?>