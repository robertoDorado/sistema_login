<?php
require_once "mensagem.class.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidado</title>
</head>

<body>

<div class="resultado-parcial">
    <h1>Resultado Parcial</h1>
    <img src="img/logo-brasil.png">
</div>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<table border="1" width="50%" class="table">
    <tr class="cabeca">
        <th>Leitos</th>
        <th>Pacientes</th>
        <th>Situacao</th>
        <th>Hospital</th>
        <th>Responsavel</th>
        <th>Visualizar</th>
    </tr>

<?php
$mensagem = new Mensagem();
$data = $mensagem->getAll();
foreach($data as $lista):
    ?>
<style>
*{
    margin:0;
    padding:0;
}
#fundo{
    width:100%;
    height:100%;
    top:0;
    left:0;
    background-color: rgba(0, 0, 0, 0.8);
    position:fixed;
    display:none;
}
#fundo:target{
    display:block;
}
.modal-conteudo{
    width:35%;
    height:60%;
    background:white;
    margin-left:30%;
    margin-top:9%;
    box-shadow: 5px 5px 3px 5px;
    overflow-y:scroll;
    overflow-x:hidden;
}
.modal-conteudo a{
    float:right;
    margin-top:-94px;
    text-decoration:none;
    background:blue;
    color:white;
    padding:15px 15px 15px 15px;
}
table{
    text-align:center;
}
.cabeca{
    background-color:rgba(255, 0, 0, 0.6);
    color:white;
}
.tabela{
    background-color:rgba(190, 190, 190, 0.4);
}
.formulario input{
    background-color:rgba(33, 94, 33, 0.5);
    border-radius:5px;
    padding:5px 5px 5px 5px;
    border:none;
    color:white;
}
.formulario input:hover{
    background-color:rgba(33, 94, 33, 0.3);
}
.resultado-parcial{
    background-image:url(img/fundo-estrela.png);
    background-position:center;
    height:100px;
}
.resultado-parcial h1{
    color:white;
    padding-top:20px;
    padding-left:40px;
}
.resultado-parcial img{
    width:10%;
    float:right;
    margin-top:-50px;
    margin-right:100px;
}
.modal-conteudo h2{
    text-align:center;
    padding-top:40px;
    color:gray;
}
.modal-conteudo p{
    padding-right:50px;
    padding-left:50px;
    margin-left:30px;
}
</style>

<tr class="tabela">
    <th><?php echo $lista['leitos'];?></th>
    <th><?php echo $lista['pacientes'];?></th>
    <?php if($lista['situacao'] == 'boa'):?>
        <th style="color:green;"><?php echo $lista['situacao'];?></th>
    <?php endif;?>
    <?php if($lista['situacao'] == 'media'):?>
        <th style="color:orange;"><?php echo $lista['situacao'];?></th>
    <?php endif;?>
    <?php if($lista['situacao'] == 'ruim'):?>
        <th style="color:red;"><?php echo $lista['situacao'];?></th>
    <?php endif;?>
    <?php if($lista['situacao'] == 'pessima'):?>
        <th style="color:#8C1717;"><?php echo $lista['situacao'];?></th>
    <?php endif;?>
    <th><?php echo $lista['hospital'];?></th>
    <th><?php echo $lista['responsavel'];?></th>
    <th>
    <form action="#fundo" method="POST" class="formulario">
    <input style="display:none;" type="text" name="capture" value="<?php echo $lista['lista'];?>">
    <input type="submit" value="detalhes">
    </form></th>
</tr>

<div id="fundo">
<div class="modal-conteudo">
    <h2>Lista de necessidades</h2>
    <p><?php?></p>
    <a href="#">X</a>
    <?php
    if(isset($_POST['capture']) && empty($_POST['capture']) == false):
        $capture = addslashes($_POST['capture']);
        $data = $mensagem->getLista($capture);
    ?>
    <p><?php echo $data['lista'];?></p>
    <?php endif;?>
</div>
</div>

<?php endforeach;
?>

</table>

</body>
</html>