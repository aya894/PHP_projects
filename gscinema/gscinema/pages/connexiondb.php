<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=gestion_cinema","root", "");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
?>