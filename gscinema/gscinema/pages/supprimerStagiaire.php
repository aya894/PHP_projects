<?php
        
    require_once('connexiondb.php');
                
    $idS=isset($_GET['idS'])?$_GET['idS']:0;

    $requete="delete from reservation where idFilm=?";
                
    $params=array($idS);
                
    $resultat=$pdo->prepare($requete);
                
    $resultat->execute($params);
                
    header('location:stagiaires.php'); 
                
?>