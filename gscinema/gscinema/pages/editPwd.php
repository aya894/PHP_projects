<?php
require_once('identifier.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/monjs.js"></script>
</head>
<style>
    .editpwd-page h1,h2{
    color: #2e6da4;
}

.editpwd-page h1{
    font-size: 45px;
}


.editpwd-page h2{
    font-size: 40px;
    font-weight: bold;
}

.editpwd-page form{
    width: 400px;
    margin: auto;
}

.editpwd-page input{
    margin-bottom: 20px;
}

.input-container {
    position: relative;
    margin-bottom: 10px;
}

.show-old-pwd,.show-new-pwd {
    position: absolute;
    top: 0px;
    right: -35px;
    font-size: 36px;
    color:blue;
}
.clickable{
    cursor: pointer;
}

  
</style>
<body>


<div class="container editpwd-page">
    <h1 class="text-center">Changement de mot de passe</h1>

    <h2 class="text-center"> Compte :<?php echo $_SESSION['user']['login'] ?>    </h2>

    <form class="form-horizontal" method="post" action="updatePwd.php">


        <!-- ***************** Début Ancien mot de passe  ***************** -->
        <div class="input-container">
            <input class="form-control oldpwd"
                   type="password"
                   name="oldpwd"
                   autocomplete="new-password"
                   placeholder="Taper votre Ancien Mot de passe"
                   required>
                   <i class='bx bx-show bx-flashing show-old-pwd clickable' ></i>
        </div>


        <!-- ***************** Fin Ancien mot de passe ***************** -->

        <!--  *****************Début Nouveau  mot de passe  ***************** -->

        <div class="input-container">
            <input minlength=4
                    class="form-control newpwd"
                    type="password"
                    name="newpwd"
                    autocomplete="new-password"
                    placeholder="Taper votre Nouveau Mot de passe"
                    required>
                    <i class='bx bx-show bx-flashing show-new-pwd clickable' ></i>

        </div>
        <!--  *****************  Fin Nouveau  mot de passe   ***************** -->

        <!--  ***************** start submit field  ***************** -->

        <input
                type="submit"
                value="Enregistrer"
                class="btn btn-primary btn-block"/>

        <!--   ***************** end submit field  ***************** -->

    </form>
</div>

</body>
</html>



