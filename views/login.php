<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/brief5/views/style/login.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>Log in</title>
</head>
<body>

   
    
    <div class="row ctr">
        
        <div class="img">
            <img src="http://localhost/brief5/views/images/1.svg" alt="1" width="600px" height="500px">
        </div>
        <div class="text-primary ctn">
        <div class="col-lg-12 login-key ">
                    <i class="fa fa-key"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOG IN
                </div>
        <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action = "http://localhost/brief5/Login/user" method="post" >
                           
                                <label>Email</label>
                                <input type="text" name = "email" placeholder="Enter your email" class="form-control" required>
                           
                           
                                <label >Password</label>
                                <input type="password" name = "password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control" >
                                

                                            <?php if(!empty($erreur)){ ?>
                                            <div class="alert alert-danger">
                                                <?php echo $erreur; ?>
                                            </div>

                                            <?php } ?>
                            <button  name="submit" class="btn login btn-outline-info">LOGIN</button>&nbsp; &nbsp;
                            <a href="http://localhost/brief5/Registre/affichage"><u>Crée Compte ?</u></a>
                        </form>
                    </div>
                </div>     
        </div>
    </div>
 
    
</body>
</html>