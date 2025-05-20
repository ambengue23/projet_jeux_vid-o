<?php
    // Connexion
    $host         = 'localhost';
    $dbname       = 'ma_bd';
    $username     = 'Assane';
    $mot_de_passe = 'btsinfo';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $mot_de_passe);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Vérifie si l’ID est passé
    if (! isset($_GET['id']) || ! is_numeric($_GET['id'])) {
        die("ID de ticket invalide.");
    }

    $id = (int) $_GET['id'];

    // Suppression du ticket
    if (isset($_POST['supprimer'])) {
        $pdo->prepare("DELETE FROM tickets WHERE idT = ?")->execute([$id]);
        header("Location: admin_tickets.php?deleted=1");
        exit;
    }

    // Réponse admin : on ajoute une colonne "reponse_admin" si elle n’existe pas
    $pdo->exec("ALTER TABLE tickets ADD COLUMN IF NOT EXISTS reponse_admin TEXT");

    // Mise à jour du ticket
    if (isset($_POST['modifier'])) {
        $description = $_POST['description'];
        $categorie   = $_POST['categorie'];
        $statut      = $_POST['statut'];
        $reponse     = $_POST['reponse_admin'];

        $update = $pdo->prepare("UPDATE tickets SET description = ?, categorie = ?, statut = ?, reponse_admin = ? WHERE idT = ?");
        $update->execute([$description, $categorie, $statut, $reponse, $id]);

        header("Location: consulter_ticket.php?id=" . $id);
        exit;
    }

    // Récupération des données
    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE idT = ?");
    $stmt->execute([$id]);
    $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

    if (! $ticket) {
        die("Ticket introuvable.");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ticket #<?php echo $ticket['idT'] ?> - Consultation</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 700px; margin: auto; }
        label { display: block; margin-top: 15px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 20px; padding: 10px 20px; }
        .danger { background-color: #dc3545; color: white; border: none; }
        .secondary { margin-left: 10px; }
    </style>
</head>
<body>
    <h1>Détails du ticket #<?php echo $ticket['idT'] ?></h1>

    <form method="post">
        <label>Nom :
            <input type="text" value="<?php echo htmlspecialchars($ticket['nom']) ?>" disabled>
        </label>

        <label>Email :
            <input type="text" value="<?php echo htmlspecialchars($ticket['email']) ?>" disabled>
        </label>

        <label>Catégorie :
            <input type="text" name="categorie" value="<?php echo htmlspecialchars($ticket['categorie']) ?>">
        </label>

        <label>Description :
            <textarea name="description" rows="6"><?php echo htmlspecialchars($ticket['description']) ?></textarea>
        </label>

        <label>Statut :
            <select name="statut">
                <?php
                    $options = ['ouvert', 'en cours', 'fermé'];
                    foreach ($options as $option) {
                        $selected = ($ticket['statut'] === $option) ? 'selected' : '';
                        echo "<option value=\"$option\" $selected>$option</option>";
                    }
                ?>
            </select>
        </label>

        <label>Réponse de l'administrateur :
            <textarea name="reponse_admin" rows="4"><?php echo htmlspecialchars($ticket['reponse_admin'] ?? '') ?></textarea>
        </label>

        <label>Date de demande :
            <input type="text" value="<?php echo $ticket['date_demande'] ?>" disabled>
        </label>

        <label>Créé le :
            <input type="text" value="<?php echo $ticket['created_at'] ?>" disabled>
        </label>

        <button type="submit" name="modifier">Enregistrer les modifications</button>
        <button type="submit" name="supprimer" class="danger" onclick="return confirm('Supprimer ce ticket ?')">Supprimer le ticket</button>
    </form>

    <p class="secondary"><a href="admin_tickets.php">← Retour à la liste des tickets</a></p>
</body>
</html>
