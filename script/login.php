<?php
    session_start();
    class Conexao {
        private $dsn = "mysql:host=localhost;dbname=db_parc";
        private $dbUser = 'root';
        private $dbPass = '';

        public function conectar(){
            try{
                
                $conexao = new PDO(
                    $this->dsn,
                    $this->dbUser,
                    $this->dbPass
                );
                return $conexao;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    require '../core/objects/usuario.php';
    require '../core/objects/crudUsuario.php';

    $conexao = new Conexao;
    $usuario = new Usuario;
    $crud = new UsuarioCRUD($conexao,$usuario);

    $crud->rodarLogin();
?>