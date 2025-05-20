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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM techniciens WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: liste_techniciens.php'); // Retour à la liste
    exit;
} else {
    die("Requête invalide.");
}
