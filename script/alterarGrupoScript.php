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

    if(isset($_POST['id_grupo'])) {
        $grupos = $crud->buscaGrupoAlterar();
        $crudPermissoes->buscaPermissoesGrupo($_POST['id_grupo']);
        $permissoes = $crudPermissoes->permissoes;
    }
    
    if(isset($_POST['alterar']) AND $_POST['alterar']){
        if($dadosLogado->id_grupo == $_POST['id_grupo'] AND $_POST['ativo'] != 1){
            $_POST['ativo'] = 1;
        }
        $crud->updateGrupo($_POST['id_grupo']); 
        $crudPermissoes->rodarUpdatePermissoesGrupo();
        header('location: cadastrarGrupo.php?sucesso=1');
    } 
?>