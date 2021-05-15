<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="http://localhost/brief5/views/style/reservation.css">
    <title>Reservation</title>
</head>
<body>

<nav class="float-right">
    <a  class = "btn user "><i class="material-icons">person</i><?php echo $_SESSION['role_user'][0]['role'] ?></a>
    <a href="http://localhost/brief5/login/deconnect" class = " logout btn btn-outline-info"><i class="material-icons">logout</i> Déconnection </a>
</nav>
<br/>
<br/>

    <form action="insertC" method="post">
    <div class="mb-3 col-10 ms-5 pt-2">
    <input type="hidden" value="<?php echo $idgrp ?>" name="groupe">
    <input type="hidden" value="<?php echo $date ?>" name="date">
    <input type="hidden" value="<?php echo $heure ?>" name="heur_cours">
    </div>
    <div class="mb-3 col-10 ms-5 pt-2">
                              <label  class="form-label">Salle :</label>
                             
                                <select class="form-select form-control" name="salle" aria-label="Default select example">
                                <?php foreach($table as $row) {?>
                                <option hidden>Select Salle</option>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['libelle'] ?></option>
                                <?php }?>
                                <option value="<?php if(isset($_SESSION['id_salle_reserv']) && !empty($_SESSION['id_salle_reserv'])){ echo $_SESSION['id_salle_reserv'] ;} ?>" <?php if(isset($_SESSION['id_salle_reserv']) && !empty($_SESSION['id_salle_reserv'])){ echo "selected";}else{echo "disabled='true'";} ?>><?php if(isset($_SESSION['id_salle_reserv'])){ echo  $_SESSION['libelleS_reserv'];}?></option>
                                </select>
                                
                            </div>
                            <div class="mb-3 col-10 ms-5">
                          <button class="btn btn-outline-info" name="submit">Reserver</button>
                           <div>
    </form>
</body>
</html>