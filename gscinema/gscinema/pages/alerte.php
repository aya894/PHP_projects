<?php
    require_once('identifier.php');
    $message=isset($_GET['message'])?$_GET['message']:"Erreur";
    
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Alerte</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <style>
        .marge{
            margin-top:60;
        }
    </style>
    <body>
        <?php include("menu.php"); ?>
        <div class="container">
            <div class="panel panel-danger marge ">
                    <div class="panel-heading"><h4>Erreur : </h4></div>
                    <div class="panel-body">
                        <h3><?php echo $message ?></h3>
                        <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>></a></h4>
                    </div>
            </div> 
            
    </body>
</HTML>