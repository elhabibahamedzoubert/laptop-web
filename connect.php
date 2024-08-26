<?php
// Paramètres de connexion à la base de données
$servername = "localhost";  // ou 127.0.0.1
$username = "root";         // Votre nom d'utilisateur MySQL
$password = "";             // Votre mot de passe MySQL
$dbname = "my_database";    // Nom de votre base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Si vous voulez confirmer la connexion, vous pouvez ajouter un message (optionnel)
// echo "Connexion réussie";
?>
