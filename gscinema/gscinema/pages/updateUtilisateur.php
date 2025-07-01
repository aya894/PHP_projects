<?php
session_start();
require_once('identifier.php');
require_once('connexiondb.php');

// Récupération des données du formulaire
$idUser = isset($_POST['iduser']) ? $_POST['iduser'] : 0;
$login = isset($_POST['login']) ? $_POST['login'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
if ($_SESSION['user']['role']=='ADMIN') {
// Requête de mise à jour
    $requete = "UPDATE utilisateur SET login=?, email=?, role=? WHERE iduser=?";

    // Préparation de la requête
    $resultat = $pdo->prepare($requete);

    if ($resultat) {
        // Exécution de la requête avec les paramètres
        $resultat->execute([$login, $email, $role, $idUser]);

        // Redirection après la mise à jour
        header('location:login.php');
        exit; // Arrêter l'exécution du script après la redirection
    } else {
        // Gérer le cas où la préparation de la requête a échoué
        echo "Erreur lors de la préparation de la requête de mise à jour.";
        exit; // Arrêter l'exécution du script
}}else{
    $requete2 = "UPDATE utilisateur SET login=?, email=? WHERE iduser=?";
    $resultat2 = $pdo->prepare($requete2);
    if ($resultat2) {
        // Exécution de la requête avec les paramètres
        $resultat2->execute([$login, $email, $idUser]);

        // Redirection après la mise à jour
        header('location:login.php');
        exit; // Arrêter l'exécution du script après la redirection
    } else {
        // Gérer le cas où la préparation de la requête a échoué
        echo "Erreur lors de la préparation de la requête de mise à jour.";
        exit; // Arrêter l'exécution du script
}}
?>
