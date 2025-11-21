<?php
session_start();

// Vérifie si l'utilisateur est connecté
if(!isset($_SESSION['id_client'])){
    header('Location: Connexion.php?msg=Veuillez vous connecter pour accéder à votre compte');
    exit;
}

require_once 'parties/haeder.php';
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Mon compte</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Mon compte</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <section id="account" class="account section" style="min-height: 80vh; padding: 40px 0;">
    <div class="container">

      <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-info mb-4">
          <?= htmlspecialchars($_GET['msg']); ?>
        </div>
      <?php endif; ?>

      <div class="row g-4  ">
        <!-- Menu utilisateur -->
        <div class="col-lg-3 ">
          <div class="card p-3 ">
            <div class="text-center mb-3">
              <?php if(!empty($_SESSION['avatar'])): ?>
                 <img src="<?= htmlspecialchars($_SESSION['avatar']); ?>" alt="Avatar" style="width:100px; border-radius:50%;">
             <?php else: ?>
                 <img src="assets/img/default-avatar.png" alt="Avatar" style="width:100px; border-radius:50%;">
             <?php endif; ?>

              <h4 class="mt-2"><?= $_SESSION['nom'] . ' ' . $_SESSION['postnom'] ?></h4>
              <p><?= $_SESSION['email'] ?></p>
              <p><?= $_SESSION['telephone'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
             <nav class="menu-nav">
                <ul class="nav flex-column" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="reservation.php">
                      <i class="bi bi-box-seam"></i>
                      <span>My Orders</span>
                      <span class="badge">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                      <i class="bi bi-heart"></i>
                      <span>Wishlist</span>
                      <span class="badge">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#wallet">
                      <i class="bi bi-wallet2"></i>
                      <span>Payment Methods</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="mescommandes.php">
                      <i class="bi bi-star"></i>
                      <span>My Reviews</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="index.php#location">
                      <i class="bi bi-geo-alt"></i>
                      <span>Addresses</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="modif.php">
                      <i class="bi bi-gear"></i>
                      <span>Account Settings</span>
                    </a>
                  </li>
                </ul>
                <hr>
                <div class="menu-footer m-3 ">
                  <a href="#" class="help-link">
                    <i class="bi bi-question-circle"></i>
                    <span>Help Center</span>
                  </a><br>
                  <a href="actions/actions_deconnexion.php" class="logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Déconnexion</span>
                  </a>
                </div>
              </nav>
           </ul>
          </div>
        </div>

        <!-- Contenu -->
        <div class="col-lg-9">
          <div class="card br-5 p-4">
            <h3>Bienvenue, <?= $_SESSION['nom'] ?> !</h3>
            <p>Ici vous pouvez gérer vos informations, voir vos commandes et vos favoris.</p>

            <!-- Exemples de sections -->
            <div id="orders">
              <h4>Mes commandes</h4>
              <p>Aucune commande pour le moment.</p>
            </div>

            <div id="wishlist" class="mt-4">
              <h4>Mes favoris</h4>
              <p>Vous n'avez pas encore ajouté de favoris.</p>
            </div>

            <div id="settings" class="mt-4">
              <h4>Paramètres du compte</h4>
              <p>Vous pouvez modifier vos informations personnelles ici (à implémenter).</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php require_once 'parties/footer.php'; ?>
