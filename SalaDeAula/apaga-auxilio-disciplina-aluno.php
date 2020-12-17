<?php include_once('cabecalho.php'); ?>
<?php
    //Obtendo os dados do registro pelo ID
    $id = $crud->limpaTexto($_GET['id']);
    //Apagando o registro da tabela pelo ID
    $result = $crud->apagar($id, 'auxilio_disciplina_aluno');
    if ($result)
    {
        //Se o resultado for true...
        echo $validacoes->mensagem('Tudo Certo!','Registro removido com sucesso','success');
        echo $validacoes->botao('Voltar para a Listagem', 'success', 'auxilio-disciplina-aluno.php', 'reply');
    }
?>
<?php include_once('rodape.php');?>