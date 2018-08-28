<?php 
    include_once 'db.php';

    
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
   
    }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />


</head>
<body>
    <div class='container'>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Locação de veiculos</span>

    </nav>
    <h1 class="display-4">Pesquisa</h1>
  <p class="lead">Digite a placa do carro que desaja pesquisar.</p>

  <form>
  <div class="form-group">
    <label for="placa">Placa do carro</label>
    <input name="placa" type="" class="form-control" id="placa" aria-describedby="" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary">Pesquisar</button>
</form>
<?php  if(isset($_GET['placa']) && !empty($_GET['placa'])) { ?>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Placa</th>
      <th scope="col">Local</th>
      <th scope="col">Data de Devolução</th>
      <th scope="col">Data de Saida</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
    <?php 
       
         $q = $conn->prepare("SELECT * from cars where placa like :placa" );
         $ok = $q->execute(array(
             ':placa' => '%'.$_GET['placa'].'%'
         ));
         $cars = $q->fetchAll();
    
         if(!$ok){

            die('erro');
         }
         if(count($cars) > 0 ){
            foreach ($cars as $key => $value) {
                # code...

                $id = $value['id'];
                $placa = $value['placa'];
                $saida = $value['saida'];
                $local = $value['local_de_locacao'];
                $devo = $value['devo'];
                $nome = $value['car'];
    
    ?>

    <tr>
      <th scope="row"><?=$id ?></th>
      <td><?=$nome?></td>
      <td><?=$placa ?></td>
      <td><?=$local ?></td>
      <td><?=$devo ?></td>
      <td><?=$saida ?></td>
      <td>Editar</td>
      <td>Remover </td>
    </tr>
         <?php 
            }
        }else{ ?>
        
        <tr>
      <th colspan='3' scope="row">Nada encontrado</th>
            </tr>
      <?php
        } 
        
    } ?>
  </tbody>
</table>
</div>
<script src='js/bootstrap.js'></script>
</body>
</html>