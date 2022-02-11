<?php
    class Chamado {
        private $id_chamado;
        private $id_tipo;
        private $id_situacao;
        private $id_usuario;
        private $assunto;
        private $nome_solicitante;
        private $email_solicitante;
        private $telefone_solicitante;
        private $descricao;
        private $data_chamado;
        private $hora_chamado;

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            $this->$attr = $value;
        }
    }
?>