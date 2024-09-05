<?php
$host = 'localhost';
$dbname = 'simpleCrud';
$user = 'root';
$password = '';

try{
    $pdo= new
    PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("Connection not succesfull:" . $e->getMessage());
}
?>