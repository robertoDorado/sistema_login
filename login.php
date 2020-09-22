<?php
session_start();
require_once "usuarios.class.php";



if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){
    $entrar = addslashes($_POST['usuario']);
    $senha = md5(addslashes($_POST['senha']));
    
    $usuario = new Usuarios();
    $user = $usuario->login($entrar, $senha);

    if($user == true){
        $_SESSION['covid'] = $user;
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Login</title>
</head>
<div class="bg col-lg-12">
<body>

<style>
html,body{
    margin:0;
    padding:0;
}
.bg{
    width:100%;
    background-image:url(img/bandeira-brasil2.png);
    background-size:cover;
    background-position:center;
    height:1000px;
}
.form{
    background:none;
    margin-left:43%;
    padding-top:15%;
}
.form h1{
    color:white;
}
.form label{
    color:white;
}
.form input{
    outline:none;
}
input[type=submit]{
    width:23.5%;
    background:orange;
    color:white;
    border:0;
    border-radius:5px;
    height:35px;
}
input[type=submit]:hover{
    background:white;
    color:black;
    transition:0.5s;
}
.input[type=button]{
    width:23.5%;
}

.erro{
    height:30px;
    width:250px;
    background-color:rgba(255, 0, 0, 0.5);
    border:solid 1px red;
    color:white;
    margin-left:43%;
    text-align:center;
}
.form img{
    background:none;
    width:20%;
}
.form-cadastrar{
    margin-left:43%;
}
.form-cadastrar input{
    background:white;
    border:1px solid black;
    color:black;
}
.form-cadastrar input:hover{
    background:orange;
    border:none;
    color:white;
    transition:0.5s;
}
.user{
    width:250px;
}
</style>




<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>

<form method="post" class="form">
    <img src="img/logo-brasil.png">
    
    <h1>Login</h1>
        <div class="form-group">
            <label for="usuario">Usuário:</label><br>
            <input class="form-control user" type="text" name="usuario" autofocus required>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha:</label><br>
            <input class="form-control user" type="password" name="senha" required>
        </div>
        
        <div class="form-group">
            <input class="form-control user" type="submit" value="Entrar">
        </div>
</form>
        
<form action="cadastrar.php" class="form-cadastrar">
        <input class="form-group user" type="submit" value="Cadastrar">
</form><br>


<?php
if(isset($_POST['usuario']) && empty($_POST['usuario']) == false):
?>
<?php if($entrar && $senha != $user):?>
    <label class="erro">Usuario ou senha incorreto</label>
<?php endif;?>
<?php endif;?>

<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.min.js"></script>
        </body>
    </div>
</html>