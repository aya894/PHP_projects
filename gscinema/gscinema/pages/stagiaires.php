<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
  
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:4;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
    $requeteFiliere = "select * from salle";

    if($idfiliere==0){
        $requeteStagiaire="select idFilm,nom,prenom,nomSalle,photo,civilite 
                from salle as f,reservation as s
                where f.idSalle=s.idSalle
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                order by idFilm
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from reservation
                where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
    }else{
         $requeteStagiaire="select idFilm,nom,prenom,nomSalle,photo,civilite 
                from salle as f,reservation as s
                where f.idSalle=s.idSalle
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and f.idSalle=$idfiliere
                 order by idFilm
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countS from reservation
                where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and idSalle=$idfiliere";
    }

    $resultatFiliere=$pdo->query($requeteFiliere);
    $resultatStagiaire=$pdo->query($requeteStagiaire);
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;   
    if($reste===0) 
        $nbrPage=$nbrStagiaire/$size;   
    else
        $nbrPage=floor($nbrStagiaire/$size)+1;  
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <style>
        .marge{
            margin-top:60px;
        }
    </style>
    <body>
        <?php require("menu.php"); ?>
        
        <div class="container">
            <div class="panel panel-success marge">
            
				<div class="panel-heading">Rechercher des stagiaires</div>
				
				<div class="panel-body">
					<form method="get" action="stagiaires.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="nomPrenom" 
                                   placeholder="Nom et prénom"
                                   class="form-control"
                                   value="<?php echo $nomPrenom ?>"/>
                        </div>
                            <label for="idfiliere">Filière:</label>
                            
				            <select name="idfiliere" class="form-control" id="idfiliere" onchange="this.form.submit()">
                                <option value="0" <?php if ($idfiliere == 0) echo "selected" ?>>Toutes les filières</option>
                                <?php
                                // Boucle pour afficher les options du menu déroulant
                                while ($filiere = $resultatFiliere->fetch()) {
                                    ?>
                                    <option value="<?php echo $filiere['idSalle'] ?>" <?php if ($filiere['idSalle'] == $idfiliere) echo "selected" ?>>
                                        <?php echo $filiere['nomSalle'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        
                        &nbsp;&nbsp;
                         
                            <a href="nouveauStagiaire.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                Nouveau Stagiaire
                                
                            </a>
					</form>
				</div>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Stagiaires (<?php echo $nbrStagiaire ?> Stagiaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Stagiaire</th> <th>Nom</th> <th>Prénom</th> 
                                <th>Filière</th> <th>Photo</th><th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($stagiaire=$resultatStagiaire->fetch()){ ?>
                                <tr>
                                    <td><?php echo $stagiaire['idFilm'] ?> </td>
                                    <td><?php echo $stagiaire['nom'] ?> </td>
                                    <td><?php echo $stagiaire['prenom'] ?> </td> 
                                    <td><?php echo $stagiaire['nomSalle'] ?> </td>
                                    <td>
                                        <img src="../images/<?php echo $stagiaire['photo']?>"
                                        width="50px" height="50px" class="img-circle">
                                    </td> 
                                        <td>
                                            <a href="editerStagiaire.php?idS=<?php echo $stagiaire['idFilm'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le stagiaire')"
                                            href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idFilm'] ?>">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    
                                 </tr>
                        </tbody>
                    </table>
                <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="stagiaires.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </body>
</HTML>