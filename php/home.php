<?php require '../script/validarAcesso.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../core/head.php' ?>
    <title>P.A.R.C. - Início</title>
    <?php 
        if(isset($_GET['sp']) AND $_GET['sp']){ ?>
            <script>alert('Você não possui permissão para isso')</script>
    <?php }?>
</head>
<body>
    <?php require_once '../core/navbar/navbarHome.php' ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>Olá, <?= $dadosLogado->nome ?></h2>
            </div>
        </div>
    </div>
</body>
</html>