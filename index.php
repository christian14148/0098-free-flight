<?php
    session_start();
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="aparencia/scripts.js"></script>
    <title>FreeFlight</title>
</head>
<body>

    <div>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1){echo "<a href='index.php?p=sair'>Sair</a>";}?>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 1){echo "<a href='index.php?p=editar'>Editar</a>";}?>
    </div>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == 1){
    if (isset($_GET['p'])){
        if($_GET['p'] == 'listar'){
            include 'usuarios/listar_usuarios.php';
        }elseif($_GET['p'] == 'exibir'){
            include 'usuarios/perfil_usuario.php';
        }elseif($_GET['p'] == 'editar'){
            include 'usuarios/editar_cadastro.php';
        }elseif($_GET['p'] == 'editar' || $_GET == 'salvar'){
            include 'usuarios/editar_cadastro.php';
        }
    }if($_GET['p'] == 'sair'){
        session_unset();
        session_destroy();
        header('location: index.php');
    }
}else{
        if($_GET['p'] == 'novo' || $_GET['p'] == 'inserir'){
            include 'usuarios/cadastrar_usuario.php';
        }else{
            include 'sessao/login.php';
        }
    }
?>

</body>
</html>