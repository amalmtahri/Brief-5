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
          <button class = "btn"><?php echo $_SESSION['role_user'][0]['role'] ?></button>
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
    <?php $c=0; foreach($salles as $row){ ?>
    <tr>
    <form action="deleteS" method="post">
    <input type="hidden" value="<?php echo $c; ?>" name="cp">

        <td><input type="text" value="<?php echo $row['id'] ?>" name="<?php echo "ids".$c; ?>" id="<?php echo "id".$c; ?>" style="display:none;"><span id="<?php echo "ids".$c; ?>" ><?php echo $row['id']?></span></td>
    <td><input type="text" value="<?php echo $row['libelle'] ?>" name="<?php echo "libelle".$c; ?>" id="<?php echo "libelles".$c; ?>" style="display:none;"><span id="<?php echo "libelleS".$c; ?>" ><?php echo $row['libelle']?></span></td>
    <td><input type="text" value="<?php echo $row['capacite'] ?>" name="<?php echo "capacite".$c; ?>" id="<?php echo "capacite".$c; ?>" style="display:none;"><span id="<?php echo "capaciteS".$c; ?>" ><?php echo $row['capacite']?></span></td>
        <td>
       <div class = "row ">
         <button name="submit" class="btn btn-warning" id="<?php echo "edit".$c; ?>" onclick='f(<?php echo $c; ?>)'>Modifier</button>
         &nbsp;
         <button name="submit" class="btn btn-danger" id="<?php echo "delete".$c; ?>">Supprimé</button>
         <button name="enregistrer" class="btn btn-success"  id="<?php echo "enregistrer".$c; ?>" onclick='this.form.action="save"' style="display:none;">Enregistrer</button>
          &nbsp;
         <button name="annuler" class="btn btn-danger" id="<?php echo "annuler".$c; ?>" onclick='f2(<?php echo $c; ?>)' style="display:none;">Annuler</button>
         &nbsp;
         </div>
        </td>
        </form>
    </tr>
    <?php $c++; } ?>
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

function f(i){

event.preventDefault();

document.getElementById("libelles"+i).style.display="block";
document.getElementById("libelleS"+i).style.display="none";
document.getElementById("capacite"+i).style.display="block";
document.getElementById("capaciteS"+i).style.display="none";
document.getElementById("edit"+i).style.display="none";
document.getElementById("delete"+i).style.display="none";
document.getElementById("enregistrer"+i).style.display="inline-block";
document.getElementById("annuler"+i).style.display="inline-block";

}

function f2(i){

event.preventDefault();

document.getElementById("libelles"+i).style.display="none";
document.getElementById("libelles"+i).value=document.getElementById("libelleS"+i).innerHTML;
document.getElementById("libelleS"+i).style.display="block";
document.getElementById("capacite"+i).style.display="none";
document.getElementById("capacite"+i).value=document.getElementById("capaciteS"+i).innerHTML;
document.getElementById("capaciteS"+i).style.display="block";
document.getElementById("edit"+i).style.display="block";
document.getElementById("delete"+i).style.display="block";
document.getElementById("enregistrer"+i).style.display="none";
document.getElementById("annuler"+i).style.display="none";

}


</script>
</html>
