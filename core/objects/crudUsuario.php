<?php
    class UsuarioCRUD{
        private $conexao;
        private $usuario;
        private $listaUsuarios;
        private $usuarioAlteracao;

        public function  __set($attr,$value){
            $this->$attr = $value;
        }
        public function __get($attr){
            return $this->$attr;
        }
        public function __construct($conexao, $usuario){
            $this->conexao = $conexao->conectar();
            $this->usuario = $usuario;
        }

        public function setValoresLogin(){
            $this->usuario->usuario = $_POST['usuario'];
            $this->usuario->senha = md5($_POST['senha']);
        }

        public function setValoresCadastro(){
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->data_nascimento = $_POST['data_nascimento'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->usuario = $_POST['usuario'];
            $this->usuario->senha = md5($_POST['senha']);
        }
        public function setValoresUpdateUsuario(){
            $this->usuario->id_usuario = $_POST['id_usuario'];
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->id_grupo = $_POST['id_grupo'];
            $this->usuario->puxar_grupo = $_POST['puxar_grupo'];
            $this->usuario->usuario = $_POST['usuario'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->data_nascimento = $_POST['data_nascimento'];
            $this->usuario->ativo = $_POST['ativo'];
        }

        public function buscaExistenteLogin(){
            $query = "SELECT id_usuario FROM tb_usuarios WHERE usuario = :usuario AND senha = :senha AND ativo = TRUE";

            $stmt = $this->conexao->prepare($query);
            
            $stmt->bindValue(':usuario',$this->usuario->usuario);
            $stmt->bindValue(':senha',$this->usuario->senha);

            $stmt->execute();

            $retorno = $stmt->fetch(PDO::FETCH_OBJ);

            if($retorno != ''){
                $_SESSION['id_usuario'] = $retorno->id_usuario;
                $_SESSION['logado'] = true;
                return true;
            } else {
                return false;
            }
        }

        public function buscaExistenteCadastro(){
            $query = "SELECT id_usuario FROM tb_usuarios WHERE usuario = :usuario";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':usuario',$this->usuario->usuario);

            $stmt->execute();
            
            $retorno = $stmt->fetch();

            if($retorno != ''){
                return true;
            } else {
                return false;
            }
        }
        public function buscaUsuarioAlterar($idUsuario){
            $query = "SELECT u.id_usuario,u.id_grupo,u.puxar_grupo,g.grupo,u.nome,u.data_nascimento,u.email,u.usuario,u.data_hora_cadastro,u.ativo FROM tb_usuarios u LEFT JOIN tb_grupos_usuarios g ON(u.id_grupo = g.id_grupo) WHERE u.id_usuario = :idUsuario";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':idUsuario',$idUsuario);
            $stmt->execute();
            $this->usuarioAlteracao = $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function listaUsuarios(){
            $query = "SELECT u.id_usuario,u.nome,u.usuario,u.email,g.grupo,u.ativo FROM tb_usuarios u LEFT JOIN tb_grupos_usuarios g ON (u.`id_grupo` = g.`id_grupo`)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            $this->listaUsuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function buscaGrupos(){
            $query = "SELECT * FROM tb_grupos_usuarios";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function buscaGrupoAlterar(){
            $query = "SELECT * FROM tb_grupos_usuarios WHERE id_grupo = :id_grupo";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_grupo',$_POST['id_grupo']);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function criarUsuario(){
            $query = "INSERT INTO tb_usuarios(nome,data_nascimento,email,usuario,senha)
                        VALUES(:nome,:data_nascimento,:email,:usuario,:senha)";

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':nome', $this->usuario->nome);
            $stmt->bindValue(':data_nascimento', $this->usuario->data_nascimento);
            $stmt->bindValue(':email', $this->usuario->email);
            $stmt->bindValue(':usuario', $this->usuario->usuario);
            $stmt->bindValue(':senha', $this->usuario->senha);

            $stmt->execute();
        }

        public function rodarCadastro(){
            $this->setValoresCadastro();
            $this->buscaExistenteCadastro();
            if($this->buscaExistenteCadastro()) {
                header('location: ../php/usuarios/cadastrarUsuario.php?erro=1');
            } else {
                $this->criarUsuario();
                header('location: ../php/usuarios/cadastrarUsuario.php?sucesso=1');
            }
        }

        public function rodarLogin(){
            $this->setValoresLogin();
            $this->buscaExistenteLogin();
            if($this->buscaExistenteLogin()){
                header('location: ../php/home.php');
            } else {
                header('location: ../index.php?erro=1');
            }
        }

        public function updateUsuario(){
            $this->setValoresUpdateUsuario();
            $query = "UPDATE tb_usuarios SET nome = :nome, id_grupo = :id_grupo, puxar_grupo = :puxar_grupo, usuario = :usuario, email = :email, data_nascimento = :data_nascimento, ativo = :ativo WHERE id_usuario = :id_usuario";

            $stmt = $this->conexao->prepare($query);
            
            $stmt->bindValue(':id_usuario', $this->usuario->id_usuario);
            $stmt->bindValue(':nome', $this->usuario->nome);
            $stmt->bindValue(':id_grupo', $this->usuario->id_grupo);
            $stmt->bindValue(':puxar_grupo', $this->usuario->puxar_grupo);
            $stmt->bindValue(':usuario', $this->usuario->usuario);
            $stmt->bindValue(':email', $this->usuario->email);
            $stmt->bindValue(':data_nascimento', $this->usuario->data_nascimento);
            $stmt->bindValue(':ativo', $this->usuario->ativo);

            $stmt->execute();
        }
        public function updateGrupo($id_grupo){
            $query = "UPDATE tb_grupos_usuarios SET grupo = :grupo, ativo = :ativo WHERE id_grupo = :id_grupo";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':grupo', $_POST['grupo']);
            $stmt->bindValue(':ativo', $_POST['ativo']);
            $stmt->bindValue(':id_grupo', $_POST['id_grupo']);

            $stmt->execute();
        }
    }
?>