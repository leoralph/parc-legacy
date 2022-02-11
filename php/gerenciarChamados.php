<?php require '../script/gerenciarChamadosScript.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../core/head.php' ?>
    <?php if(isset($_GET['sucesso']) AND $_GET['sucesso']){ ?>
    <script>
        alert('Chamado atualizado com sucesso!')
    </script>
    <?php } ?>
    <title>P.A.R.C. - Gerenciar Chamados</title>
</head>
<body>
    <?php require_once '../core/navbar/navbarGerenciarChamados.php' ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-1">
                <h5>#</h5>
            </div>
            <div class="col-2">
                <h5>Situação</h5>
            </div>
            <div class="col-2">
                <h5>Assunto</h5>
            </div>
            <div class="col-lg-3">
                <h5>Solicitante</h5>
            </div>
            <div class="col-lg-2">
                <h5>Data</h5>
            </div>
            <div class="col-lg-1">
                <h5>Hora</h5>
            </div>
            <div class="col-1">
                <h5></h5>
            </div>
        </div>
        <?php foreach($buscaChamados as $leitor) { ?>
        <div style="background-color: <?= $leitor->cor_situacao ?>;" class="row p-2 mt-2 border-top border-dark fw-bold">
            <div class="col-1">
                <?= $leitor->id_chamado ?>
            </div>
            <div class="col-2">
                <?= $leitor->situacao_chamado ?>
            </div>
            <div class="col-2">
                <?= $leitor->assunto ?>
            </div>
            <div class="col-lg-3">
                <?= $leitor->nome_solicitante ?>
            </div>
            <div class="col-lg-2">
                <?= $leitor->data_abertura ?>
            </div>
            <div class="col-lg-1">
                <?= $leitor->hora_abertura ?>
            </div>
            <div class="col">
                <a class="link-dark" data-bs-toggle="collapse" data-bs-target="#chamado<?= $leitor->id_chamado ?>"> <i class="bi bi-plus-lg"></i></a>
                <?php if($permissoesLogado->editar_chamado == 1) {?>
                <a onclick="document.getElementById('chamadoForm<?= $leitor->id_chamado ?>').submit()" class="link-dark"> <i class="bi bi-pencil"></i></a>
                <form action="complementarChamado.php" method="POST" id="chamadoForm<?= $leitor->id_chamado ?>">
                    <input type="hidden" name="id_chamado" value="<?= $leitor->id_chamado ?>">
                </form>
                <?php } ?>
            </div>
        </div>
        <div style="background-color: <?= $leitor->cor_situacao ?> ;" class="row collapse border-bottom border-white border-top border-white" id="chamado<?= $leitor->id_chamado ?>">
            <div class="row mt-2">
                <div class="col-2 fw-bold">
                    Tipo Chamado:
                </div>
                <div class="col">
                    <?= $leitor->tipo?>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-2 fw-bold">
                    Descrição:
                </div>
                <div class="col-9">
                    <?= $leitor->descricao?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-2 fw-bold">
                    Solicitante:
                </div>
                <div class="col">
                    <?= $leitor->nome_solicitante?>
                </div>
            </div>
            <div class="row  mb-1">
                <div class="col-2 fw-bold">
                    Email:
                </div>
                <div class="col">
                    <?= $leitor->email_solicitante?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-2 fw-bold">
                    Telefone:
                </div>
                <div class="col">
                    <?= $leitor->telefone_solicitante?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2 fw-bold">
                    Data/Hora:
                </div>
                <div class="col">
                    <?= $leitor->data_abertura?> às <?= $leitor->hora_abertura?>
                </div>
            </div>
        </div>
        <?php foreach($buscarRespostas as $leitorRespostas){
            if($leitorRespostas->id_chamado == $leitor->id_chamado){ ?>
            <div style="background-color: <?= $leitor->cor_situacao ?> ;" class="row collapse border-bottom border-white border-top" id="chamado<?= $leitor->id_chamado ?>">
                <div class="row mt-2">
                    <div class="col-2 fw-bold">
                        Usuário Resposta:
                    </div>
                    <div class="col-9">
                        <?= $leitorRespostas->nome?>
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-2 fw-bold">
                        Descrição:
                    </div>
                    <div class="col-9">
                        <?= $leitorRespostas->descricao?>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 fw-bold">
                        Solicitante:
                    </div>
                    <div class="col">
                        <?= $leitorRespostas->nome_solicitante?>
                    </div>
                </div>
                <div class="row  mb-1">
                    <div class="col-2 fw-bold">
                        Email:
                    </div>
                    <div class="col">
                        <?= $leitorRespostas->email_solicitante?>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-2 fw-bold">
                        Telefone:
                    </div>
                    <div class="col">
                        <?= $leitorRespostas->telefone_solicitante?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 fw-bold">
                        Data/Hora Resposta:
                    </div>
                    <div class="col">
                        <?= $leitorRespostas->data_resposta?> às <?= $leitorRespostas->hora_resposta?>
                    </div>
                </div>
            </div>
        <?php } } } ?>
    </div>
</body>
</html>