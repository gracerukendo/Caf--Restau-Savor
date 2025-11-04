<?php
session_start();
require_once 'config/db.php';

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['id_client'])){
    header('Location: Connexion.php?msg=Veuillez vous connecter pour modifier votre profil.');
    exit;
}

// Récupérer infos existantes
$id_client = $_SESSION['id_client'];
$nom = $_SESSION['nom'];
$postnom = $_SESSION['postnom'];
$email = $_SESSION['email'];
$telephone = $_SESSION['telephone'];
$avatar = $_SESSION['avatar'] ?? null;
?>

<?php require_once 'parties/haeder.php'; ?>

<main class="main">
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Modifier Profil</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li class="current">Modifier Profil</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="section">
    <div class="container">
      
      <form action="actions/action_modifier.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_client" value="<?= $id_client ?>">

        <div class="mb-3">
          <label>Nom</label>
          <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($nom) ?>" required>
        </div>

        <div class="mb-3">
          <label>Postnom</label>
          <input type="text" name="postnom" class="form-control" value="<?= htmlspecialchars($postnom) ?>" required>
        </div>

        <div class="mb-3">
          <label>Téléphone</label>
          <input type="text" name="telephone" class="form-control" value="<?= htmlspecialchars($telephone) ?>">
        </div>

        <div class="mb-3">
          <label>Mot de passe (laisser vide pour ne pas changer)</label>
          <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
          <label>Avatar</label>
          <input type="file" name="avatar" class="form-control">
          <?php if($avatar): ?>
            <img src="<?= htmlspecialchars($avatar) ?>" alt="Avatar" style="width:100px; border-radius:50%; margin-top:10px;">

          <?php endif; ?>
        </div>

        <button type="submit" name="btn_edit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </section>
</main>

<?php require_once 'parties/footer.php'; ?>
