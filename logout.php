<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['nome']);
    unset($_SESSION['logTempo']);
    unset($_SESSION['logado']);

    header('Refresh: 2; URL= index.php');
?>