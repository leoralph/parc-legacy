<?php
    require '../core/objects/chamado.php';
    require '../core/objects/crudChamado.php';
    require '../script/validarAcesso.php';

    $conexao = new ConexaoValidadora;
    $chamado = new Chamado;
    $crud = new ChamadoCRUD($conexao,$chamado);

    if($permissoesLogado->gerenciar_chamados != 1){
        header('location: home.php?sp=1');
    }
    
    if($permissoesLogado->visualizar_outros == 1){
        $crud->readRespostas();
        $crud->readTodos();
        $buscaChamados = $crud->chamados;
        $buscarRespostas = $crud->respostasChamados;
    } else {
        $crud->readRespostas();
        $crud->readUsuario($dadosLogado->id_usuario);
        $buscaChamados = $crud->chamados;
        $buscarRespostas = $crud->respostasChamados;
    }
?>