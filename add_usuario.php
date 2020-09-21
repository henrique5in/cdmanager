<?php
    require 'def/conexao.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $lista = $usuarioDao->findAll();

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $nome = filter_input(INPUT_POST, 'nome');

    $encryptpass = crypt(sha1(md5($password)), 'Hz');

    $novoUsuario = new Usuario();
    $novoUsuario->setUsername($username);
    $novoUsuario->setPassword($encryptpass);
    $novoUsuario->setNome($nome);

    $usuarioDao->add($novoUsuario);
    header("Location: lista_usuario.php");
    exit;
?>