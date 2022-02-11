<?php 
    require '../script/validarAcesso.php';
    require '../core/objects/crudPermissoes.php';
    require '../core/objects/permissoes.php';

    $permissoes = new Permissoes;
    $crud = new PermissoesCRUD($validadorConexao,$permissoes);
    
    if(isset($_POST['atualizarPermissoes']) AND $_POST['atualizarPermissoes']){
        $crud->rodarUpdatePermissoes();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="id_grupo" value="1">
        <input type="hidden" name="atualizarPermissoes" value="1">

        <input type="hidden" name="abrir_chamado" value="0">
        <input type="hidden" name="gerenciar_chamados" value="0">
        <input type="hidden" name="listar_usuarios" value="0">
        <input type="hidden" name="editar_chamado" value="0">
        <input type="hidden" name="listar_tipos" value="0">
        <input type="hidden" name="inativar_tipos" value="0">

        <input type="checkbox" name="abrir_chamado" value="1"> Abrir Chamado <br>
        <input type="checkbox" name="gerenciar_chamados" value="1"> Gerenciar Chamados <br>
        <input type="checkbox" name="listar_usuarios" value="1"> Listar Usuários <br>
        <input type="checkbox" name="editar_chamado" value="1"> Editar Chamados <br>
        <input type="checkbox" name="listar_tipos" value="1"> Listar Tipos <br>
        <input type="checkbox" name="inativar_tipos" value="1"> Inativar Tipos <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>