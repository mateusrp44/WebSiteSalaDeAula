<?php include_once 'cabecalho.php'; ?>
<?php
    //Carregando os arquivos necessários.
    include_once("classes/validacoes.php");
    include_once("classes/crud.php");
    
    //Instanciando os objetos a partir das classes.
    $validacoes = new Validacoes();
    $crud = new Crud();
    if(isset($_POST['id'])) $id = $crud->limpaTexto($_POST['id']);
    
    //O Isset verifica se veio o ID, pois na inclusão não existe.
    $id_disciplina = $crud->limpaTexto($_POST['id_disciplina']);
    $topico = $crud->limpaTexto($_POST['topico']);
    $descricao = $crud->limpaTexto($_POST['descricao']);
    $data = $crud->limpaTexto($_POST['data']);
    
    $msg = $validacoes->verifica_vazio($_POST, array('id_disciplina', 'topico', 'descricao', 'data'));

    //Verificando se existe algum campo vazio.
    if ($msg != null)
    {
        echo $validacoes->mensagem('Ops! Ocorreram o(s) seguinte(s) problema(s):', $msg, 'danger');
        echo $validacoes->botaoVoltar('Voltar', 'danger');
    }
    else
    {
        //Caso todos os campos estejam ok.
        if (isset($_POST['salvar']))
        {
            //Efetua o insert no SGBD.
            $insert = $crud->executarSql("INSERT INTO auxilio_disciplina_aluno (id_disciplina, topico, descricao, data) VALUES ('$id_disciplina', '$topico', '$descricao', '$data')");
            if ($insert)
            {
                //Exibe a mensagem de sucesso.
                echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>inserido</strong> com sucesso', 'success');
                echo $validacoes->botao('Voltar para a listagem', 'success', 'auxilio-disciplina-aluno.php', 'reply');
            }
        }
        else if (isset($_POST['alterar']))
        {
            //Efetua o update no SGBD.
            $update = $crud->executarSql("UPDATE auxilio_disciplina_aluno SET id='$id', id_disciplina='$id_disciplina', topico='$topico', descricao='$descricao', data='$data' WHERE id=$id");
            if ($update)
            {
                //Exibe a mensagem de sucesso.
                echo $validacoes->mensagem('Tudo Certo!', 'Registro <strong>alterado</strong> com sucesso', 'success');
                echo $validacoes->botao('Voltar para a listagem', 'success', 'auxilio-disciplina-aluno.php', 'reply');
            }
        }
    }
?>
<?php include_once ('rodape.php'); ?>