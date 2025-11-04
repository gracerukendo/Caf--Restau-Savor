<?php
session_start();
require_once '../config/db.php'; // Connexion à la base de données

// =================== INSCRIPTION CLIENT ===================
if(isset($_POST['btn_register'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $motdepasse = htmlspecialchars($_POST['password']);
    $confirm_mdp = htmlspecialchars($_POST['confirm_password']);

    // Vérification mots de passe identiques
    if($motdepasse !== $confirm_mdp){
        header('Location: ../Inscription.php?msg=Les mots de passe ne correspondent pas');
        exit;
    }

    // Vérifier si l'email existe déjà
    $sql = $mysql->prepare("SELECT * FROM clients WHERE email = ?");
    $sql->execute([$email]);
    if($sql->rowCount() > 0){
        header('Location: ../Inscription.php?msg=Cet email existe déjà, veuillez vous connecter');
        exit;
    }

    // Hachage du mot de passe
    $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

    // =================== GESTION DE L'AVATAR ===================
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $dossier = '../uploads/';
        if (!is_dir($dossier)) mkdir($dossier, 0777, true);

        $nomFichier = uniqid() . '_' . basename($_FILES['avatar']['name']);
        $chemin = $dossier . $nomFichier;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin)) {
            // chemin relatif à utiliser dans le site
            $avatar = 'uploads/' . $nomFichier;
        } else {
            $avatar = null;
        }
    } else {
        $avatar = null;
    }

    // =================== INSERTION EN BASE ===================
    $sql = $mysql->prepare("INSERT INTO clients(nom, postnom, email, telephone, motdepasse, avatar) VALUES (?, ?, ?, ?, ?, ?)");
    $result = $sql->execute([$nom, $postnom, $email, $telephone, $motdepasse_hache, $avatar]);

    if($result){
        header('Location: ../Connexion.php?msg=Votre compte a été créé avec succès, connectez-vous');
        exit;
    } else {
        header('Location: ../Inscription.php?msg=Erreur lors de la création du compte');
        exit;
    }
}

// =================== CONNEXION CLIENT ===================
if(isset($_POST['btn_login'])) {
    $email = htmlspecialchars($_POST['email']);
    $motdepasse = htmlspecialchars($_POST['password']);

    // Vérifier si le client existe
    $sql = $mysql->prepare("SELECT * FROM clients WHERE email = ?");
    $sql->execute([$email]);
    if($sql->rowCount() > 0){
        $client = $sql->fetch();

        if(password_verify($motdepasse, $client['motdepasse'])){
            // Stockage des infos dans la session
            $_SESSION['id_client'] = $client['id_client'];
            $_SESSION['nom'] = $client['nom'];
            $_SESSION['postnom'] = $client['postnom'];
            $_SESSION['email'] = $client['email'];
            $_SESSION['telephone'] = $client['telephone'];
            $_SESSION['avatar'] = $client['avatar']; 
            
            header('Location: ../modif.php?msg=Bienvenue sur votre compte');
            exit;
        } else {
            header('Location: ../Connexion.php?msg=Mot de passe incorrect');
            exit;
        }
    } else {
        header('Location: ../Connexion.php?msg=Aucun compte trouvé avec cet email');
        exit;
    }
}
