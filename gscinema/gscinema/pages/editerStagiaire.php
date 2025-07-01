<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idS=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteS="select * from reservation where idFilm=$idS";
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nom=$stagiaire['nom'];
    $prenom=$stagiaire['prenom'];
    $civilite=strtoupper($stagiaire['civilite']);
    $idFiliere=$stagiaire['idSalle'];
    $nomPhoto=$stagiaire['photo'];

    $requeteF="select * from salle";
    $resultatF=$pdo->query($requeteF);

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <style>
    .marge {
    margin-top: 60px;
}
</style>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary marge">
                <div class="panel-heading">Edition du stagiaire :</div>
                <div class="panel-body">
                    <form method="post" action="updateStagiaire.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idS">id du stagiaire: <?php echo $idS ?></label>
                            <input type="hidden" name="idS" class="form-control" value="<?php echo $idS ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="idFiliere">Filière:</label>
				            <select name="idFiliere" class="form-control" id="idFiliere">
                              <?php while($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idSalle'] ?>"
                                         <?php if($idFiliere===$filiere['idSalle']) echo "selected" ?>> 
                                    <?php echo $filiere['nomSalle'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                             <img src="../images/<?php echo $nomPhoto ?>" width="50px" height="50px" class="img-circle">
                            <input type="file" name="photo" <?php if($stagiaire['photo']) echo $nomPhoto ?> />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>