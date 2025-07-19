<?php
session_start();

if(isset($_SESSION['cpf_usuario'])){
header("Location:login.php");
exit();
}
?>
<h2>seja bem vindo</h2>
<p> voce esta logado com cpf: <?php echo $_SESSION['cpf_usuario'];?></p>
<a href="logout.php">Sair</a>