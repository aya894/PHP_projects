<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";

    $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";
    
    $requete="update salle set nomSalle=?,locall=? where idSalle=?";

    $params=array($nomf,$niveau,$idf);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:filieres.php');
?>