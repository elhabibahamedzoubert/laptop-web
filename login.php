<?php
// Inclure le fichier de connexion
include('connect.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Rechercher l'utilisateur par email
    $sql = "SELECT * FROM Login WHERE Email='$email'";
    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe
    if ($result->num_rows > 0) {
        // Récupérer les données de l'utilisateur
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['Password'])) {
            // Connexion réussie
            echo "Connexion réussie ! Bienvenue, " . $user['Email'];
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}

// Fermer la connexion
$conn->close();
?>
