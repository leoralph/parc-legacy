<?php
    class Usuario {
        private $id_usuario;
        private $id_grupo;
        private $puxar_grupo;
        private $nome;
        private $data_nascimento;
        private $email;
        private $usuario;
        private $senha;
        private $data_hora_cadastro;
        private $ativo;

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            $this->$attr = $value;
        }
    }

?>