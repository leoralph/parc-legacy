<?php require '../../script/alterarGrupoScript.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require '../../core/head.php' ?>
    <title>P.A.R.C. - Alterar Grupo de Usuários</title>
    <?php if($crud->buscaGrupoAlterar() == '') { ?>
        <script>
            alert('Grupo inválido')
            window.close()
        </script>
    <?php } ?>
</head>
<body>
    <?php require '../../core/navbar/navbarUsuarios.php' ?>
    <form action="" method="POST" class="container mt-4">
        <div class="row">
            <div class="col-1">
                <label for="id_grupo" class="form-label">#</label>
                <input class="form-control" type="text" name="" id="" readonly disabled value="<?= $crud->buscaGrupoAlterar()->id_grupo?>">
                <input type="hidden" name="id_grupo" value="<?=$crud->buscaGrupoAlterar()->id_grupo?>">
                <input type="hidden" name="alterar" value="true">
            </div>
            <div class="col">
                <label class="form-label" for="grupo">Nome do Grupo:</label>
                <input type="text" name="grupo" id="grupo" class="form-control" value="<?= $crud->buscaGrupoAlterar()->grupo?>">
            </div>
            <div class="col-2">
                <label for="ativo" class="form-label">Situação:</label>
                <select name="ativo" id="ativo" class="form-select">
                    <option hidden selected value="<?= $crud->buscaGrupoAlterar()->ativo?>"><?php if($crud->buscaGrupoAlterar()->ativo != 1) {echo 'Inativo';} else {echo 'Ativo';} ?></option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
        </div>
        <div class="" id="permissoes">
        <div class="row mt-3 mb-3">
            <div class="col">
                <h2>Permissões do Grupo</h2>
            </div>
        </div>
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