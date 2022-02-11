<?php require '../../script/buscarTipos.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../../core/head.php' ?>
    <title>P.A.R.C. - Cadastrar Tipos</title>
</head>
<body>
    <?php require_once '../../core/navbar/navbarCadastro.php'?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>Cadastrar tipo chamado</h2>
            </div>
        </div>
        <?php if($permissoesLogado->cadastrar_tipo) { ?>
        <div class="row justify-content-end">
            <div class="col-auto">
                <button class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#novoTipo">Novo tipo</button>
            </div>
        </div>
        <div class="row collapse mb-3" id="novoTipo">
            <form class="mt-4" action="../../script/alterarTipo.php" method="post">
                <div class="col-6">
                    <label for="novoTipo">Novo Tipo:</label>
                    <input type="text" class="form-control input-group mb-1" name="novoTipo" id="novoTipo">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
        <?php } ?>
        <div class="row mt-4">
            <div class="col-1">
                <h5>#</h5>
            </div>
            <div class="col">
                <h5>Tipo</h5>
            </div>
            <div class="col-auto">
                <h5>Situação</h5>
            </div>
            <?php if($permissoesLogado->inativar_tipos) { ?>
                <div class="col-1"></div>
            <?php } ?>
        </div>
        <?php foreach($crud->tiposChamados as $tipos) { ?>
            <form action="../../script/alterarTipo.php" method="post" class="row border-top border-dark p-2">
                <div class="col-1 fw-bold">
                    <?=$tipos->id_tipo?>
                </div>
                <div class="col">
                    <?=$tipos->tipo?>
                </div>
                <div class="col-1 fw-bold <?php if($tipos->ativo){ echo 'text-success';} else {echo 'text-danger';} ?>">
                    <?php if($tipos->ativo){ echo 'Ativo';} else {echo 'Inativo';} ?>
                </div>
                <?php if($permissoesLogado->inativar_tipos == 1){ if($tipos->ativo){ ?>
                    <div class="col-1">
                        <input type="hidden" name="idTipoInativar" value="<?=$tipos->id_tipo?>">
                        <button title="Inativar" type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                    </div>
                <?php } else { ?>
                    <div class="col-1">
                        <input type="hidden" name="idTipoAtivar" value="<?=$tipos->id_tipo?>">
                        <button title="Ativar" type="submit" class="btn btn-success"><i class="bi bi-check2"></i></button>
                    </div>
                <?php } } ?>
            </form>
        <?php } ?>
    </div>
</body>
</html>