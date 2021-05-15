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

    <form action="filtreSalle" method="post">
    <div class="mb-3 col-10 ms-5 pt-2">
    <input type="hidden" name="groupe" value="<?php echo $groupe ?>">
    <input type="hidden" name="date" value="<?php echo $date ?>">

    </div>

    <div class="mb-3 col-10 ms-5 pt-2">
                              <label  class="form-label">Heure de Cours :</label>
                                <select class="form-select form-control" name="heur_cours" aria-label="Default select example" >
                                <option selected>Select heure</option>
                                <option value="08:00-10:00" <?php if(in_array("08:00-10:00",$dures)){if(isset($_SESSION['dure'])){ if($_SESSION['dure']=="08:00-10:00"){echo "selected" ;} else {echo "disabled";}}else {echo "disabled";} } ?>>08:00-10:00</option>
                                <option value="10:00-12:00"<?php if(in_array("10:00-12:00",$dures)){if(isset($_SESSION['dure'])){ if($_SESSION['dure']=="10:00-12:00"){echo "selected" ;} else {echo "disabled";}}else {echo "disabled";} } ?>>10:00-12:00</option>
                                <option value="14:00-16:00"<?php if(in_array("14:00-16:00",$dures)){if(isset($_SESSION['dure'])){ if($_SESSION['dure']=="14:00-16:00"){echo "selected" ;} else {echo "disabled";}}else {echo "disabled";} } ?>>14:00-16:00</option>
                                <option value="16:00-18:00"<?php if(in_array("16:00-18:00",$dures)){if(isset($_SESSION['dure'])){ if($_SESSION['dure']=="16:00-18:00"){echo "selected" ;} else {echo "disabled";}}else {echo "disabled";} }?>>16:00-18:00</option> 
                                </select> 
                                </div>
     <div class="mb-3 col-10 ms-5">                        
    
    <button class="btn btn-outline-info" name = "submit">Ok</button>
    </div>
    </form>
</body>
</html>