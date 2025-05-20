<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    require_once '../donnee/db.php'; // Connexion à la base

    // Récupération des services d’assistance
    $assistance = $pdo->query("SELECT idOS, nom_service FROM assistance")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire des Utilisateurs</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('../image/formulaire.jpg'); /* Chemin de l'image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      padding: 30px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: blue;
      text-shadow: 1px 1px 3px black;
    }

    h2 {
      color: blue;
      margin-top: 10px;
    }

    form {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 25px 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input, textarea, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #1d3557;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #457b9d;
    }
  </style>
</head>
<body>

  <h1>Bienvenue dans le formulaire des utilisateurs</h1>
  <h2>Créer un nouveau ticket</h2>

  <form action="traitement.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>

    <label for="categorie">Catégorie :</label>
    <input type="text" name="categorie" id="categorie" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description" required></textarea>

    <label for="date_demande">Date de demande :</label>
    <input type="date" name="date_demande" id="date_demande" required>

    <label for="idOS">Assistance :</label>
    <select name="idOS" id="idOS" required>
        <option value="">-- Choisir --</option>
        <?php foreach ($assistance as $a): ?>
            <option value="<?php echo $a['idOS']; ?>">
                <?php echo htmlspecialchars($a['nom_service']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Envoyer le ticket">
  </form>

</body>
</html>
