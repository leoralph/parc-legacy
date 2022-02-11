<?php 
    require '../../script/validarAcesso.php';
    require '../../core/objects/crudUsuario.php';
    require '../../core/objects/usuario.php';
    require '../../core/objects/permissoes.php';
    require '../../core/objects/crudPermissoes.php';
    
    $permissoes = new Permissoes;
    $usuario = new Usuario;
    $crud = new UsuarioCRUD($validadorConexao,$usuario);
    $crudPermissoes = new PermissoesCRUD($validadorConexao,$permissoes);


    if(isset($_POST['id_usuario'])) {
        $crud->buscaUsuarioAlterar($_POST['id_usuario']);
        $crud->buscaGrupos();
        $crudPermissoes->buscaPermissoesUsuario($_POST['id_usuario']);
    }

    $permissoes = $crudPermissoes->permissoes;
    
    if(isset($_POST['alterar']) AND $_POST['alterar']){
        if($dadosLogado->id_usuario == $_POST['id_usuario'] AND $_POST['ativo'] != 1){
            $_POST['ativo'] = 1;
        }
        $crud->updateUsuario(); 
        $crudPermissoes->rodarUpdatePermissoesUsuario();
        header('location: cadastrarUsuario.php?sucesso=1');
    } 
?>