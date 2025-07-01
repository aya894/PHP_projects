<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    
    $nomf = isset($_GET['nomF']) ? $_GET['nomF'] : '';
    $niveau = isset($_GET['locall']) ? $_GET['locall'] : 'Tous les salles';
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    if($niveau=="Tous les salles"){
        $requete="select * from salle where nomSalle like '%$nomf%' limit $size offset $offset";
        $requeteCount="select count(*) countF from salle where nomSalle like '%$nomf%'";
     }else{
        $requete="select * from salle where nomSalle like '%$nomf%' and locall='$niveau' limit $size offset $offset";
        $requeteCount="select count(*) countF from salle where nomSalle like '%$nomf%' and locall='$niveau'";
     }
     $resultatF=$pdo->query($requete);
     $resultatCount=$pdo->query($requeteCount);
     $tabCount=$resultatCount->fetch();
     $nbrFiliere=$tabCount['countF'];
     $reste=$nbrFiliere % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbrFiliere/$size;   
    else
        $nbrPage=floor($nbrFiliere/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des filières</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        </head>
    <body>
        <?php include("menu.php"); ?>
        <div class="container">
            <div class="panel panel-success margetop ">
                    <div class="panel-heading">Rechercher des filières </div>
                    <div class="panel-body">
                        <form method="GET" action="filieres.php" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="nomF" placeholder="Tapez le nom de la filière" class="form-control" value="<?php echo $nomf ?>">
                            </div>
                            <label for="niveau">Niveau :</label>
                            <select name="locall" class="form-control" id="niveau" onchange="this.form.submit()">
                                <option value="Tous les salles" <?php if($niveau==="Tous les salles") echo "selected" ?>>Tous les salles</option>
                                <option value="Ben Arous azur city"   <?php if($niveau==="Ben Arous azur city")   echo "selected" ?>>Ben Arous azur city</option>
                                <option value="Rue Said Abou Bakert"   <?php if($niveau==="Rue Said Abou Bakert")   echo "selected" ?>>Rue Said Abou Bakert</option>
                                <option value="Avenu Habib Bourguiba"  <?php if($niveau==="Avenu Habib Bourguiba")   echo "selected" ?>>Avenu Habib Bourguiba</option>
                                <option value="Ariana"   <?php if($niveau==="Ariana")   echo "selected" ?>>Ariana</option>
                                <option value="Houmet-souk Djerba"   <?php if($niveau==="Houmet-souk Djerba")   echo "selected" ?>>Houmet-souk Djerba</option>
                            </select>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-search"></span>
                                Rechercher
                            </button>
                            &nbsp &nbsp
                            <?php if ($_SESSION['user']['role']=='ADMIN') {?>
                       	
                           <a href="nouvelleFiliere.php">
                           
                               <span class="glyphicon glyphicon-plus"></span>
                               
                               Nouvelle filière
                               
                           </a>
                           
                       <?php } ?>     
                        </form>
                    </div>
            </div>
            <div class="panel panel-primary ">
                    <div class="panel-heading">Liste des filières (<?php echo $nbrFiliere ?> Filières)</div>
                    <div class="panel-body">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Id filière</th><th>Nom filière</th><th>Niveau</th>
                                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	    <th>Actions</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($filiere=$resultatF->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $filiere['idSalle'] ?></td>
                                        <td><?php echo $filiere['nomSalle'] ?></td>
                                        <td><?php echo $filiere['locall'] ?></td>
                                        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                        <td>
                                            <a href="editerFiliere.php?idF=<?php echo $filiere['idSalle'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la filière')"
                                                href="supprimerFiliere.php?idF=<?php echo $filiere['idSalle'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    <?php }?>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                        <div>
                            <ul class="pagination">
                                <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                                    <li class="<?php if($i==$page) echo 'active' ?>"> 
                                        <a href="filieres.php?page=<?php echo $i;?>&nomF=<?php echo $nomf ?>&niveau=<?php echo $niveau ?>">
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
</html>