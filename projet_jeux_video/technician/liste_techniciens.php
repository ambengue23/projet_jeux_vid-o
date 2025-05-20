<?php
    $host     = 'localhost';
    $dbname   = 'ma_bd';
    $username = 'Assane';
    $password = 'btsinfo';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    $stmt        = $pdo->query("SELECT id, nom, date_creation FROM techniciens ORDER BY date_creation DESC");
    $techniciens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Techniciens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f8f9fa;
        }
        table {
            border-collapse: collapse;
            margin: auto;
            width: 80%;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #dee2e6;
        }
        th {
            background-color: #0077b6;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
            color: #023e8a;
        }
    </style>
</head>
<body>

<h2>Liste des Techniciens</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($techniciens) === 0): ?>
            <tr><td colspan="3" style="text-align:center;">Aucun technicien trouvé.</td></tr>
        <?php else: ?>
<?php foreach ($techniciens as $tech): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tech['id']) ?></td>
                    <td><?php echo htmlspecialchars($tech['nom']) ?></td>
                    <td><?php echo htmlspecialchars($tech['date_creation']) ?></td>
                    <td>
                        <form method="POST" action="supprimer_technicien.php" onsubmit="return confirm('Supprimer ce technicien ?');">
                          <input type="hidden" name="id" value="<?php echo $tech['id'] ?>">
                          <button type="submit" style="background:red;color:white;border:none;padding:5px 10px;">Supprimer</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
<?php endif; ?>
    </tbody>
</table>

</body>
</html>
