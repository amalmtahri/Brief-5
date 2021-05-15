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
<a  href="http://localhost/brief5/Reservation/affichercours"  class="btn btn-outline-info mesreserv">Mes Reservations</a>&nbsp; 

<a href="http://localhost/brief5/login/deconnect" class = " logout btn btn-outline-info"><i class="material-icons">logout</i> Déconnection </a>
</nav>
<div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="reserv">
                        <h1 class=" text-info">Reservation du Salle</h1>
                        <form method="post" action = "filtreDure">
                           
                            <div class="mb-3 col-10 ms-5 pt-2">
                              <label  class="form-label">Groupe :</label>
                                <select class="form-select form-control" name="groupe" aria-label="Default select example" >
                                <?php foreach($groupes as $row){ ?>
                                <option value="0" hidden>Select Groupe</option>
                                <option value="<?php echo $row['id'] ?>" <?php if(isset($tabedit[0]['id'])){ if($tabedit[0]['id_grp']== $row['id']){echo "selected";} } ?>> <?php echo $row['libelle'] ?></option>
                                <?php }?>
                                </select>
                               
                            </div>
                            <div class="mb-3 col-10 ms-5">
                                <label  class="form-label ">Date :</label>
                                <input type="date" class="form-control " name="date" value="<?php if(isset($tabedit[0]['datec'])){ echo $tabedit[0]['datec']; } ?>" required >
                            </div>
                   
                            <div class="mb-3 col-10 ms-5">
                          <button class="btn btn-outline-info"  name="submit">Ok</button>
                           <div>
    </div>
        </div>
              </div>
              </div>
 
</body>
<script>

</script>
</html>