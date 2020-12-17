<?php include_once ('cabecalho.php'); ?>
<?php
    //obtendo os dados em ordem descendente
    $id = $crud->limpaTexto($_SESSION['idUsuario']);
    $query = "SELECT `disciplina`.`id`, `disciplina`.`nome_disciplina`, `disciplina`.`duracao`, if(aplicada=1,'Sim','Não') as `aplicada`, `disciplina`.`id_prof` FROM `disciplina` WHERE `disciplina`.`id_prof`='$id' ORDER BY `disciplina`.`id` DESC ";
    $resultado = $crud->getDados($query);
?>
<!--Card-->
<div class="card border-info">
    <h5 class="card-header"><i class="material-icons vertical-align-middle">bookmarks</i> Listagem de Disciplinas</h5>
</div>
<?php echo $validacoes->botao('Novo Registro', 'primary', 'adiciona-disciplina.php', 'note_add'); ?>	
<br><br>
<!-- Tabela -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-sm" id="tabelaDisciplina">
                <thead>
                    <tr class="table-info">
                        <th>ID</th>
                        <th>Nome da Disciplina</th>
                        <th>Duração</th>
                        <th>Aplicada</th>
                        <th>ID do(a) Professor(a)</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                        foreach ($resultado as $key => $linha)
                        {
                            echo "<tr>";
                            echo "<td>" . $linha['id'] . "</td>";
                            echo "<td>" . $linha['nome_disciplina'] . "</td>";
                            echo "<td>" . $linha['duracao'] . "</td>";
                            echo "<td>" . $linha['aplicada'] . "</td>";
                            echo "<td>" . $linha['id_prof'] . "</td>";
                            echo "<td>
                                                            <a href=\"edita-disciplina.php?id=$linha[id]\" class='btn btn-warning btn-sm' title='Editar o registro corrente'><i class='material-icons vertical-align-middle'>edit</i> Editar</a>
                                                            <a href=\"apaga-disciplina.php?id=$linha[id]\" onClick=\"return confirm('Confirma a exclusão do registro?')\" class='btn btn-danger btn-sm' title='Apagar o registro corrente'><i class='material-icons vertical-align-middle'>delete</i>Apagar</a></td>";
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
<?php include_once ('rodape.php'); ?>