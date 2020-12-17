<?php include_once 'cabecalho.php'; ?>
<?php
    //Carregando os arquivos necessários
    include_once("classes/validacoes.php");
    include_once ("classes/crud.php");
    //Instanciando os objetos a partir das classes
    $validacoes = new Validacoes();
    $crud = new Crud();
    if (isset($_POST['id'])) $id = $crud->limpaTexto($_POST['id']);
    //O Isset verifica se veio o ID, pois na inclusão não existe.
    $nome_disciplina = $crud->limpaTexto($_POST['nome_disciplina']);
    $duracao = $crud->limpaTexto($_POST['duracao']);
    $aplicada = $crud->limpaTexto($_POST['aplicada']);
    $id_prof = $crud->limpaTexto($_POST['id_prof']);

    $msg = $validacoes->verifica_vazio($_POST, array('nome_disciplina', 'duracao'));

    // Verificando se existe algum campo vazio
    if ($msg != null)
    {
        echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):', $msg, 'danger');
        echo $validacoes->botaoVoltar('Voltar', 'danger');
    }
    else
    {
        // Caso todos os campos estejam ok...
        if (isset($_POST['salvar']))
        {
            //efetua o insert no SGBD
            $insert = $crud->executarSql("INSERT INTO disciplina (nome_disciplina, duracao, aplicada, id_prof) VALUES ('$nome_disciplina', '$duracao', '$aplicada', '$id_prof')");
            if ($insert)
            {
                //exibe a mensagem de sucesso
                echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                echo $validacoes->botao('Voltar para a listagem', 'success', 'disciplinas.php', 'reply');
            }
        }
        else if (isset($_POST['alterar']))
        {
            //efetua o update no SGBD	
            $update = $crud->executarSql("UPDATE disciplina SET nome_disciplina='$nome_disciplina',duracao='$duracao', aplicada='$aplicada' WHERE id=$id");
            if ($update)
            {//exibe a mensagem de sucesso		
                echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>alterado</strong> com sucesso', 'success');
                echo $validacoes->botao('Voltar para a listagem', 'success', 'disciplinas.php', 'reply');
            }
        }
    }
?>
<?php include_once 'rodape.php'; ?>