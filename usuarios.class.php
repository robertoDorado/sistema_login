<?php
require_once 'config.php';
class Usuarios {

    public function login($usuario, $senha){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':usuario', $usuario);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
        $sql = $sql->fetch();
		$id = $sql['id'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$_SESSION['covid'] = $id;

		$sql = "UPDATE usuarios SET ip = :ip WHERE id = :id";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":ip", $ip);
		$sql->bindValue(":id", $id);
		$sql->execute();

		header("Location: index.php");
        exit;
        
        return true;
        }
    }

    public function getAll($id){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function getIdIp($id, $ip){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE id = :id AND ip = :ip";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
    
        if($sql->rowCount() == 0) {
            echo 'ok';
            exit;

            return true;
        }
    }

    public function cadastrar($cargo, $nome, $senha, $matricula, $usuario, $hospital){
        global $pdo;
        if($this->verificarHospital($hospital) == false){
        $sql = "INSERT INTO usuarios SET nome = :nome, cargo = :cargo, hospital = :hospital, usuario = :usuario, matricula = :matricula, senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':cargo', $cargo);
        $sql->bindValue(':hospital', $hospital);
        $sql->bindValue(':usuario', $usuario);
        $sql->bindValue(':matricula', $matricula);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        return true;
        }
    }

    private function verificarHospital($hospital){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE hospital = :hospital";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':hospital', $hospital);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
    }

}