<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/brief5/views/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/brief5/views/style/addsalle.css">
    <title>Ajouter salle</title>
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
    <h1 class="text-center text-primary">Ajouter Salle</h1>
    <div class="row ctn">
    <div class="cote1">
    <form action="insertS" method="post" id="form">
        <label for="Libelle">Libelle :</label>
        <input type="text" id="libelle" name="libelle" required>
        <label for="Capacité">Capacité :</label>
        <input type="number" id="capacite" name = "capacite" required>
        <button class="plus" type="button" onclick="add()" >+</button>
        <button  name="submit" class="ajout btn-outline-primary">Ajouter</button>
    </form>
</div>

</div>
<table >
    <tr>
        <th>Id</th>
        <th>Libelle</th>
        <th>Capacité</th>
        <th></th>
    </tr>
    <?php foreach($salles as $row){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['libelle']; ?></td>
        <td><?php echo $row['capacite']; ?></td>
        <td>
        <div class="row">
        <form action="updatesalle" method="post">
         <input type="hidden" value="<?php echo $row['id'] ?>" name="ids">
         <button name="submit" class="btn btn-warning">Modifier</button>
         </form >
         &nbsp;
         <form action="deleteS" method="post">
         <input type="hidden" value="<?php echo $row['id'] ?>" name="ids">
         <button name="submit" class="btn btn-danger">Supprimé</button>
         </form>
         </div>
         </td>
    </tr>
    <?php } ?>
</table>


</body>

<script>
var i = 0;
function add(){
    var form = document.getElementById("form");
    var libelle = document.getElementById("libelle");
    var capaciter = document.getElementById("capacite");

    if( libelle.value!='' && capaciter.value!='')
    {
        form.innerHTML+='<div class="row AddInput"> <input  type="text" value="'+libelle.value+'" name="libelle'+i+'" > <input type="number" value="'+capacite.value+'" name="capacite'+i+'"  ></div><br>';
        i++;
    }else
    {
        alert('Tous les champs sont obligatoires.');
    }
    
}


</script>
</html>
