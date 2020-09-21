<?php
    session_start();

    if(!isset($_SESSION['username']) == true && !isset($_SESSION['password']) == true){
      unset($_SESSION['username']);
      unset($_SESSION['password']);
      header('Location: index.php');
    }



    require 'def/conexao.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $lista = $usuarioDao->findAll();


?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>CD Manager · Lista Usuários</title>



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
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
            <a class="nav-link" href="form_cd.php">
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
      <h2>Usuários cadastrados</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($lista as $key => $usuario) : ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td><?= $usuario->getUsername(); ?></td>
              <td><?= $usuario->getNome(); ?></td>
              <td>
                <a href="delete_usuario.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir esse usuário?')">[ Apagar ]</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</html>