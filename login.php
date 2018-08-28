<?php 
    include_once 'db.php';
    if(isset($_SESSION['login'])){
        header('Location: index.php');
   
    }

   if(isset($_GET['action'])){
        $action = $_GET['action'];
        switch ($action) {
            case 'sair':
                unset($_SESSION['login']); 
                header('Location: index.php');

                break;
            
            default:
                # code...
                break;
        }

    }

    if(isset($_POST['email'])
     && isset($_POST['pass']))
    {
        $pre = $conn->prepare("select * from users where email = :email and passwd = :pass");
        $pre->execute(array(':email' => $_POST['email']
                            , ':pass' => $_POST['pass']));

        if($pre->fetchAll()){
            $_SESSION['login'] = true; 
            header('Location: index.php');

        }else{
            $error=1;
        }


    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />


</head>

  <body class="text-center">

    <form class="form-signin" action="login.php" method="POST">
    <?php if(isset($error)) {?>
        <div class="alert alert-danger">
        <strong>Erro!</strong> Senha ou email incorretos
        </div>
    <?php } ?>
    <div class="alert alert-dark" role="alert">
        Identifique-se porfavor para acessar o site
    </div>  
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name='email' placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name='pass' placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Prosseguir</button>
      <p> Não tem conta ? <a href='registro.php'>Registre-se!</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>

</html>