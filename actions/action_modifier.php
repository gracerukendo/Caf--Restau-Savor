<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['btn_edit'])) {
    $id_client = $_POST['id_client'];
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $password = $_POST['password'];

    // Récupérer l'ancienne photo depuis la base
    $stmt = $mysql->prepare("SELECT avatar FROM clients WHERE id_client = ?");
    $stmt->execute([$id_client]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $ancien_avatar = $user['avatar'] ?? null;

    $avatar = $ancien_avatar; // garder l'ancienne par défaut

    // Si une nouvelle image a été uploadée
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $dossier = '../uploads/';
        if (!is_dir($dossier)) mkdir($dossier, 0777, true);

        $filename = time() . '_' . basename($_FILES['avatar']['name']);
        $chemin = $dossier . $filename;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin)) {
            // Supprimer l'ancienne image si elle existe
            if (!empty($ancien_avatar) && file_exists('../' . $ancien_avatar)) {
                unlink('../' . $ancien_avatar);
            }
            $avatar = 'uploads/' . $filename; // chemin relatif pour affichage
        } else {
            header("Location: ../account.php?msg=Erreur lors de l'upload de l'image");
            exit;
        }
    }

    // Mise à jour SQL
    if (!empty($password)) {
        $password_hache = password_hash($password, PASSWORD_DEFAULT);
        $sql = $mysql->prepare("UPDATE clients SET nom=?, postnom=?, telephone=?, motdepasse=?, avatar=? WHERE id_client=?");
        $sql->execute([$nom, $postnom, $telephone, $password_hache, $avatar, $id_client]);
    } else {
        $sql = $mysql->prepare("UPDATE clients SET nom=?, postnom=?, telephone=?, avatar=? WHERE id_client=?");
        $sql->execute([$nom, $postnom, $telephone, $avatar, $id_client]);
    }

    // Mise à jour de la session
    $_SESSION['nom'] = $nom;
    $_SESSION['postnom'] = $postnom;
    $_SESSION['telephone'] = $telephone;
    $_SESSION['avatar'] = $avatar;

    header('Location: ../modif.php?msg=Profil mis à jour avec succès');
    exit;
}
?>
