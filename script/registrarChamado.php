<?php
    require '../script/validarAcesso.php';
    require '../core/objects/chamado.php';
    require '../core/objects/crudChamado.php';

    $chamado = new Chamado;
    $crud = new ChamadoCRUD($validadorConexao,$chamado);

    $chamado->id_usuario = $dadosLogado->id_usuario;
    $chamado->assunto = $_POST['assunto'];
    $chamado->id_tipo = $_POST['id_tipo'];
    $chamado->descricao = $_POST['descricao'];
    $chamado->nome_solicitante = $_POST['nome_solicitante'];
    $chamado->email_solicitante = $_POST['email_solicitante'];
    $chamado->telefone_solicitante = $_POST['telefone_solicitante'];
    
    echo '<hr>';
    $crud->createChamado();

    header('location: ../php/abrirChamado.php?abertura=1')
?>