<?php
require_once 'config.php';
class Mensagens{

    public function enviarMensagem($leitos, $pacientes, $lista, $situacao, $hospital, $responsavel){
        global $pdo;
        $sql = "INSERT INTO mensagens SET leitos = :leitos, pacientes = :pacientes, lista = :lista, situacao = :situacao, hospital = :hospital, responsavel = :responsavel";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':leitos', $leitos);
        $sql->bindValue(':pacientes', $pacientes);
        $sql->bindValue(':lista', $lista);
        $sql->bindValue(':situacao', $situacao);
        $sql->bindValue(':hospital', $hospital);
        $sql->bindValue(':responsavel', $responsavel);
        $sql->execute();

        return true;
    }

}
?>