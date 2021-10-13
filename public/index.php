<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Portal de Eventos SCI | Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <!-- <link href="./assets/css//bootstrap.min.css" rel="stylesheet"> -->
    <link href="./assets/css//bootstrap.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
<header>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container">

      <a class="navbar-brand" href="#"> <img src="./assets/img/logo.png" alt="Logo Portal de Eventos SCI Imagem"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse flex-row-reverse justify-content-between" id="navbarToggleExternalContent">

        <ul class="navbar-nav mb-md-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Sobre o Portal</a>
          </li>
        </ul>

        <form action="/event/searchbytext" method="POST" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Procure por um evento ou notícia" aria-label="Search" name="inputSearch">
            <button class="btn btn-green" type="submit">Buscar</button>
          </form>

      </div>

    </div>

  </nav>

</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">




  <?php
    require '../Application/autoload.php';

    use Application\core\App;
    use Application\core\Controller;

    $app = new App();

  ?>




  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <div class="row footer-align">
      <div class="col-sm footer-scale">
        <img src="./assets/img/logo.png" alt="Logo Portal de Eventos SCI Imagem">
        <img src="./assets/img/logoIFSP.png" alt="Logo Instituto Federal de São Paulo Imagem">
      </div>
      <div class="col-sm">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notícias </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre o Portal de Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Termos de Uso</a>
          </li>
        </ul>
      </div>
      <div class="col-sm">
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


    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

      
  </body>
</html>