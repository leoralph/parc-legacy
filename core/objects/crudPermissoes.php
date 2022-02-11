<?php
    class PermissoesCRUD {
        private $conexao;
        private $permissoes;

        public function __construct($conexao,$permissoes){
            $this->conexao = $conexao->conectar();
            $this->permissoes = $permissoes;
        }
        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            $this->$attr = $value;
        }

        public function buscaPermissoesUsuario($id_usuario){
            $query = "SELECT * FROM tb_permissoes_usuarios WHERE id_usuario = :id_usuario";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_usuario',$id_usuario);
            $stmt->execute();
            $this->permissoes = $stmt->fetch(PDO::FETCH_OBJ);
        }
        public function buscaPermissoesGrupo($id_grupo){
            $query = "SELECT * FROM tb_permissoes_grupos WHERE id_grupo = :id_grupo";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_grupo',$id_grupo);
            $stmt->execute();
            $this->permissoes = $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function setValoresAlteracaoPermissao(){
            $this->permissoes->abrir_chamado = $_POST['abrir_chamado'];
            $this->permissoes->gerenciar_chamados = $_POST['gerenciar_chamados'];
            $this->permissoes->visualizar_outros = $_POST['visualizar_outros'];
            $this->permissoes->editar_chamado = $_POST['editar_chamado'];
            $this->permissoes->listar_tipos = $_POST['listar_tipos'];
            $this->permissoes->cadastrar_tipo = $_POST['cadastrar_tipo'];
            $this->permissoes->inativar_tipos = $_POST['inativar_tipos'];
            $this->permissoes->listar_usuarios = $_POST['listar_usuarios'];
            $this->permissoes->cadastrar_usuario = $_POST['cadastrar_usuario'];
            $this->permissoes->alterar_usuario = $_POST['alterar_usuario'];
            $this->permissoes->listar_grupos = $_POST['listar_grupos'];
            $this->permissoes->alterar_grupo = $_POST['alterar_grupo'];
        }

        
        public function updatePermissaoUsuario($id_usuario){
            $query = 
            "UPDATE tb_permissoes_usuarios SET 
            abrir_chamado = :abrir_chamado,
            gerenciar_chamados = :gerenciar_chamados,
            visualizar_outros = :visualizar_outros,
            editar_chamado = :editar_chamado,
            listar_tipos = :listar_tipos,
            cadastrar_tipo = :cadastrar_tipo,
            inativar_tipos = :inativar_tipos,
            listar_usuarios = :listar_usuarios,
            cadastrar_usuario = :cadastrar_usuario,
            alterar_usuario = :alterar_usuario,
            listar_grupos = :listar_grupos,
            alterar_grupo = :alterar_grupo
            WHERE id_usuario = :id_usuario";

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':abrir_chamado',$this->permissoes->abrir_chamado);
            $stmt->bindValue(':gerenciar_chamados',$this->permissoes->gerenciar_chamados);
            $stmt->bindValue(':visualizar_outros',$this->permissoes->visualizar_outros);
            $stmt->bindValue(':editar_chamado',$this->permissoes->editar_chamado);
            $stmt->bindValue(':listar_tipos',$this->permissoes->listar_tipos);
            $stmt->bindValue(':cadastrar_tipo',$this->permissoes->cadastrar_tipo);
            $stmt->bindValue(':inativar_tipos',$this->permissoes->inativar_tipos);
            $stmt->bindValue(':listar_usuarios',$this->permissoes->listar_usuarios);
            $stmt->bindValue(':cadastrar_usuario',$this->permissoes->cadastrar_usuario);
            $stmt->bindValue(':alterar_usuario',$this->permissoes->alterar_usuario);
            $stmt->bindValue(':listar_grupos',$this->permissoes->listar_grupos);
            $stmt->bindValue(':alterar_grupo',$this->permissoes->alterar_grupo);

            $stmt->bindValue(':id_usuario',$id_usuario);

            $stmt->execute();
        }
        public function updatePermissaoGrupo($id_grupo){
            $query = 
            "UPDATE tb_permissoes_grupos SET 
            abrir_chamado = :abrir_chamado,
            gerenciar_chamados = :gerenciar_chamados,
            visualizar_outros = :visualizar_outros,
            editar_chamado = :editar_chamado,
            listar_tipos = :listar_tipos,
            cadastrar_tipo = :cadastrar_tipo,
            inativar_tipos = :inativar_tipos,
            listar_usuarios = :listar_usuarios,
            cadastrar_usuario = :cadastrar_usuario,
            alterar_usuario = :alterar_usuario,
            listar_grupos = :listar_grupos,
            alterar_grupo = :alterar_grupo
            WHERE id_grupo = :id_grupo";

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue(':abrir_chamado',$this->permissoes->abrir_chamado);
            $stmt->bindValue(':gerenciar_chamados',$this->permissoes->gerenciar_chamados);
            $stmt->bindValue(':visualizar_outros',$this->permissoes->visualizar_outros);
            $stmt->bindValue(':editar_chamado',$this->permissoes->editar_chamado);
            $stmt->bindValue(':listar_tipos',$this->permissoes->listar_tipos);
            $stmt->bindValue(':cadastrar_tipo',$this->permissoes->cadastrar_tipo);
            $stmt->bindValue(':inativar_tipos',$this->permissoes->inativar_tipos);
            $stmt->bindValue(':listar_usuarios',$this->permissoes->listar_usuarios);
            $stmt->bindValue(':cadastrar_usuario',$this->permissoes->cadastrar_usuario);
            $stmt->bindValue(':alterar_usuario',$this->permissoes->alterar_usuario);
            $stmt->bindValue(':listar_grupos',$this->permissoes->listar_grupos);
            $stmt->bindValue(':alterar_grupo',$this->permissoes->alterar_grupo);

            $stmt->bindValue(':id_grupo',$id_grupo);

            $stmt->execute();
        }

        public function rodarUpdatePermissoesGrupo(){
            $this->setValoresAlteracaoPermissao();
            $this->updatePermissaoGrupo($_POST['id_grupo']);
        }
        public function rodarUpdatePermissoesUsuario(){
            $this->setValoresAlteracaoPermissao();
            $this->updatePermissaoUsuario($_POST['id_usuario']);
        }
    }

?>