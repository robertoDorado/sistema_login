<?php
session_start();
require_once "usuarios.class.php";
require_once "mensagens.class.php";

if(empty($_SESSION['covid'])){
    header("Location: login.php");
    exit;
}else{
    $id = $_SESSION['covid'];
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $usuarios = new Usuarios();
    $usuarios->getIdIp($id, $ip);

if(isset($id) && empty($id) == false){
    $item = $usuarios->getAll($id);
    foreach($item as $data);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body onload="start()">
<span></span>

<style>
.cabecalho{
    background-image: url('img/fundo-estrela.png');
    background-size:cover;
    width:100%;
    height:200px;
    background-position:right;
}
.cabecalho h1,h2,h3,h4{
    color:white;
    margin-left:40px;
}
.cabecalho img{
    float:right;
    width:270px;
    margin-top:-140px;
    margin-right:140px;
}
.formulario{
    margin-left:35%;
}
.formulario input, textarea{
    outline:none;
    resize:none;
}
.formulario input{
    width:33%;
}
.formulario textarea{
    width:48.5%;
}
input[type=submit]{
    margin-left:8%;
    background:orange;
    color:white;
    border-radius:5px;
    border:none;
    height:40px;
}
input[type=submit]:hover{
    background:white;
    color:black;
    transition:0.5s;
    border:1px solid black;
}
footer{
    width:100%;
    height:50px;
    background:#227dc7;
    margin-top:5%;
}
input[type=number]::-webkit-inner-spin-button { 
    -webkit-appearance: none;
    
}
input[type=number] { 
   -moz-appearance: textfield;
   appearance: textfield;

}
.form-sair input{
    margin-left:40.2%;
    width:21.6%;
    background:none;
    border:1px solid black;
    color:black
}
.form-sair input:hover{
    background:orange;
    color:white;
    transition:0.5;
    border:none;
}


</style>
<div class="cabecalho">
    <h1>Bem vindo <?php echo $data['nome'];?></h1>
    <h2>Responsável pelo hospital <?php echo $data['hospital']?></h2>
    <h3>Matricula: <?php echo $data['matricula']?></h3>
    <h4>Cargo atual: <?php echo $data['cargo']?></h4>
    <img src="img/logo-brasil.png">
</div>

<br>




<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>


<form method="post" class="formulario">

<h5>Preencha todos os dados abaixo do formulário</h5><br>

<span>Nos diga qual é a situação dos pacientes:</span><br>

<select name="situacao" required>

    <option value="">Situação atual</option>
    <option value="0">Boa</option>
    <option value="1">Media</option>
    <option value="2">Ruim</option>
    <option value="3">Péssima</option>

</select><br><br>

<span>Número total de leitos:</span><br>
<input type="text" name="leitos" pattern="[0-9.]{1,}" autofocus required placeholder="150"><br><br>

<span>Número total de pacientes:</span><br>
<input type="text" name="pacientes" pattern="[0-9.]{1,}" required placeholder="150"><br><br>

<span>Lista de materiais que estão em falta:</span><br>

<textarea name="lista" placeholder="Leitos, Equipamentos, Instrumentos..." cols="30" rows="10" required></textarea><br><br>

<input type="submit" value="Enviar"><br><br>

</form>

<form action="sair.php" class="form-sair">
    <input type="submit" value="Sair">
</form>

<br><br>

<?php
if(isset($_POST['leitos']) && empty($_POST['leitos']) == false){
    $leitos = addslashes($_POST['leitos']);
    $pacientes = addslashes($_POST['pacientes']);
    $lista = addslashes($_POST['lista']);
    $situacao = addslashes($_POST['situacao']);
    
    $mensagem = new Mensagens();

    if($situacao == "0"){
        $mensagem->enviarMensagem($leitos, $pacientes, $lista, 'boa', $data['hospital'], $data['nome']);
    }
    if($situacao == "1"){
        $mensagem->enviarMensagem($leitos, $pacientes, $lista, 'media', $data['hospital'], $data['nome']);
    }
    if($situacao == "2"){
        $mensagem->enviarMensagem($leitos, $pacientes, $lista, 'ruim', $data['hospital'], $data['nome']);
    }
    if($situacao == "3"){
        $mensagem->enviarMensagem($leitos, $pacientes, $lista, 'pessima', $data['hospital'], $data['nome']);
    }

    echo "<p style='color:green;'>Mensagem enviada com sucesso</p>";
}
?>

<a style="margin-left:820px;" target="_blank" href="tabela.php">Clique aqui para visualizar as informações.</a>


<footer></footer>

<script src="timer.js"></script>

</body>
</html>