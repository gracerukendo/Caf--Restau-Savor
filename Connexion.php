<?php require_once 'parties/haeder.php'; ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Connexion</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Connexion</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Login Section -->
  <section id="login" class="login section" style="
      background: url('assets/img/restaurant/dessert-5.webp') center/cover no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
  ">

    <!-- Couche semi-transparente -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    "></div>

    <!-- Formulaire -->
    <div class="container position-relative" style="z-index: 2;">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
          <div class="p-5 rounded-4 shadow-lg" style="
              backdrop-filter: blur(10px);
              background: rgba(255, 255, 255, 0.2);
              border: 1px solid rgba(255, 255, 255, 0.3);
              color: #fff;
          ">
            <h2 class="text-center mb-4 fw-bold">Se connecter</h2>

                <?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>
                  <div class="alert alert-info text-center mb-4" style="
                      background: rgba(255,255,255,0.2);
                      border: 1px solid rgba(255,255,255,0.3);
                      color: #fff;
                      border-radius: 10px;
                      padding: 10px;
                  ">
                    <?= htmlspecialchars($_GET['msg']); ?>
                  </div>
                <?php endif; ?>


            <form action="actions/action_login.php" method="POST">
             
             <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-envelope"></i>
                  </span>
                  <input type="email" id="email" name="email" class="form-control" placeholder="exemple@gmail.com" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              <div class="mb-4 position-relative">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-lock"></i>
                  </span>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              <div class="d-grid">
                <button type="submit" name="btn_login" class="btn btn-info btn-lg text-white border-0">Se connecter</button>
              </div>

              <p class="text-center mt-3">
                Pas encore inscrit ? <a href="Inscription.php" class="text-warning">Créer un compte</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php require_once 'parties/footer.php'; ?>
