<div class="container-fluid ">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Documentos
        </button>
        <div class="collapse " id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="<?php echo base_url('/Leyes') ?>" class="link-White rounded">Leyes</a></li>
            <li><a href="<?php echo base_url('/RegistrosOfi') ?>" class="link-White rounded">Registros Oficiales</a></li>
            
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#Clie-collapse" aria-expanded="False">
          Clientes
        </button>
        <div class="collapse " id="Clie-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="<?php echo base_url('/Cliente') ?>" class="link-White rounded">Cliente</a></li>
            <li><a href="#" class="link-White rounded">Updates</a></li>
            <li><a href="#" class="link-White rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#Codi-collapse" aria-expanded="False">
          Codificadores
        </button>
        <div class="collapse " id="Codi-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="<?php echo base_url('/Usuario') ?>" class="link-White rounded">Usuarios</a></li>
            <li><a href="<?php echo base_url('/Agrupamiento') ?>" class="link-White rounded">Agrupamientos</a></li>
            <li><a href="<?php echo base_url('/Funcion') ?>" class="link-White rounded">Funcion</a></li>
            <li><a href="#" class="link-White rounded">Organismo</a></li>
            <li><a href="<?php echo base_url('/Categoria') ?>" class="link-White rounded">Categorias</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed text-white" data-bs-toggle="collapse" data-bs-target="#Borra-collapse" aria-expanded="False">
          Borrados
        </button>
        <div class="collapse" id="Borra-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-White rounded">Overview</a></li>
            <li><a href="#" class="link-White rounded">Updates</a></li>
            <li><a href="#" class="link-White rounded">Reports</a></li>
          </ul>
        </div>
      </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <span data-feather="users"></span>
              Borrados
            </a>
          </li>
        </ul>

        
        </div>
      </div>
    </nav>
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      

      <?= $this->renderSection('contenido') ?>

    
      
    </main>
  </div>
</div>

<div class="b-example-divider"></div>
   
