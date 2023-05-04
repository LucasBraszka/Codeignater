<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo TITULO; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Catalogo</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Gestion de usuarios
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url("usuarios/nuevo"); ?>" ><i class="bi bi-people"></i> Alta de Usuario</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("usuarios/index") ?>"><i class="bi bi-card-checklist"></i> Lista de usuarios</a>
          
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Gestion de Articulos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url("usuarios/nuevo"); ?>" ><i class="bi bi-people"></i> Alta de Articulos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url("usuarios/index") ?>"><i class="bi bi-card-checklist"></i> Lista de Articulos</a>
     
          
        </div>
      </li>
    </ul>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-square"> </i><?php echo $this->session->userdata("usuario"); ?>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"></a>
          <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo site_url("Auth/salir"); ?>">Salir <i class="bi bi-door-open"></i></a>
      </div>
    </div>
    &nbsp;
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar productos..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>