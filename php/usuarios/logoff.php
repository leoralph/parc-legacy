<?php
    require '../../script/validarAcesso.php';
    $validadorUsuario->logout();
    header('location: ../../index.php');
?>