<?php
include '../banco/conexao.php';
if ($_GET['p']=='salvar'){
    $nome_do_projeto = $_POST['nome_do_projeto']; 
    //$id_usuario_freelancer = $_POST['id_usuario_feelancer'];
    //$id_usuario_contratante = $POST['id_usuario_contratante']; //puxar do banco
    //data e hora do projeto
    $descricao = $_POST['descricao']; 
    $hora_inicio = $_POST['hora_inicio']; 
    $data_fim = $_POST['data_fim']; 
    $hora_fim= $_POST['hora_fim']; 
    //$data_publicacao = date("Y-m-d H:m");
    $data_inicio= $_POST['data_inicio'];
    //$data_limite = date('Y-m-d H:m', strtotime($data_publicacao . '+ 15 days'));

    $sql = " UPDATE projetos SET nome_do_projeto='$nome_do_projeto', descricao='$descricao', data_publicacao_projeto='$data_publicacao', data_publicacao_limite='$data_limite',data_inicio,hora_inicio='$hora_inicio',data_fim='$data_fim',hora_fim='$hora_fim' ,'$data_inicio'";

    if ($conn->query($sql) === TRUE) { 
        echo "Projeto atualizado com sucesso!"; 
        echo '<a href="index.php" class="btn btn-primary">Voltar</a>'; 
        } else { 
        echo "Erro: " . $sql . "<br>" . $conn->error; 
        } 
    }

    if ($_GET['p']=='editar' && isset($_GET['id'])){
        $id = $_GET['id'];
        $resultado = $con->query("SELECT * FROM projetos WHERE id_projeto=$id");
        $projetos= $resultado->fetch_assoc();
        
    
?>


    <form action="atualizar.php?p=salvar&id=<?php  echo $projetos['id_projeto']; ?>" method="POST">
        <div>
        <input type="text"  id="nome_do_projeto" name="nome_do_projeto" value="<?php echo $projetos['nome_do_projeto'];?>">Id do projeto<br><br>
        </div>

        <div>
        <input type="text"  descricao="descricao" name="descricao" value="<?php echo $projetos['descricao'];?>">Descrição do projeto <br><br>
        </div>
         
            
        
        <div>
       <input type="date"  id="data_inicio" name="data_inicio" required value="<?php echo $projetos['data_inicio'];?>">Data Inicio do projeto<br><br>
        </div>

        <div>
       <input type="time"  id="hora_inicio" name="hora_inicio" required value="<?php echo $projetos['hora_inicio'];?>">Horario do projeto<br> <br>
        </div>

        <div>
       <input type="date"  id="data_fim" name="data_fim" required value="<?php echo $projetos['data_fim'];?>">Data final do projeto<br><br>
       </div> 
        
       <div>
       <input type="time"  id="hora_fim" name="hora_fim" required value="<?php echo $projetos['hora_fim'];?>">Hora final do projeto<br><br>
        </div>

        <button type="submit" class="btn btn-primary">atualizar </button>
    </form>


<?php
    }
?>