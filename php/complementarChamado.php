<?php require '../script/complementoChamado.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../core/head.php' ?>
    <title>P.A.R.C - Complementar Chamado</title>
</head>
<body>
    <?php require '../core/navbar/navbarGerenciarChamados.php' ?>
    <form action="" method="post" class="container mt-3">
        <input type="hidden" name="complementar" value="1">
        <input type="hidden" name="id_chamado_complemento" value="<?= $_POST['id_chamado'] ?>">
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <h2>Complementar Chamado</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6 mb-2">
                <div class="form-floating">
                    <input readonly disabled type="assunto" name="assunto" class="form-control" id="assunto" value="<?= $chamadoComplemento->assunto ?>">
                    <label for="assunto">Titulo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6 mb-2">
                <div class="form-floating">
                    <select name="id_tipo" id="id_tipo" disabled class="form-select">
                        <option selected value="<?= $chamadoComplemento->id_tipo ?>"><?= $chamadoComplemento->tipo ?></option>>
                    </select>
                    <label for="id_tipo">Tipo chamado</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-sm-10 col-md-8 col-lg-6 mb-2">
                <div class="form-floating">
                    <select name="id_situacao" id="id_situacao" class="form-select">
                        <option hidden selected value="<?= $chamadoComplemento->id_situacao ?>"><?= $chamadoComplemento->situacao_chamado ?></option>
                        <?php foreach($situacoesChamados as $situacao) { ?>
                        <option value="<?= $situacao->id_situacao ?>"><?= $situacao->situacao_chamado ?></option>
                        <?php } ?>
                    </select>
                    <label for="id_tipo">Nova Situação</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col col-sm-10 col-md-8 col-lg-6">
                <div class="form-floating">
                    <textarea style="height: 300px;" class="form-control" name="descricao" id="descricao"></textarea>
                    <label for="texto">Complemento</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col col-sm-10 col-md-8 col-lg-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="nome_solicitante" id="nome_solicitante" value="<?= $chamadoComplemento->nome_solicitante ?>">
                    <label for="nome_solicitante">Solicitante</label>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 justify-content-center mb-2">
            <div class="col col-sm-5 col-md-4 col-lg-3">
                <div class="form-floating">
                    <input class="form-control mb-2" type="email" name="email_solicitante" id="email_solicitante" value="<?= $chamadoComplemento->email_solicitante ?>">
                    <label for="email_solicitante">Email de contato</label>
                </div>
            </div>
            <div class="col col-sm-5 col-md-4 col-lg-3">
                <div class="form-floating">
                    <input class="form-control" type="phone" name="telefone_solicitante" id="telefone_solicitante" value="<?= $chamadoComplemento->telefone_solicitante ?>">
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