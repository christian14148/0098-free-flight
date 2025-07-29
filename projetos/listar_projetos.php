<?php
// Incluindo o arquivo de conexão com o banco de dados
include("../banco/conexao.php"); // Ajuste o caminho conforme necessário

// Verificação de segurança
if (!isset($con)) {
    die("Erro: Conexão com o banco de dados não foi estabelecida.");
}

// Executando a consulta
$resultado = $con->query("SELECT * FROM projetos");

$num = 1;
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição do projeto</th>
            <th scope="col">Hora de Início do projeto</th>
            <th scope="col">Data Final do projeto</th>
            <th scope="col">Hora final projeto</th>
            <th scope="col">Data de publicação do projeto</th>
            <th scope="col">Data de início do projeto</th>
            <th scope="col">Data limite projeto</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($linha = $resultado->fetch_assoc()) { ?>
            <tr>
                <th scope="row"><?php echo $num++; ?></th>
                <td><?php echo $linha['nome_do_projeto']; ?></td>
                <td><?php echo $linha['descricao']; ?></td>
                <td><?php echo $linha['hora_inicio']; ?></td>
                <td><?php echo $linha['data_fim']; ?></td>
                <td><?php echo $linha['hora_fim']; ?></td>
                <td><?php echo $linha['data_publicacao_projeto']; ?></td>
                <td><?php echo $linha['data_inicio']; ?></td>
                <td><?php echo $linha['data_publicacao_limite']; ?></td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="atualizar_projeto.php?p=editar&id=<?php echo $linha['id_projeto']; ?>" class="btn btn-primary">Editar</a>
                        <a href="deletar_projeto.php?p=excluir&id=<?php echo $linha['id_projeto']; ?>" class="btn btn-danger">Excluir</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>