<?php
    $username = 'seu usuario';
    $password = 'sua senha)';
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=cdmanager', $username, $password);
        //echo "Conectado!!!";
    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
    }
?>
