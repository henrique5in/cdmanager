<?php
    require 'def/conexao.php';
    require 'dao/CdDaoMysql.php';

    $cdDao = new CdDaoMysql($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $cdDao->delete($id);
    }

    header("Location: lista_cd.php");
    exit;
?>