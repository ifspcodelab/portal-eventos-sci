<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portal de Eventos">
    <meta name="author" content="IFSP Codelab e colaboradores">
    <title>IFSP - Portal de Eventos SCI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> -->
    
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css"  href="/../../assets/fonts/style.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/../../assets/img/favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="#7952b3">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/assets/css/commom.css">
  </head>

<body class="d-flex flex-column h-100">
    
  <header id="header">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light shadow">
      <div class="container">

        <a class="navbar-brand" href="../../"> 
          <img src="../../assets/img/logo.png" alt="Logo Portal de Eventos SCI Imagem">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row-reverse justify-content-between" id="navbarCollapse">

          <ul class="navbar-nav mb-md-0 mx-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../event">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../news">Notícias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../about">Sobre o Portal</a>
            </li>
          </ul>

        <form action="/event/searchbytext" method="POST" class="d-flex flex-fill">
           <div class="form-group has-search d-flex flex-fill">
            <span class="icon-Search form-control-feedback"></span>
            <input class="form-control mx-1 shadow-sm" type="search" placeholder="Procure por um evento ou notícia" aria-label="Search" name="inputSearch">
          </div>
          <button class="btn btn-green" type="submit"> Buscar</button> 
        </form>

      </div>

    </nav>
  </header>

<!-- Begin page content -->

  <?php
    // ini_set('error_reporting', "E_STRICT");
    require '../Application/autoload.php';

    use Application\core\App;
    use Application\core\Controller;

    $app = new App();

  ?>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <div class="row footer-align">
        <div class="col-sm footer-scale footer-order-1">
          <img src="../../assets/img/logo.png" alt="Logo Portal de Eventos SCI Imagem">
          <img src="../../assets/img/logoIFSP.png" alt="Logo Instituto Federal de São Paulo Imagem">
        </div>
        <div class="col-sm footer-order-2">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#header">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../event">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../news">Notícias </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../about">Sobre o Portal de Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Termos de Uso</a>
            </li>
          </ul>
        </div>
        <div class="col-sm footer-order-3">
          <a class="btn btn-green float-end" href="#">Entre em contato</a>
        </div>
      </div>
      <div class="row">
        <hr>
        <div class="footer-info">
          <div>
            <span>
              &copy; 2021 IFSP CodeLab
            </span>
            <span>
              Todos os direitos reservados
            </span>
          </div>
          <div>
            <a href="mailto:eventossci@contato.com">eventossci@contato.com</a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bar"></div>
  </footer>

  <!-- Bootstrap script -->
  <script type="text/javascript" language="javascript"  src="/assets/js/bootstrap.js"></script>

  <!-- Font Awesome Script -->
  <script type="text/javascript" language="javascript"  src="https://kit.fontawesome.com/6726683f80.js" crossorigin="anonymous"></script>

  <!-- DataTables script -->
  <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="../../assets/js/datatable.script.js"></script>-->

  <script type="text/javascript" language="javascript" src="/assets/js/commom.js"></script>
</body>
</html>