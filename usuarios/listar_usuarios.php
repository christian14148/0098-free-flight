<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeFlight</title>
</head>
<body>
    <table>
        <tr>
            <th><label>Imagem</label></th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Gênero</th>
            <th>
                <div>
                Opções
                </div>
            </th>
            </tr>

    <?php
    include('banco/conexao.php');
        $resultado = $conn->query("SELECT * FROM usuarios");
        
        while ($linha = $resultado->fetch_assoc()) {
        ?>
            <tr>
                <td><img src="imagens/<?= $linha['avatar_url'] ?>" width="40px"></td>
                <td> <?= $linha['nome_usuario'] ?> </td>
                <td> <?= $linha['cidade'] ?> </td>
                <td> <?= $linha['bairro'] ?> </td>
                <td> <?= $linha['genero_cliente'] ?> </td>
                <td>
                    <div>
                    <a href="index.php?p=exibir&cpf=<?= $linha['cpf'] ?>">Exibir</a>
                    <a href="index.php?p=excluir&id=<?php $linha['cpf'] ?>">Excluir</a>
                    </div>
                </td>
            </tr>

        <?php
        }
        ?>

        </table>
</body>
</html>

