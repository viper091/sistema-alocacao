<?php

include_once 'db.php';

if(!isset($_SESSION['login'])){
    header('Location: login.php');
}
/*
(0, '111f3', 'sao paulo', 'citroen', now(), now());
*/
if(isset($_GET['tarefa']) || isset($_POST['tarefa'])){

    $tarefa = isset($_GET['tarefa']) ? $_GET['tarefa'] : $_POST['tarefa'];
//    $tarefa = $_GET['tarefa'];
    switch ($tarefa) {
        case 'excluir':
            $id = $_GET['id'];
            $pre = $conn->prepare("DELETE FROM cars where id = :id");
            $pre->execute(array(':id' => $_GET['id']));

        break;
        case 'editar':
            $id = $_POST['id'];
            $placa = $_POST['placa'];
            $local_de_locacao = $_POST['local_de_locacao'];
            $car = $_POST['car'];
            $saida = $_POST['saida'];
            $devo = $_POST['devo'];
            $pre = $conn->prepare("UPDATE cars set placa = :placa ,
                 local_de_locacao=:local,
                 car=:car,
                 saida=:saida,
                 devo =:devo where id = :id");
            $pre->execute(array(
                'id' => $id,
                ':placa' => $placa,
                ':local' => $local_de_locacao,
                ':car' => $car,
                ':saida' => $saida,
                ':devo' => $devo,
            ));
        break;
        case 'adicionar':
            $placa = $_POST['placa'];
            $local_de_locacao = $_POST['local_de_locacao'];
            $car = $_POST['car'];
            $saida = $_POST['saida'];
            $devo = $_POST['devo'];

            $pre = $conn->prepare("INSERT INTO cars values(0,:placa,:local,:car,:saida,:devo)");
            $pre->execute(array(
                ':placa' => $placa,
                ':local' => $local_de_locacao,
                ':car' => $car,
                ':saida' => $saida,
                ':devo' => $devo,
            ));
            # code...
            break;
        
        default:
            # code...
            break;
    }
}

header('Location: listar.php');
