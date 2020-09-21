<?php
    require 'def/conexao.php';

    session_start();



    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $encryptpass = crypt(sha1(md5($password)), 'Hz');

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $encryptpass;
    $_SESSION['logado'] = true;

    $data = [];
    $sql = $pdo->prepare("SELECT password FROM login WHERE username = ?");
    $sql->bindValue(1, $username);
    $sql->execute();

    if($sql->rowCount() > 0){
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['password']==$encryptpass){
            header("Location: main.php");
        }else{
            echo "Usuário ou senha incorreto!";
            header('Refresh: 2; URL= index.php');
        }
    }else{
        echo "Usuário não encontrado";
        header('Refresh: 2; URL= index.php');
    }

?>
