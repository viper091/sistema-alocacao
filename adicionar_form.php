<?php 
    include_once 'db.php';
    if(!isset($_SESSION['login'])){
        header('Location: index.php');
   
    }
    // placa varchar(30) not null,
    // local_de_locacao varchar(255) not null,
    // car varchar(30) not null,
    // saida timestamp,
    // devo timestamp

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>adicionar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />


</head>

  <body class="text-center">

    <form class="form-signin" action="veiculo.php" method="POST">
        
        <input name='tarefa' value='adicionar' style='display:none'> 
        <h1 class="h3 mb-3 font-weight-normal">Registro locação</h1>
        <div>
            <label class="sr-only">placa</label>
            <input type="name"  class="form-control" name='placa' required autofocus>
        </div>
        <div>
            <label class="sr-only">local de locacao</label>
            <input type="name"  class="form-control" name='local_de_locacao' required autofocus>
        </div>
        <div>
            <label class="sr-only">nome do carro</label>
            <input type="name"  class="form-control" name='car' required autofocus>
        </div>
        <div>
            <label class="sr-only">data de saida</label>
            <input type="date"  class="form-control" name='saida' required autofocus>
        </div>
        <div>
        <label class="sr-only">data de devolução</label>
        <input type="date"  class="form-control" name='devo' required autofocus>
        </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>

</html>