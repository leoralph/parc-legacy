<?php
    session_start();

    class ConexaoValidadora {
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

    class UsuarioLogado{
        private $id_usuario;
        private $conexao;
        private $dados;
        private $permissoes;

        public function __construct($conexao){
            $this->conexao = $conexao->conectar();
        }
        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            $this->$attr = $value;
        }
        public function validar(){
            if(isset($_SESSION['id_usuario']) AND $_SESSION['logado']){
                $this->id_usuario = $_SESSION['id_usuario'];
                $query = "SELECT id_usuario,id_grupo,puxar_grupo,nome,usuario,email,ativo FROM tb_usuarios WHERE id_usuario = :id_usuario";
                $stmt = $this->conexao->prepare($query);

                $stmt->bindValue(':id_usuario',$this->id_usuario);
                $stmt->execute();

                $this->dados = $stmt->fetch(PDO::FETCH_OBJ);

                if(!$this->dados->puxar_grupo){
                    $query = "SELECT * FROM tb_permissoes_usuarios WHERE id_usuario = :id_usuario";
                    $stmt = $this->conexao->prepare($query);
                    $stmt->bindValue(':id_usuario',$this->dados->id_usuario);
                    $stmt->execute();
                    $this->permissoes = $stmt->fetch(PDO::FETCH_OBJ);
                } else {
                    $query = "SELECT * FROM tb_permissoes_grupos WHERE id_grupo = :id_grupo";
                    $stmt = $this->conexao->prepare($query);
                    $stmt->bindValue(':id_grupo',$this->dados->id_grupo);
                    $stmt->execute();
                    $this->permissoes = $stmt->fetch(PDO::FETCH_OBJ);
                }
                if(!($this->dados->ativo)){
                    $_SESSION['logado'] = false;
                }
            } else {
                $this->logout();
            }
        }

        public function logout(){
            session_destroy();
            header('location: logoff.php');
        }
    }

    $validadorConexao = new ConexaoValidadora; 
    $validadorUsuario = new UsuarioLogado($validadorConexao);
    $validadorUsuario->validar();
    $dadosLogado = $validadorUsuario->dados;
    $permissoesLogado = $validadorUsuario->permissoes;
?>