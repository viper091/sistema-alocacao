<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','on');
/* Define o local para Holandês(usar pt_BR para o Português(Brasil) ) */
setlocale (LC_ALL, 'pt_BR');
$DB_HOST = 'localhost';
$DB_NAME = 'ben';
$DB_USER ='root';
$DB_PASS ='';

try {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    if($e->getCode() == 1049) 
    {
        // CREATE DB
        $conn = new PDO("mysql:host=$DB_HOST", $DB_USER, $DB_PASS);
        $sql = file_get_contents('db.sql');
        $qr = $conn->exec($sql);
        if($qr)
            header( "Location: $_SERVER[PHP_SELF]" );

    }

    
    die();
}