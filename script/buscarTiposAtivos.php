<?php
    require_once '../script/validarAcesso.php';
    require '../core/objects/chamado.php';
    require '../core/objects/crudChamado.php';

    $chamado = new Chamado;
    $crud = new ChamadoCRUD($validadorConexao,$chamado);
    $crud->buscaTiposAtivos();
    if($permissoesLogado->abrir_chamado != 1) {
        header('location: home.php?sp=1');
    }
?>