<?php
    require 'validarAcesso.php';
    require '../core/objects/usuario.php';
    require '../core/objects/crudUsuario.php';

    $usuario = new Usuario;
    $crud = new UsuarioCRUD($validadorConexao,$usuario);

    $crud->rodarCadastro();
?>