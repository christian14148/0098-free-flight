<?php
include '../banco/conexao.php';
if ($_GET['p']=='excluir' && isset($_GET['id'])){
    $id = $_GET['id']; 
    $sql = "DELETE FROM projetos WHERE id_projeto = $id"; 

    if ($con->query($sql) === TRUE) { 
        echo "Projeto deletado com sucesso!<br>"; 
        echo "<a href='index.php' class='btn btn-primary'>Voltar</a>"; 
    } else { 
        echo "Erro ao deletar: " . $con->error; 
    } 
}else{
    echo 'Erro ao deletar';
    echo "<a href='listar_projetos,php' class='btn btn-primary'>Voltar</a>"; 
}
?>