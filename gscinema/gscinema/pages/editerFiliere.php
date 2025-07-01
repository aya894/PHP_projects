<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from salle where idSalle=$idf";
    $resultat=$pdo->query($requete);
    $filiere=$resultat->fetch();
    $nomf=$filiere['nomSalle'];
    $niveau=strtolower($filiere['niveau']);
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une filière</title>
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
                <div class="panel-heading">Edition de la filière :</div>
                <div class="panel-body">
                    <form method="post" action="updateFiliere.php" class="form">
						<div class="form-group">
                             <label for="niveau">id de la filière: <?php echo $idf ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $idf ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="niveau">Nom de la filière:</label>
                            <input type="text" name="nomF" 
                                   placeholder="Nom de la filière"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="niveau">Niveau:</label>
				            <select name="niveau" class="form-control" id="niveau">
                                <option value="q" <?php if($niveau=="Ben Arous azur city") echo "selected" ?>>Ben Arous azur city</option>
                                <option value="t" <?php if($niveau=="Rue Said Abou Bakert") echo "selected" ?>>Rue Said Abou Bakert</option>
                                <option value="ts"<?php if($niveau=="Avenu Habib Bourguiba") echo "selected" ?>>Avenu Habib Bourguiba</option>
                                <option value="l" <?php if($niveau=="Ariana") echo "selected" ?>>Ariana</option>
                                <option value="m" <?php if($niveau=="Houmet-souk Djerba") echo "selected" ?>>Houmet-souk Djerba</option> 
				            </select>
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