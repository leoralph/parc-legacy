<?php require '../script/buscarTiposAtivos.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../core/head.php' ?>
    <title>P.A.R.C. - Abrir Chamado</title>
</head>
<body>
    <?php require_once '../core/navbar/navbarAbrirChamado.php' ?>
    <?php if(isset($_GET['abertura']) AND $_GET['abertura']) { ?>
        <div class="container-fluid bg-success p-2 text-white">
            <h3>Chamado aberto com sucesso</h3>
        </div>
    <?php } ?>
    <form action="../script/registrarChamado.php" method="post" class="container mt-3">
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <h2>Abertura de chamado</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6 mb-2">
                <div class="form-floating">
                    <input type="assunto" name="assunto" class="form-control" id="assunto" placeholder="name@example.com">
                    <label for="assunto">Titulo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6 mb-2">
                <div class="form-floating">
                    <select name="id_tipo" id="id_tipo" class="form-select">
                        <option hidden disabled selected value="0"></option>
                        <?php foreach ($crud->tiposChamados as $tiposChamados) { ?>
                            <option value="<?= $tiposChamados->id_tipo ?>"><?= $tiposChamados->tipo ?></option>
                        <?php } ?>
                    </select>
                    <label for="id_tipo">Tipo chamado</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col col-sm-10 col-md-8 col-lg-6">
                <div class="form-floating">
                    <textarea style="height: 300px;" class="form-control" name="descricao" id="descricao"></textarea>
                    <label for="texto">Solicitação</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col col-sm-10 col-md-8 col-lg-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="nome_solicitante" id="nome_solicitante">
                    <label for="nome_solicitante">Solicitante</label>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 justify-content-center mb-2">
            <div class="col col-sm-5 col-md-4 col-lg-3">
                <div class="form-floating">
                    <input class="form-control mb-2" type="email" name="email_solicitante" id="email_solicitante">
                    <label for="email_solicitante">Email de contato</label>
                </div>
            </div>
            <div class="col col-sm-5 col-md-4 col-lg-3">
                <div class="form-floating">
                    <input class="form-control" type="phone" name="telefone_solicitante" id="telefone_solicitante">
                    <label for="telefone_solicitante">Telefone de contato</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6">
                <button type="submit" class="btn btn-dark col-12">Enviar</button>
            </div>
        </div>
    </form>
</body>
</html>