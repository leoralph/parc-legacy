<?php
    class Permissoes {
        private $id_grupo;
        //Permissões
        private $abrir_chamado;
        private $gerenciar_chamados;
        private $visualizar_outros;
        private $editar_chamado;
        private $listar_tipos;
        private $cadastrar_tipo;
        private $inativar_tipos;
        private $listar_usuarios;
        private $cadastrar_usuario;
        private $alterar_usuario;
        private $listar_grupos;
        private $alterar_grupo;

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            $this->$attr = $value;
        }
    }
?>