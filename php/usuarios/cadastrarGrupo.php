<?php require '../../script/cadastrarGrupoScript.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../../core/head.php' ?>
    <title>P.A.R.C. - Listar Grupos</title>
    <?php if(isset($_GET['sucesso']) AND $_GET['sucesso']) { ?>
    <script>
        alert('Grupo alterado com sucesso')
    </script>
    <?php } ?>
</head>
<body>
    <?php require_once '../../core/navbar/navbarUsuarios.php'?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>Cadastrar Grupo de usuários</h2>
            </div>
        </div>
        <?php foreach($crudUsuario->buscaGrupos() as $grupo) { ?>
        <div class="row border-bottom border-dark bg- p-2">
            <div class="col-auto"><?= $grupo->id_grupo?></div>
            <div class="col"><?= $grupo->grupo ?></div>
            <div class="col-auto fw-bold text-<?php if($grupo->ativo){echo 'success';} else {echo 'danger';} ?>"><?php if($grupo->ativo){echo 'Ativo';} else {echo 'Inativo';} ?></div>
            <?php if($permissoesLogado->alterar_grupo){ ?>
            <div class="col-auto">
                <button class="btn btn-primary" onclick="document.getElementById('grupo<?=$grupo->id_grupo?>').submit()" class="link-dark"><i class="bi bi-pencil"></i></button>
            </div>
            <form action="alterarGrupo.php" method="POST" id="grupo<?=$grupo->id_grupo?>">
                <input type="hidden" name="id_grupo" value="<?=$grupo->id_grupo?>">
            </form>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</body>
</html>