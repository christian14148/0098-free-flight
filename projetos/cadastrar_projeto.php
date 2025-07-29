<?php
include '../banco/conexao.php';
if ($_GET['p']=='inserir'){
    $nome_do_projeto = $_POST['nome_do_projeto']; 
    //$id_usuario_freelancer = $_POST['id_usuario_feelancer'];
    //$id_usuario_contratante = $POST['id_usuario_contratante']; //puxar do banco
    //data e hora do projeto
    $descricao = $_POST['descricao']; 
    $hora_inicio = $_POST['hora_inicio']; 
    $data_fim = $_POST['data_fim']; 
    $hora_fim= $_POST['hora_fim']; 
    $data_publicacao = date("Y-m-d H:m");
    $data_inicio= $_POST['data_inicio'];
    $data_limite = date('Y-m-d H:m', strtotime($data_publicacao . '+ 15 days'));

    $sql = "INSERT INTO projetos (nome_do_projeto, descricao, data_publicacao_projeto, data_publicacao_limite,data_inicio,hora_inicio,data_fim,hora_fim) 
    VALUES('$nome_do_projeto','$descricao','$data_publicacao','$data_limite','$data_inicio','$hora_inicio','$data_fim','$hora_fim')";

    if ($con->query($sql) === TRUE) { 
        echo "Contato cadastrado com sucesso!<br>"; 
        echo '<a href="index.php" class="btn btn-primary">Voltar</a>'; 
        } else { 
        echo "Erro: " . $sql . "<br>" . $con->error; 
        } 

}
?>

    <form action="cadastrar_projeto.php?p=inserir" method="POST">
    <input type="text"  id="nome_do_projeto" name="nome_do_projeto" required> Nome do projeto <br><br>
    <input type="text"  id="descricao" name="descricao" required>Descriçao do projeto<br><br>
    <input type="date"  id="data_inicio" name="data_inicio" required>Data Inicio do projeto<br><br>
    <input type="time"  id="hora_inicio" name="hora_inicio" required>Horario do projeto<br> <br>
    <input type="date"  id="data_fim" name="data_fim" required>Data final do projeto<br><br>
    <input type="time"  id="hora_fim" name="hora_fim" required>Hora final do projeto<br><br>
    
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    


