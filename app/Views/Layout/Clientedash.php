<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="<?php echo base_url() . '/css/estilos.css' ?>"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>mtecuador</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url('/') ?>">MTECUADOR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/Historia') ?>">NOSOTROS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">RODS-W</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">ACTUALEG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SISBALEG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/adm') ?>">ADMIN</a>
          </li>
        </ul>
        <script async src="https://cse.google.com/cse.js?cx=161d7fc7ac33f5875"></script>
        <div class="gcse-search"></div>
      </div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php
          if (session('usuario') != '') {
          ?>
            <a class="nav-link" href="#"><?php echo session('usuario'); ?></a>
          <?php } else {
          ?>
            <a class="nav-link" href="<?php echo base_url('/Login/ingresar') ?>">iniciar sesion</a>
          <?php
          }
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/Registrarse') ?>">Registrarse</a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  if (session('usuario') != '') {
    echo $this->include('Partials/SegundoMenu');
  }
  ?>

  <?= $this->renderSection('contenido') ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.js"></script>
  <script src="<?php echo base_url() ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/dist/js/adminlte.js"></script>
  <script src="<?php echo base_url() ?>/ckeditor/ckeditor.js"></script>
  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://getbootstrap.com/docs/5.0/examples/sidebars/sidebars.js"></script>
  <style>
    .gsc-control-cse {
      background-color: #ffc107;
      border: 1px solid #ffc107;
    }
  </style>
</body>

</html>