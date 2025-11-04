<?php
session_start();
require_once 'config/db.php';

// Vérifie si l'administrateur est connecté
if (!isset($_SESSION['id_client'])) {
    header('Location: Connexion.php?msg=Veuillez vous connecter pour accéder à cette page');
    exit;
}

// Récupère toutes les réservations
try {
    $sql = $mysql->query("SELECT * FROM reservations ORDER BY date_reservation DESC");
    $reservations = $sql->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des réservations : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Réservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <!-- Bouton Retour Dashboard -->
    <div class="mb-4">
        <a href="moncompte.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Retour au Dashboard
        </a>
    </div>

    <h2 class="mb-4">Toutes les Réservations</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Nombre d'invités</th>
                <th>Type d'événement</th>
                <th>Message</th>
                <th>Date de réservation</th>
            </tr>
        </thead>
        <tbody>
            <?php if($reservations): ?>
                <?php foreach($reservations as $res): ?>
                    <tr>
                        <td><?= htmlspecialchars($res['nom']) ?></td>
                        <td><?= htmlspecialchars($res['email']) ?></td>
                        <td><?= htmlspecialchars($res['telephone']) ?></td>
                        <td><?= htmlspecialchars($res['date_evenement']) ?></td>
                        <td><?= htmlspecialchars($res['heure']) ?></td>
                        <td><?= htmlspecialchars($res['nombre_invites']) ?></td>
                        <td><?= htmlspecialchars($res['type_evenement']) ?></td>
                        <td><?= htmlspecialchars($res['message']) ?></td>
                        <td><?= htmlspecialchars($res['date_reservation']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">Aucune réservation trouvée</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap Icons et JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
