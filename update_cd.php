<?php

    require 'def/conexao.php';
    require 'dao/CdDaoMysql.php';

    $cdDao = new CdDaoMysql($pdo);

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $artista = filter_input(INPUT_POST, 'artista');
    $ano_lancamento = filter_input(INPUT_POST, 'ano_lancamento');
    $genero = filter_input(INPUT_POST, 'genero');
    $duracao = filter_input(INPUT_POST, 'duracao');

    if($id && $nome && $artista && $ano_lancamento && $genero && $duracao){
        $cd = new Cd();
        $cd->setId($id);
        $cd->setNome($nome);
        $cd->setArtista($artista);
        $cd->setAnoLancamento($ano_lancamento);
        $cd->setGenero($genero);
        $cd->setDuracao($duracao);



        $cdDao->update($cd);

        header("Location: lista_cd.php");
        exit;
    } else{
        header("Location: form_update_cd.php?id=".$id);
        exit;
    }
?>