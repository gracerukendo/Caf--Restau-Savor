<?php require_once 'parties/haeder.php'; ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Inscription</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Inscription</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Register Section -->
  <section id="register" class="register section" style="
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
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    "></div>

    <!-- Formulaire -->
    <div class="container position-relative" style="z-index: 2;">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="p-5 rounded-4 shadow-lg" style="
              backdrop-filter: blur(10px);
              background: rgba(255, 255, 255, 0.2);
              border: 1px solid rgba(255, 255, 255, 0.3);
              color: #fff;
          ">
            <h2 class="text-center mb-4 fw-bold">Créer un compte</h2>

            <!-- Formulaire d'inscription -->
           <form action="actions/action_login.php" method="POST" enctype="multipart/form-data" onsubmit="return validerMotDePasse()">
              
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

              
              <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-user"></i>
                  </span>
                  <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez votre nom" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              
              <div class="mb-3">
                <label for="postnom" class="form-label">Postnom</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-user-tag"></i>
                  </span>
                  <input type="text" id="postnom" name="postnom" class="form-control" placeholder="Entrez votre postnom" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              
              <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-envelope"></i>
                  </span>
                  <input type="email" id="email" name="email" class="form-control" placeholder="exemple@gmail.com" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-phone"></i>
                  </span>
                  <input type="number" id="telephone" name="telephone" class="form-control" placeholder="+243 977 590 946" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-lock"></i>
                  </span>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

              <div class="mb-4">
                <label for="confirm_password" class="form-label">Confirmez le mot de passe</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-lock"></i>
                  </span>
                  <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmez votre mot de passe" required style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>
             
              <div class="mb-4">
              <label for="avatar" class="form-label">Photo de profil</label>
                <div class="input-group">
                  <span class="input-group-text bg-transparent border-0 text-white">
                    <i class="fa-solid fa-image"></i>
                  </span>
                  <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*" style="background: rgba(255,255,255,0.2); color:#fff; border:none;">
                </div>
              </div>

             
              <div class="d-grid">
                <button type="submit" name="btn_register" class="btn btn-success btn-lg text-white border-0">S’inscrire</button>
              </div>

              <p class="text-center mt-3">
                Déjà inscrit ? <a href="Connexion.php" class="text-warning">Connectez-vous ici</a>
              </p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
function validerMotDePasse() {
  const pass = document.getElementById('password').value;
  const confirm = document.getElementById('confirm_password').value;
  if (pass !== confirm) {
    alert(" Les mots de passe ne correspondent pas !");
    return false;
  }
  return true;
}
</script>

<?php require_once 'parties/footer.php'; ?>
