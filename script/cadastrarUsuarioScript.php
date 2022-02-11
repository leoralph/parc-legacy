<?php
    require '../../script/validarAcesso.php';
    require '../../core/objects/crudUsuario.php';
    require '../../core/objects/usuario.php';
    
    if($permissoesLogado->listar_usuarios != 1){
        header('location: ../home.php?sp=1');
    }
    $usuario = new Usuario;
    $crud = new UsuarioCRUD($validadorConexao,$usuario);
    $crud->listaUsuarios();
?>