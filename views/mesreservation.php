<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="http://localhost/brief5/views/style/reservation.css">

    <title>Mes Reservation</title>
</head>
<body>
<nav class="float-right">
<a  class = "btn user "><i class="material-icons">person</i><?php echo $_SESSION['role_user'][0]['role'] ?></a>
<a href="http://localhost/brief5/Reservation/affichergroupes" class="btn btn-outline-info mesreserv">Reserver Salle</a>&nbsp;

<a href="http://localhost/brief5/login/deconnect" class = " logout btn btn-outline-info"><i class="material-icons">logout</i> Déconnection </a>
</nav>
<br />
<br/>
<div class="tb">
  
  <table class="table">
    
      <tr>
        <th>Id</th>
        <th>dateC</th>
        <th>heureC</th>
        <th>EnsgC</th>
        <th>SalleC</th>
        <th>GroupeC</th>
        <th></th>
      </tr>
   
    <?php foreach($res as $row) {?>
      <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['datec'] ?></td>
      <td><?php echo $row['heure_cour'] ?></td>
      <td><?php echo $row['id_ensg'] ?></td>
      <td><?php echo $row['libelleS'] ?></td> 
      <td><?php echo $row['libelleG'] ?></td>
      <td>
      <div class="row">
      <form action="editcours" method="post">
      <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
      <button class="btn btn-warning" name="submit">Modifier</button>
      </form>&nbsp;&nbsp;
      <form action="delete" method="post">
      <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
      <button class="btn btn-danger" name="submit">Supprimé</button>
      </form>
      </div>
      </td>
      </tr>
      <?php } ?>
   
  </table>
</div>
</body>
</html>