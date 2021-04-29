<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/brief5/views/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/brief5/views/style/addmtr.css">
    <title>Modifier Matière</title>
</head>
<body >

    <nav class="navbar navbar-expand-lg navbar-dark ">
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
    <h1 class="text-center text-primary">Modifier Matière</h1>
    <div class="row ctn">
    <div class="cote1">
    <form action="save" method="post">
    <?php foreach($table as $row) ?>
        <input type="hidden" value="<?php echo $row['id'] ?>" name = "idM">
        <label for="Libelle">Libelle :</label>
        <input type="text" name="libelle" value = "<?php echo $row['libelle'] ?>">
       
        <br />
        <button name="submit"  class="ajout btn-outline-primary">Enregistrer</button>
    </form>
</div>

</div>



</body>
</html>