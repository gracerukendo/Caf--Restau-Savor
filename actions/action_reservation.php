<?php
session_start();
require_once '../config/db.php';

// Vérifie si le formulaire a été soumis
if(isset($_POST['btn-submit'])) {

    // Récupération et sécurisation des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date_evenement = htmlspecialchars($_POST['date']);
    $heure = htmlspecialchars($_POST['time']);
    $nombre_invites = htmlspecialchars($_POST['guest_count']);
    $type_evenement = htmlspecialchars($_POST['event_type']);
    $message = htmlspecialchars($_POST['message']);

    try {
        // Préparation de la requête d'insertion
        $stmt = $mysql->prepare("
            INSERT INTO reservations 
            (nom, email, telephone, date_evenement, heure, nombre_invites, type_evenement, message, date_reservation)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");

        // Exécution de la requête avec les valeurs
        $stmt->execute([
            $nom, 
            $email, 
            $phone, 
            $date_evenement, 
            $heure, 
            $nombre_invites, 
            $type_evenement, 
            $message
        ]);

        // Redirection vers la page principale avec message de succès
        header('Location: ../mescommandes.php?msg=Réservation effectuée avec succès');
        exit;

    } catch(PDOException $e) {
        // Affichage de l'erreur si la requête échoue
        echo "Erreur lors de la réservation : " . $e->getMessage();
    }

} else {
    // Si le formulaire n'a pas été soumis correctement
    header('Location: ../index.php?msg=Erreur: formulaire non soumis');
    exit;
}
?>
