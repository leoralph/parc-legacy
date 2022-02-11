<?php require '../../script/cadastrarUsuarioScript.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../../core/head.php' ?>
    <title>P.A.R.C. - Listar Usuários</title>
    <?php if(isset($_GET['sucesso']) AND $_GET['sucesso']) { ?>
    <script>
        alert('Usuário alterado com sucesso')
    </script>
    <?php } ?>
</head>
<body>
    <?php require_once '../../core/navbar/navbarUsuarios.php'?>
    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <h2>Lista de usuários</h2>
            </div>
        </div>
        <?php if($permissoesLogado->cadastrar_usuario){ ?>
        <div class="row justify-content-end">
            <button class="col-auto btn btn-dark" data-bs-toggle="collapse" data-bs-target="#novoUsuario"><i class="bi bi-plus"></i> Novo</button>
        </div>
        <?php } ?>
    </div>
    <?php if($permissoesLogado->cadastrar_usuario){ ?>
    <form action="../../script/cadastrarUsuario.php" method="post" class="container collapse" id="novoUsuario">
        <div class="row justify-content-center mb-2 mt-2">
            <h2 class="col-auto">FAZER CADASTRO</h2>
        </div>
        <div class="row mb-2  justify-content-center">
            <div class="col col-sm-10 col-md-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 justify-content-center mb-2">
            <div class="col col-sm-5 col-md-4">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="col col-sm-5 col-md-4">
                <label for="nascimento">Nascimento:</label>
                <input type="date" name="data_nascimento" id="nascimento" class="form-control">
            </div>
        </div>
        <div class="row row-cols-1 justify-content-center mb-2">
            <div class="col col-sm-5 col-md-4">
                <label for="usuario" class="form-label">Usuário:</label>
                <input type="text" name="usuario" id="usuario" class="form-control">
            </div>
            <div class="col col-sm-5 col-md-4">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
        </div>
        <?php if(isset($_GET['erro']) AND $_GET['erro']) {?>
            <div class="row justify-content-center text-danger">
                <div class="col-auto">
                    <p>Usuário já existe.</p>
                </div>
            </div>
        <?php } ?>
        <?php if(isset($_GET['sucesso']) AND $_GET['sucesso']) {?>
            <div class="row justify-content-center text-success">
                <div class="col-auto">
                    <p>Usuário cadastrado com sucesso.</p>
                </div>
            </div>
        <?php } ?>
        <div class="row row-cols-1 row-cols-sm-auto justify-content-center g-2">
            <div class="col col-md-auto justify-content-end">
                <button type="submit" class="col-12 btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
    <?php } ?>
    <div class="container mt-3">
        <?php foreach($crud->listaUsuarios as $usuario){ ?>
        <form method="POST" action="alterarUsuario.php" class="row border-bottom border-dark bg- p-2">
            <div class="col-auto fw-bold"><?= $usuario->id_usuario ?></div>
            <div class="col-2 fw-bold"><?= $usuario->nome ?></div>
            <div class="col-2 fw-bold"><?= $usuario->usuario ?></div>
            <div class="col fw-bold"><?= $usuario->email ?></div>
            <div class="col-1 fw-bold <?php if($usuario->ativo){echo 'text-success';} else {echo 'text-danger';} ?>"><?php if($usuario->ativo){echo 'Ativo';} else {echo 'Inativo';} ?></div>
            <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario ?>">
            <?php if($permissoesLogado->alterar_usuario){ ?> <div class="col-auto fw-bold"><button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button></div> <?php } ?>
        </form>
        <?php } ?>
    </div>
</body>
</html>