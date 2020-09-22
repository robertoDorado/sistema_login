<?php
session_start();
require_once "usuarios.class.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Cadastrar</title>
</head>
<body>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<style>

.cabecalho{
    width:100%;
    height:150px;
    background-position:center right;
    background-image: url(img/fundo-estrela.png);
}
.cabecalho h1{
    color:white;
    padding-top:30px;
    margin-left:40px;
    font-size:60px;
}
.cabecalho img{
    width:270px;
    float:right;
    margin-top:-80px;
    margin-right:140px;
}
.formulario{
    float:right;
    margin-top:-210px;
    margin-right:220px;
}
.formulario input{
    outline:0;
}
.cabecalho-2-3{
    margin-left:50px;
    margin-top:50px;
}
.cabecalho-2-3 h2{
    font-size:50px;
}
.cabecalho-2-3 h3{
    font-size:30px;
}
.cabecalho-2-3 p{
    font-size:20px;
}
input[type=submit]{
    width:100%;
    background:orange;
    border:none;
    border-radius:5px;
    height:40px;
    color:white;
}
input[type=submit]:hover{
    border:1px solid black;
    background:none;
    color:black;
    transition:0.5s;
}
footer{
    width:100%;
    height:50px;
    background:#227dc7;
    margin-top:40%;
}
input[type=number]::-webkit-inner-spin-button { 
    -webkit-appearance: none;
    
}
input[type=number] { 
   -moz-appearance: textfield;
   appearance: textfield;

}
.form-voltar{
    width:367px;
    margin-top:22%;
    float:right;
}
.form-voltar input{
    margin-left:100%;
    width:68%;
    background:white;
    border:1px solid black;
    color:black;
}
.form-voltar input:hover{
    background:orange;
    color:white;
    transition:0.5s;
    border:none;
}
.user{
    width:250px;
}

</style>

<div class="cabecalho">
    <h1>Cadastre-se aqui</h1>
    <img src="img/logo-brasil.png">
</div>

<div class="cabecalho-2-3">
    <h2>Realize aqui o seu cadastro</h2>
    <h3>para ter acesso ao sistema.</h3>
    <p>Área totalmente reservada para cadastro.</p><br>
    <strong><p>Atenção: Somente pode haver um cadastro por hospital</p></strong>
</div>

<form method="post" class="formulario">

    <div class="form-group">
        <span>Nome Completo:</span><br>
        <input class="form-control user" type="text" name="nome" autofocus placeholder="Marcos da Silva Souza" required>
    </div>

    <div class="form-group">
        <span>Cargo:</span><br>
        <input class="form-control user" type="text" name="cargo" placeholder="Diretor" required>
    </div>

    <div class="form-group">
        <span>Nome do Hospital:</span><br>
        <input class="form-control user" type="text" name="hospital" placeholder="São Camilo" required>
    </div>

    <div class="form-group">
        <span>Usuário para login:</span><br>
        <input class="form-control user" type="text" name="usuario" placeholder="marcossilva" required>
    </div>

    <div class="form-group">
        <span>Matricula:</span><br>
        <input class="form-control user" type="text" name="matricula" maxlength="7" placeholder="B340649" required>
    </div>

    <div class="form-group">
        <span>Senha:</span><br>
        <input class="form-control user" type="password" name="senha" required>
    </div>

    <div class="form-group">
        <img src="imagem.php" width="100" height="50"><br>
        <input class="form-control user" type="text" name="codigo" required>
    </div>

    <div class="form-group">
        <input class="form-control user" type="submit" value="Cadastrar"><br>
    </div>

<?php
if(!isset($_SESSION['captcha'])) {
	$n = rand(1000, 9999);
	$_SESSION['captcha'] = $n;
}
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $cargo = addslashes($_POST['cargo']);
    $hospital = addslashes($_POST['hospital']);
    $usuario = addslashes($_POST['usuario']);
    $matricula = addslashes($_POST['matricula']);
    $senha = md5(addslashes($_POST['senha']));
    $codigo = $_POST['codigo'];

    $usuarios = new Usuarios();
  
    if($codigo == $_SESSION['captcha']) {
        $usuarios->cadastrar($cargo, $nome, $senha, $matricula, $usuario, $hospital);
        echo '<p style="margin-top:50px;">Cadastrado com sucesso.</p>';
    }else{
        echo "Erro ao digitar o código";
    }

    $n = rand(1000, 9999);
    $_SESSION['captcha'] = $n;

}
?>
 
</form>

<form action="login.php" class="form-voltar">
    <input class="form-control user" type="submit" value="Voltar">
</form>

<footer></footer>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

</body>
</html>