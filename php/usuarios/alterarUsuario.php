<?php require '../../script/alterarUsuarioScript.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../../core/head.php' ?>
    <title>P.A.R.C. - Alterar Usuário</title>
    <?php if($crud->usuarioAlteracao == '') { ?>
        <script>
            alert('Usuário inválido')
            window.close()
        </script>
    <?php } ?>
</head>
<body>
    <?php require '../../core/navbar/navbarUsuarios.php' ?>
    <form action="" method="POST" class="container mt-4">
        <div class="row">
            <div class="col-1">
                <label for="id_usuario" class="form-label">#</label>
                <input class="form-control" type="text" name="" id="" readonly disabled value="<?= $crud->usuarioAlteracao->id_usuario?>">
                <input type="hidden" name="id_usuario" value="<?= $crud->usuarioAlteracao->id_usuario?>">
                <input type="hidden" name="alterar" value="true">
            </div>
            <div class="col">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?=$crud->usuarioAlteracao->nome?>">
            </div>
            <div class="col-2">
                <label for="id_grupo" class="form-label">Grupo:</label>
                <select class="form-select" name="id_grupo" id="id_grupo">
                    <option hidden selected value="<?=$crud->usuarioAlteracao->id_grupo?>"><?=$crud->usuarioAlteracao->grupo?></option>
                    <?php foreach($crud->buscaGrupos() as $grupo) { ?>
                        <option value="<?= $grupo->id_grupo ?>"><?= $grupo->grupo ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="data_hora_cadastro" id="data_hora_cadastro" class="form-label">Data/Hora Cadastro:</label>
                <input type="text" name="data_hora_cadastro" id="" readonly disabled class="form-control" value="<?=$crud->usuarioAlteracao->data_hora_cadastro?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-3">
                <label for="usuario" class="form-label">Usuário:</label>
                <input type="text" name="usuario" id="usuario" class="form-control" value="<?=$crud->usuarioAlteracao->usuario?>">
            </div>
            <div class="col-4">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$crud->usuarioAlteracao->email?>">
            </div>
            <div class="col-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?=$crud->usuarioAlteracao->data_nascimento?>">
            </div>
            <div class="col">
                <label for="ativo" class="form-label">Situação:</label>
                <select name="ativo" id="ativo" class="form-select">
                    <option hidden selected value="<?=$crud->usuarioAlteracao->ativo?>"><?php if($crud->usuarioAlteracao->ativo != 1) {echo 'Inativo';} else {echo 'Ativo';} ?></option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col">
                <h2>Permissões</h2>
                <span class="form-check form-switch">
                    <input type="hidden" name="puxar_grupo" value="0">
                    <input type="checkbox" data-bs-toggle="collapse" data-bs-target="#permissoes" class="form-check-input" name="puxar_grupo" id="puxar_grupo" value="1" <?php if($crud->usuarioAlteracao->puxar_grupo) {echo 'checked';} ?>>
                    <label for="puxar_grupo">Puxar Permissões do Grupo</label>
                </span>
            </div>
        </div>
        <div class="collapse <?php if(!($crud->usuarioAlteracao->puxar_grupo)) {echo 'show';} ?>" id="permissoes">
            <fieldset class="row form-check form-switch mb-3">
                <legend>Chamados</legend>
                <div class="col">
                    <input type="hidden" value="0" name="abrir_chamado">
                    <input type="checkbox" class="form-check-input" id="abrir_chamado" name="abrir_chamado" value="1" <?php if($permissoes->abrir_chamado){echo 'checked';} ?>>
                    <label class="form-check-label" for="abrir_chamado">Abrir Chamado</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="gerenciar_chamados">
                    <input type="checkbox" class="form-check-input" id="gerenciar_chamados" name="gerenciar_chamados" value="1" <?php if($permissoes->gerenciar_chamados){echo 'checked';} ?>>
                    <label class="form-check-label" for="gerenciar_chamados">Gerenciar Chamados</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="visualizar_outros">
                    <input type="checkbox" class="form-check-input" id="visualizar_outros" name="visualizar_outros" value="1" <?php if($permissoes->visualizar_outros){echo 'checked';} ?>>
                    <label class="form-check-label" for="visualizar_outros">Visualizar Chamados de Outros Usuários</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="editar_chamado">
                    <input type="checkbox" class="form-check-input" id="editar_chamado" name="editar_chamado" value="1" <?php if($permissoes->editar_chamado){echo 'checked';} ?>>
                    <label class="form-check-label" for="editar_chamado">Editar Chamados</label>
                </div>
            </fieldset>
            <fieldset class="row form-check form-switch mb-3">
                <legend>Cadastro</legend>
                <div class="col">
                    <input type="hidden" value="0" name="listar_tipos">
                    <input type="checkbox" class="form-check-input" id="listar_tipos" name="listar_tipos" value="1" <?php if($permissoes->listar_tipos){echo 'checked';} ?>>
                    <label class="form-check-label" for="listar_tipos">Listar Tipos</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="cadastrar_tipo">
                    <input type="checkbox" class="form-check-input" id="cadastrar_tipo" name="cadastrar_tipo" value="1" <?php if($permissoes->cadastrar_tipo){echo 'checked';} ?>>
                    <label class="form-check-label" for="cadastrar_tipo">Cadastrar Tipos</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="inativar_tipos">
                    <input type="checkbox" class="form-check-input" id="inativar_tipos" name="inativar_tipos" value="1" <?php if($permissoes->inativar_tipos){echo 'checked';} ?>>
                    <label class="form-check-label" for="inativar_tipos">Ativar/Inativar Tipos</label>
                </div>
            </fieldset>
            <fieldset class="row mb-3 form-check form-switch">
                <legend>Usuários</legend>
                <div class="col">
                    <input type="hidden" value="0" name="listar_usuarios">
                    <input type="checkbox" class="form-check-input" id="listar_usuarios" name="listar_usuarios" value="1" <?php if($permissoes->listar_usuarios){echo 'checked';} ?>>
                    <label class="form-check-label" for="listar_usuarios">Listar Usuários</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="cadastrar_usuario">
                    <input type="checkbox" class="form-check-input" id="cadastrar_usuario" name="cadastrar_usuario" value="1" <?php if($permissoes->cadastrar_usuario){echo 'checked';} ?>>
                    <label class="form-check-label" for="cadastrar_usuario">Cadastrar Usuário</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="alterar_usuario">
                    <input type="checkbox" class="form-check-input" id="alterar_usuario" name="alterar_usuario" value="1" <?php if($permissoes->alterar_usuario){echo 'checked';} ?>>
                    <label class="form-check-label" for="alterar_usuario">Alterar Usuário</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="listar_grupos">
                    <input type="checkbox" class="form-check-input" id="listar_grupos" name="listar_grupos" value="1" <?php if($permissoes->listar_grupos){echo 'checked';} ?>>
                    <label class="form-check-label" for="listar_grupos">Listar Grupos de Usuários</label>
                </div>
                <div class="col">
                    <input type="hidden" value="0" name="alterar_grupo">
                    <input type="checkbox" class="form-check-input" id="alterar_grupo" name="alterar_grupo" value="1" <?php if($permissoes->alterar_grupo){echo 'checked';} ?>>
                    <label class="form-check-label" for="alterar_grupo">Alterar Grupos de Usuários</label>
                </div>
            </fieldset>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-primary">Alterar</button>
            </div>
        </div>
    </form>
</body>
</html>