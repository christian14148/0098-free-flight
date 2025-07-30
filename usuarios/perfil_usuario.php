<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    include 'banco/conexao.php';
    $cpf = $_GET['cpf'];
    $resultado = $conn->query("SELECT * FROM usuarios WHERE cpf='$cpf'");
    $contato = $resultado->fetch_assoc();
?>

<td><img src="imagens/<?= $contato['avatar_url'] ?>" width="40px"></td>
<td> <?= $contato['nome_usuario'] ?> </td>
<td> <?= $contato['telefone_usuario'] ?> </td>
<td> <?= $contato['email'] ?> </td>
<td> <?= $contato['data_nascimento'] ?> </td>
<td> <?= $contato['estado'] ?> </td>
<td> <?= $contato['cidade'] ?> </td>
<td> <?= $contato['bairro'] ?> </td>
<td> <?= $contato['categorias_usuario'] ?> </td>

</body>
</html>