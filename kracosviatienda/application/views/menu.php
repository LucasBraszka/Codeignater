<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url("catalogo/index"); ?>"><?php echo TITULO; ?> <i class="bi bi-shop"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Offers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Searches</a>
      </li>
    </ul>
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    <?php echo $this->session->userdata("usuario"); ?>
    </button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo site_url("auth/salir");?>"><i class="bi bi-door-closed"></i> Logout</a>
  </div>
</div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>