<?php

  session_start();

  if(!isset($_SESSION['username']) == true && !isset($_SESSION['password']) == true){
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header('Location: index.php');
  }

    require 'def/conexao.php';
    require 'dao/CdDaoMysql.php';

    $cdDao = new CdDaoMysql($pdo);

    $cd = false;
    $id = filter_input(INPUT_GET, 'id');

    if($id){
      $cd = $cdDao->findById($id);
    }

    if($cd === false){
      header("Location: lista_cd.php");
      exit;
    }
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>CD Manager · Adicionar</title>



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">CD Manager</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="main.php">
              <span data-feather="home"></span>
              Principal <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="lista_cd.php">
              <span data-feather="ver-cd"></span>
              Lista CDs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="lista_usuario.php">
              <span data-feather="ver-usuario"></span>
              Lista Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_usuario.php">
              <span data-feather="file"></span>
              Cadastrar novo usuário
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Cadastrar CD
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CD Manager</h1>
      </div>
      <h2>Atualização de CD</h2>

      <form action="update_cd.php" method="POST">

        <input type="hidden" name="id" value="<?= $cd->getId(); ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="nome">Nome do CD</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do CD" value ="<?= $cd->getNome(); ?>" required autofocus autocomplete="off">
            </div>
            <div class="form-group col-md-6">
            <label for="artista">Artista</label>
            <input type="text" id="artista" name="artista" class="form-control" placeholder="Artista" value ="<?= $cd->getArtista(); ?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="ano_lancamento">Ano de Lançamento</label>
              <input type="text" id="ano_lancamento" name="ano_lancamento" class="form-control" placeholder="Ano de Lançamento" value ="<?= $cd->getAnoLancamento(); ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Gênero</label>
              <input type="text" id="genero" name="genero" class="form-control" placeholder="Gênero" value ="<?= $cd->getGenero(); ?>" required>
            </div>
            <div class="form-group col-md-4">
              <label for="duracao">Duração</label>
              <input type="text" id="duracao" name="duracao" class="form-control" placeholder="Duração" value ="<?= $cd->getDuracao(); ?>" required>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Atualizar</button>
      </form>

    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</html>
