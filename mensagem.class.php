<?php
require_once 'config.php';
class Mensagem{

    private $pdo;

    function __construct(){
        try{
            $this->pdo = new PDO('mysql:dbname=id14926611_robertodorado123;host=localhost', 'id14926611_roberto', 'Rob@19101910');
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM mensagens ORDER BY id DESC";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getLista($lista){
        $sql = "SELECT * FROM mensagens WHERE lista = :lista";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':lista', $lista);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }
}
?>