<?php
session_start();
require_once 'config/db.php'; // Connexion à la base de données

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['id_client'])){
    header('Location: Connexion.php?msg=Veuillez vous connecter pour accéder à votre compte.');
    exit;
}

// Récupérer les infos depuis la session
$nom = $_SESSION['nom'];
$postnom = $_SESSION['postnom'];
$email = $_SESSION['email'];
$telephone = $_SESSION['telephone'] ?? '';
$avatar = $_SESSION['avatar'] ?? null;
?>

<?php require_once 'parties/haeder.php'; ?>

<main class="main">
  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Mon Compte</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Mon Compte</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Account Section -->
  <section id="account" class="account section" style="
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

    <div class="container position-relative" style="z-index: 2;">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="p-5 rounded-4 shadow-lg" style="
              backdrop-filter: blur(10px);
              background: rgba(255, 255, 255, 0.2);
              border: 1px solid rgba(255, 255, 255, 0.3);
              color: #fff;
              text-align:center;
          ">

            <h2 class="mb-4 fw-bold">Bienvenue sur votre compte</h2>

            <!-- Message -->
            <?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>
                <div style="background: rgba(255,255,255,0.2); border:1px solid rgba(255,255,255,0.3); color:#fff; padding:10px; border-radius:10px; margin-bottom:15px;">
                    <?= htmlspecialchars($_GET['msg']); ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire de modification -->
            <form action="actions/action_modifier.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_client" value="<?= $_SESSION['id_client'] ?>">

                <!-- Avatar avec crayon -->
                <div style="position: relative; display: inline-block; width: 150px; height: 150px; margin-bottom: 20px;">
                    <?php if(!empty($avatar)): ?>
                        <img src="<?= htmlspecialchars($avatar); ?>" alt="Avatar"
                             style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                    <?php else: ?>
                        <div style="width:100%; height:100%; border-radius:50%; background: rgba(255,255,255,0.2); display:flex; justify-content:center; align-items:center; color:#fff; font-size:80px;">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    <?php endif; ?>

                    <label for="avatar-input" style="position:absolute; bottom:0; right:0; background:#0d6efd; border-radius:50%; width:40px; height:40px; display:flex; justify-content:center; align-items:center; cursor:pointer;">
                        <i class="fa fa-pencil" style="color:#fff;"></i>
                    </label>
                </div>

                <input type="file" id="avatar-input" name="avatar" style="display:none;" onchange="this.form.submit()">

                <!-- Nom -->
                <div class="mb-3 text-start">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="<?= htmlspecialchars($nom) ?>" class="form-control" required>
                </div>

                <!-- Postnom -->
                <div class="mb-3 text-start">
                    <label class="form-label">Postnom</label>
                    <input type="text" name="postnom" value="<?= htmlspecialchars($postnom) ?>" class="form-control" required>
                </div>

                <!-- Téléphone -->
                <div class="mb-3 text-start">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" value="<?= htmlspecialchars($telephone) ?>" class="form-control">
                </div>

                <!-- Mot de passe -->
                <div class="mb-3 text-start">
                    <label class="form-label">Mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" name="btn_edit" class="btn btn-info mt-3 w-100">Modifier</button>
            </form>

            <!-- Infos utilisateur -->
            <p class="mt-3"><strong>Email :</strong> <?= htmlspecialchars($email); ?></p>

            <!-- Déconnexion -->
            <a href="actions/action_deconection.php" class="btn btn-warning mt-3 w-100" style="color:#fff; text-decoration:none; border-radius:5px;">
              Déconnexion
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once 'parties/footer.php'; ?>
