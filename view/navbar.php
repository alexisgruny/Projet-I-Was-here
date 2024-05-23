<header>
  <nav>
    <ul>
      <li><a href="">Connexion</a></li>
      <li><a href="">Inscription</a></li>
    </ul>
  </nav>
</header>


<!-- <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">I Was Here</a>
        <form class="d-flex" role="search">
          <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
               Bouton connexion/inscription , si connecté affiche un bouton déconnexion 
              <li class="nav-item">
                <?php if (isset($_SESSION['isConnect']) == true) { ?>
                  <a class="nav-link mt-1 mr-5" href="/controller/profil.php">Profile</a>
                  <a class="nav-link mt-1 mr-5" href="/controller/disconnect.php">Déconnexion</a>
                <?php } else { ?>
                  <a class="nav-link mt-1 mr-5" href="/controller/logIn.php">Connexion</a>
                  <a class="nav-link mt-1 mr-5" href="/controller/signIn.php">Inscription</a>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>

  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->