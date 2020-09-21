<?php
    require 'def/conexao.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $usuarioDao->delete($id);
    }

    header("Location: lista_usuario.php");
    exit;
?>