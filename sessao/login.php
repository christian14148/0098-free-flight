<?php

    session_start();

    include('../banco/conexao.php');
    if (isset($_POST['envio'])){
        $login = $_POST['login'];
        $senha = hash('md2',$_POST['senha']);

            $resultado = $conn->query("SELECT * FROM usuarios WHERE cpf='$login'");
            $usuario = $resultado->fetch_assoc();

        if(($login == $usuario['cpf']) && ($senha == $usuario['senha_usuario'])){
            $_SESSION['login'] = 1;
            header('location: ../index.html');
        }else{
            $_SESSION['login'] = 0;
            echo "<div>Login ou senha não confere. Tente novamente.</div>";
        }
    }
?>


<h2>Faça seu login</h2>
<form action="login.php" method="POST">
    <div class="mb-3 row">
        <label >CPF </label>
        <div >
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
    </div>
    <div>
        <label>Senha</label>
        <div>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary" name="envio">Login</button>
    <a href="../index.php">Cancelar</a>
</form>