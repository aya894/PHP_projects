<?php 
require_once('identifier.php');
 ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle filière</title>
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
                   
        <div class="panel panel-primary marge"> <!-- Correction de la classe -->
            <div class="panel-heading">Veuillez saisir les données de la nouvelle filière</div>
            <div class="panel-body">
                <form method="post" action="insertFiliere.php" class="form">
                    
                    <div class="form-group">
                        <label for="nomF">Nom de la filière:</label> <!-- Correction de l'attribut for -->
                        <input type="text" name="nomF" 
                               placeholder="Nom de la filière"
                               class="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="niveau">Niveau:</label>
                        <input type="text" name="niveau" 
                               placeholder="Localisation de la salle"
                               class="form-control"/>
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
</html>
