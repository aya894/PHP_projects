<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

    $requete="select * from utilisateur where iduser=$idUser";

    $resultat=$pdo->query($requete);
    if ($resultat) {
        $user = $resultat->fetch();
        if ($user) {
            $login = $user['login'];
            $email = $user['email'];
            $role = strtoupper($user['role']);
        } else {
            // Gérer le cas où aucun utilisateur n'est trouvé avec cet ID
            // Par exemple, rediriger vers une page d'erreur ou afficher un message approprié
            echo "Aucun utilisateur trouvé avec cet identifiant.";
            exit; // Arrêter l'exécution du script
        }
    } else {
        // Gérer le cas où la requête a échoué
        // Afficher une erreur ou rediriger vers une page d'erreur
        echo "Erreur lors de l'exécution de la requête.";
        exit; // Arrêter l'exécution du script
    }
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <style>
        body {
    background-color: rgb(240, 238, 238);
    font-size: 16px;
}
h1{
    font-size: 40px;
    color: #2980b9;
}

        .marge{
            margin-top:60px;
        }
    </style>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary marge">
                <div class="panel-heading">Edition de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
						<div class="form-group">
                           <label for="id">id user: <?php echo $idUser ?></label>
                            <input type="hidden" name="iduser" class="form-control" value="<?php echo $idUser ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Login :</label>
                            <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Email :</label>
                            <input type="email" name="email" placeholder="email" class="form-control"
                                   value="<?php echo $email ?>"/>
                        </div>
                        <div class="form-group">
                             <select name="role" class="form-control">
                                <option value="ADMIN" <?php if($role=="ADMIN") echo "selected" ?>>Administrateur</option>
                                <option value="VISITEUR" <?php if($role=="VISITEUR") echo "selected" ?>>Visiteur</option>
                             </select>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button>

                        <a href="editPwd.php">Changer le mot de passe</a>
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>