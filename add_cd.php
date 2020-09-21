<?php
    require 'def/conexao.php';
    require 'dao/CdDaoMysql.php';

    $cdDao = new CdDaoMysql($pdo);

    $lista = $cdDao->findAll();

    $nome = filter_input(INPUT_POST, 'nome');
    $artista = filter_input(INPUT_POST, 'artista');
    $ano_lancamento = filter_input(INPUT_POST, 'ano_lancamento');
    $genero = filter_input(INPUT_POST, 'genero');
    $duracao = filter_input(INPUT_POST, 'duracao');

    $novoCd = new Cd();
    $novoCd->setNome($nome);
    $novoCd->setArtista($artista);
    $novoCd->setAnoLancamento($ano_lancamento);
    $novoCd->setGenero($genero);
    $novoCd->setDuracao($duracao);


    $cdDao->add($novoCd);
    header("Location: lista_cd.php");
    exit;

?>