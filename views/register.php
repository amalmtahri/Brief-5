<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/brief5/views/style/register.css">

        <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>Register</title>
</head>
<body>




   
   
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="Inscription">
                        <h1 class=" text-info">Inscription</h1>
                        <form method="post" action = "http://localhost/brief5/Registre/insertenseignant">
                            <div class="mb-3 col-10 ms-5 pt-2">
                              <label  class="form-label">Nom</label>
                              <input type="text" class="form-control " placeholder="Enter your first name"  name="firstname" required>
                            </div>
                            <div class="mb-3 col-10 ms-5">
                                <label  class="form-label">Prénom</label>
                                <input type="text" class="form-control input" placeholder="Enter your last name" name="lastname" required>
                            </div>
                            <div class="mb-3 col-10 ms-5">
                                <label  class="form-label">Email</label>
                                <input type="email" class="form-control input"placeholder="Enter your email" name="email" required >
                            </div>
                            <div class="mb-3 col-10 ms-5">
                              <label  class="form-label">Password</label>
                              <input type="password" class="form-control input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password" required>
                            </div>
                            <div class="mb-3 col-10 ms-5 pt-2">
                              <label  class="form-label">Matiere :</label><br />
                             
                                <select name="matiere" >
                                <option hidden >Select Matiere</option>
                                <?php foreach($res as $row){ ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['libelle'] ?></option>
                                <?php } ?>
                                </select>
                                
                            </div>
                          
                            <div class="mb-3 col-10 ms-5">
                          <button class="btn btn-outline-info" name="submit">Register</button>&nbsp; &nbsp;
                          <a href="http://localhost/brief5/"><u> log in ?</u></a>
                           <div>
    </div>
        </div>
            </div>
                </div>
                            <div class="row img">
                                <img src="http://localhost/brief5/views/images/3.svg" alt="1" width="600px" height="500px">
                            </div>
    
</body>
</html>