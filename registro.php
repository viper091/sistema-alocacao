<?php 
    include_once 'db.php';
    if(isset($_SESSION['login'])){
        header('Location: index.php');
   
    }
    if(isset($_POST['email'])
     && isset($_POST['pass']))
    {
        $pre = $conn->prepare("insert into users values(0, :email,:passwd)");
    
        try{
            $ret = $pre->execute(array(':email' => $_POST['email']
                                , ':passwd' => $_POST['pass']));
            $_SESSION['login'] = true; 

            header('Location: index.php');
                         
        }
        catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                echo 'Email ja registrado';
               // duplicate entry, do something else
            }
        }

       
     
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />


</head>

  <body class="text-center">
    <form class="form-signin" action="registro.php" method="POST">
    
        <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name='email' placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name='pass' placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>

</html>