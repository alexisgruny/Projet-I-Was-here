<header>
  <nav>
    <ul>
      <?php if (isset($_SESSION['isConnect']) == false) { ?>
        <li><a href="/controller/logIn.php">Connexion</a></li>
        <li><a href="/controller/SignIn.php">Inscription</a></li>
      <?php } else { ?>
        <li><a href="/controller/profil.php">Profil</a></li>
        <li><a href="/controller/disconnect.php">Déconnexion</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>