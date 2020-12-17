<?php
    class database
    {
        private $_servidor = '';/*Nome ou Endereço IP do servidor*/
        private $_usuario = '';/*Nome do usuário no Banco de Dados*/
        private $_senha = '';/*Senha do Banco de Dados*/
        private $_database = '';/*Nome do Banco de Dados*/
        protected $connection;

        public function __construct()
        {
            if (!isset($this->connection))
            {
                $this->connection = new mysqli($this->_servidor, $this->_usuario, $this->_senha, $this->_database);
                if (!$this->connection)
                {
                    echo 'Erro ao efetuar a conexão ao Banco de Dados!';
                    exit;
                }
            }
            return $this->connection;
        }
    }
?>
