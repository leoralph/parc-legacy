<?php
    require '../../script/validarAcesso.php';
    require '../../core/objects/crudUsuario.php';
    require '../../core/objects/crudPermissoes.php';
    require '../../core/objects/permissoes.php';
    require '../../core/objects/usuario.php';
    
    if($permissoesLogado->listar_grupos != 1){
        header('location: ../home.php?sp=1');
    }

    $usuario = new Usuario;
    $permissoes = new Permissoes;
    $crudPermissoes = new PermissoesCRUD($validadorConexao,$permissoes);
    $crudUsuario = new UsuarioCRUD($validadorConexao,$usuario);

?>