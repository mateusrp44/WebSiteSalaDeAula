<?php
    class Validacoes
    {
        public function verifica_vazio($data, $fields)
        {
            $msg = null;
            foreach ($fields as $value) if (empty($data[$value])) $msg .= "<br> Campo $value não pode ser vazio";
            return $msg;
        }

        public function e_numeroInteiro($numeroInteiro)
        /* Retorna true ou false utilizando Expressão Regular se é um número inteiro válido
          Parâmetros:
          $numeroInteiro = Número Inteiro que deverá ser validado
        */
        {
            if (preg_match("/^[0-9]+$/", $numeroInteiro)) return true;
            return false;
        }

        public function e_numeroDecimal($numeroDecimal)
        /* Retorna true ou false utilizando Expressão Regular se é um número decimal válido
          Parâmetros:
          $numeroDecimal = Número Decimal que deverá ser validado
        */
        {
            if (preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $numeroDecimal)) return true;
            return false;
        }

        public function e_email($email)
        /* Retorna true ou false se é um email válido.
          Parâmetros:
          $email = email que deverá ser validado
        */
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
            return false;
        }

        public function data_Maior($datafim, $dataini)
        /*Retorna true ou false se a data final for menor que a inicial
          Parâmetros:
          $datafim = Data final a ser comparada
          $dataini = Data inicial a ser comparada
        */
        {
            $datainicio = new DateTime($dataini);
            $datafinal = new DateTime($datafim);
            if ($datafinal < $datainicio) return false;
            return true;
        }

        public function mensagem($titulo, $conteudo, $corBootstrap)
        /* Retorna uma mensagem dispensável (dismiss) utilizando o Bootstrap 4
          Parâmetros:
          $titulo = Título da Mensagem
          $conteudo = Conteúdo completo da Mensagem
          $corBootstrap = nome da cor no padrão Bootstrap. Ex: danger, warning, success, etc.
         */
        {
            return '<div class="row"><div class="col-md-6"><div class="alert alert-' . $corBootstrap . ' alert-dismissible fade show" role="alert"><strong>' . $titulo . '</strong> ' . $conteudo . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div></div>';
        }

        public function botaoVoltar($texto, $corBootstrap)
        /*Retorna um botão voltar com o Bootstrap 4
          Parâmetros:
          $texto = Texto do Botão
          $corBootstrap = nome da cor no padrão Bootstrap. Ex: danger, warning, success, etc.
        */
        {
            return '<a href="javascript:self.history.back();" class="btn btn-' . $corBootstrap . '"><i class="material-icons vertical-align-middle">reply</i> ' . $texto . '</a>';
        }

        public function botao($texto, $corBootstrap, $url, $iconeMaterial)
        /* Retorna um botão com o link e o ícone informado com o Bootstrap 4
          Parâmetros:
          $texto = Texto do Botão
          $corBootstrap = nome da cor no padrão Bootstrap. Ex: danger, warning, success, etc.
          $url = URL para qual o botão deve direcionar o usuário
          $iconeMaterial = Nome do ícone do Material Design. Para ter acesso a todos os ícones, acesse: https://material.io/tools/icons/
        */
        {
            return '<a href="' . $url . '" class="btn btn-' . $corBootstrap . '"><i class="material-icons vertical-align-middle">' . $iconeMaterial . '</i> ' . $texto . '</a>';
        }

        public function comparaSenha($senha, $comparacao)
        /* Retorna um booleano indicando se a senha e a confirmação são iguais 
          Parâmetros:
          $senha = Senha a ser comparada
          $comparacao = Texto a ser comparado com a senha
        */
        {
            return $senha == $comparacao;
        }
    }
?>