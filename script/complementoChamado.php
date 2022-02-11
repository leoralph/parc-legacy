<?php 
    require '../script/validarAcesso.php';
    require '../core/objects/chamado.php';
    require '../core/objects/crudChamado.php';

    $chamado = new Chamado;
    $crud = new ChamadoCRUD($validadorConexao,$chamado);
    $situacoesChamados;
    $chamadoComplemento;
    
    if(isset($_POST['id_chamado'])){
        $chamadoComplemento = $crud->buscarChamado($_POST['id_chamado']);
        $situacoesChamados = $crud->buscaSituacoes();
    } else {
?>
    <script>
        alert('Sem chamado válido')
        window.close()
    </script>
<?php } 
    if(isset($_POST['complementar']) AND $_POST['complementar']){
        $_POST['id_usuario_complemento'] = $dadosLogado->id_usuario;
        $crud->rodarNovaResposta();
        header('location: gerenciarChamados.php?sucesso=1'); 
    }
?>