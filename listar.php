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
    <a href='adicionar_form.php'> Adicionar </a>
    </nav>
    <h1 class="display-4">Listagem de carros</h1>

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
         $q = $conn->prepare("SELECT * from cars");
         $ok = $q->execute();
         $cars = $q->fetchAll();
        
         if(!$ok){

            die('erro');
         }

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
      <td> <a href='editar_form.php?id=<?=$id ?>'>Editar </a></td>
      <td> <a href='veiculo.php?tarefa=excluir&id=<?=$id ?>'>Remover </a></td>
    </tr>
         <?php } ?>
  </tbody>
</table>
</div>
<script src='js/bootstrap.js'></script>
</body>
</html>