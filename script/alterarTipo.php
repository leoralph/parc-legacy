<?php
    require 'validarAcesso.php'; 
    require '../core/objects/chamado.php';    
    require '../core/objects/crudChamado.php';

    $chamado = new Chamado;
    $crud = new ChamadoCRUD($validadorConexao,$chamado);
    if(isset($_POST['novoTipo']) AND strlen($_POST['novoTipo']) > 4){
        $crud->createTipo();
        header('location: ../../php/cadastro/tipoChamado.php?sucesso=1');
    } else {
        header('location: ../../php/cadastro/tipoChamado.php');
    }
    if(isset($_POST['idTipoInativar'])){
        $crud->inativarTipo();
        header('location: ../../php/cadastro/tipoChamado.php');
    } else if(isset($_POST['idTipoAtivar'])){
        $crud->ativarTipo();
        header('location: ../../php/cadastro/tipoChamado.php');
    }

    print_r($_POST)
?>