<?php
// Inclure le fichier de connexion
include('connect.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insérer les données dans la base de données
    $sql = "INSERT INTO Login (Email, Password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie ! Vous pouvez maintenant <a href='login.html'>vous connecter</a>.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>
