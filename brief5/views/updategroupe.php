<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/brief5/views/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/brief5/views/style/addgroupe.css">
    <title>Modifier Groupe</title>
</head>
<body >


    <nav class="navbar navbar-expand-lg navbar-dark ">
         <h3 class="text-primary logo"> <a href="http://localhost/brief5/home/index/home">9rayti.</a></h3>
        <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav col-md-8 mx-auto ">
            <li class="nav-item">
              <a class="nav-link text-primary" href="http://localhost/brief5/salle/afficher">Salle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-primary" href="http://localhost/brief5/matiere/afficher">Matière</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="http://localhost/brief5/groupe/afficher">Groupe</a>
            </li>
          </div>
          <button class = "btn"><?php echo $_SESSION['admin'][0]['name'] ?></button>
          &nbsp;  &nbsp;
          <a href="http://localhost/brief5/login/deconnect" class="btn btn-primary ">Déconnexion</a> 

        </div>
    </nav>
    <h1 class="text-center text-primary">Modifier Groupe</h1>
    <div class="row ctn">
    <div class="cote1">
    <form action="save" method="post">
    <?php foreach($table as $row)  ?>

    <input type="hidden" name="idg" value="<?php echo $row['id'] ?>">
        <label for="Libelle">Libelle :</label>
        <input type="text" name="libelle" value="<?php echo $row['libelle'] ?>">
        <label for="Capacité">Effectif :</label>
        <input type="number" name="effectif" value="<?php echo $row['effectif'] ?>">
       
        <br />
        <button name="submit" class="ajout btn-outline-primary">Enregister</button>
       
    </form>
</div>

</div>


</body>
</html>