<?php
    global $pdo;
try{
    $pdo = new PDO('mysql:dbname=id14926611_robertodorado123;host=localhost', 'id14926611_roberto', 'Rob@19101910');
}catch(PDOException $e){
    echo 'Erro: '.$e->getMessage();
}