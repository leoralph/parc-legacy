<?php
    require '../../script/validarAcesso.php'; 
    require '../../core/objects/crudChamado.php';    
    require '../../core/objects/chamado.php';

    $chamado = new Chamado;
    $crud = new ChamadoCRUD($validadorConexao,$chamado);
    $crud->buscaTipos();

    if($permissoesLogado->listar_tipos != 1){
        header('location: ../home.php?sp=1');
    }

    if($dadosLogado->id_grupo > 2){
        header('location: ../home.php?erro=1');
    }
?>