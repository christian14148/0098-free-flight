<?php



    include('banco/conexao.php');
    if (isset($_POST['envio'])){
        echo $login = $_POST['login'];
        echo $senha = hash('md2',$_POST['senha']);

            $resultado = $conn->query("SELECT * FROM usuarios WHERE cpf='$login'");
            $usuario = $resultado->fetch_assoc();

        if(($login == $usuario['cpf']) && ($senha == $usuario['senha_usuario'])){
            $_SESSION['login'] = 1;
            $_SESSION['cpf'] = $login;
            header('location: index.php?p=listar');
        }else{
            $_SESSION['login'] = 0;
            echo "<div>Login ou senha não confere. Tente novamente.</div>";
        }
    }
?>


<h2>Faça seu login</h2>
<form action="index.php" method="POST">
    <div>
        <label >CPF </label>
        <div >
            <input type="text" id="login" name="login" required>
        </div>
    </div>
    <div>
        <label>Senha</label>
        <div>
            <input type="password" id="senha" name="senha" required>
        </div>
    </div>
    
    <button type="submit" name="envio">Login</button>
    <a href="index.php?p=novo">Criar conta</a>
</form>