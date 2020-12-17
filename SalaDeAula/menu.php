<?php include_once 'cabecalho.php'; ?>
<?php
    //obtendo os dados em ordem descendente
    $id = $crud->limpaTexto($_SESSION['idUsuario']);
    $resultado = $crud->getDados("SELECT `auxilio_disciplina_aluno`.`id`, `auxilio_disciplina_aluno`.`id_disciplina`, `auxilio_disciplina_aluno`.`topico`, `auxilio_disciplina_aluno`.`descricao`,`auxilio_disciplina_aluno`.`data` FROM `auxilio_disciplina_aluno` WHERE `auxilio_disciplina_aluno`.`id_disciplina` IN (SELECT `disciplina`.`id` FROM `disciplina` WHERE `disciplina`.`id_prof`='$id')");
?>
<!--Fonte Coming Soon-->
<link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
<!--Jumbotron-->
<div class="jumbotron-fluid">
    <div class="container">
        <h1 class="display-4" style="font-family: 'Coming Soon', cursive">AppSalaAula</h1>
        <p class="lead" style="font-family: 'Coming Soon', cursive">Seja bem vindo! </p>
        <p class="lead" style="font-family: 'Coming Soon', cursive">Utilize o <strong>menu </strong>acima para cadastrar os professores, alunos, disciplinas e muito mais! </p>
    </div>
</div>
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
<?php include_once 'rodape.php'; ?>