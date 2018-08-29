<?php 
    include_once 'db.php';

    

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina inicial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />


</head>
<body>
    <div class='container'>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Locação de veiculos</span>
   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    <?php  if(isset($_SESSION['login'])) {  ?> 
        <li class="nav-item">
            <a  class="nav-link" href="login.php?action=sair">Sair</a> 
        </li>
        
      <li class="nav-item">
        <a class="nav-link" href="listar.php">Listar</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pesquisar.php">Pesquisar</a>
      </li>
    </ul>
    <?php } else { ?>
    

   <li class="nav-item">
            <a  class="nav-link" href="login.php">Login</a> 
        </li>
    <?php } ?>
</ul>
  </div>
    </nav>

    <div class="jumbotron">
  <h1 class="display-4">Ola!</h1>
  <p class="lead">Bem vindo ao site de locacao de veiculos.</p>
  <hr class="my-4">
<?php     if(!isset($_SESSION['login'])){ ?>
  
   
 
  <p>Registre para começar a utilizar .</p>
  <a class="btn btn-primary btn-lg" href="registro.php" role="button">Registrar</a>
  
<?php } ?>
</div>
</div>
<script src='js/bootstrap.js'></script>
</body>
</html>