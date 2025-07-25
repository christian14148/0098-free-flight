<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancers!</title>
</head>
<body>
<?php

include('../banco/conexao.php');
if ($_GET['p']=='salvar'){

    $cpf = $_POST['id']; 
    $nome = $_POST['nome']; 
    //$senha = hash('md2',$_POST['senha']); 
    $telefone = $_POST['telefone']; 
    $email = $_POST['email']; 
    $dtnascimento = $_POST['dtnascimento'];
    $bio_usuario = $_POST['bio'];
    //$tipo_usuario = $_POST['tipo_usuario'];   //Remover depois
    $genero_usuario = $_POST['genero_usuario'];
    $categorias = $_POST['categorias_usuario'];
    //$cep = $_POST['cep'];           //Tenho que ver ainda
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['uf'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    //Atualizar imagem
    if($_FILES["url_perfil"]["error"] == UPLOAD_ERR_OK){
        include('save.php');
        $attimagem = "UPDATE usuarios SET avatar_url='$nomeArquivoNovo' WHERE cpf='$cpf'";

        if ($conn->query($attimagem) === TRUE) { 
            echo "Imagem atualizada com sucesso!"; 
            } else { 
            echo "Erro: atualizar imagem" . $attimagem . "<br>" . $conn->error;
            }
    }
    

/*
cpf = id/PK usuário
nome_usuario = Nome
senha_usuario = senha
telefone_usuario = Telefone
email = Email
data_nascimento = Data de Nascimento
bio_usuario = Biografia
cep = CEP
rua = Rua
bairro = Bairro
cidade = Cidade
estado = Estado
numero = Número
complemento = Complemento
tipo_usuario = Freelancer, contratante, administrador
genero_cliente = F, M, outro
avatar_url = Foto de perfil
categorias_usuario = Categorias de experiência
*/

    $sql = "UPDATE usuarios SET nome_usuario='$nome', telefone_usuario='$telefone', email='$email', bio_usuario='$bio_usuario', data_nascimento='$dtnascimento', rua='$rua', bairro='$bairro', cidade='$cidade', estado='$estado', numero='$numero', complemento='$complemento', genero_cliente='$genero_usuario', categorias_usuario='$categorias' WHERE cpf='$cpf'";

    if ($conn->query($sql) === TRUE) { 
        echo "Contato atualizado com sucesso!"; 
        echo '<a href="cadastrar_usuario.php">Voltar</a>'; 
        } else { 
        echo "Erro: " . $sql . "<br>" . $conn->error;
        }
}

if ($_GET['p']=='editar' && isset($_GET['cpf'])){
    $cpf = $_GET['cpf'];
    $resultado = $conn->query("SELECT * FROM usuarios WHERE cpf='$cpf'");
    $contato = $resultado->fetch_assoc();
}

if ($_GET['p']=='editar'){
?>

<h2>Editar Contato</h2>
<form action="editar_cadastro.php?p=salvar" method="POST" enctype="multipart/form-data">

    <!--  Biografia e Senha   -->

    <div>
        <label>Nome </label>
        <div>
            <input type="text" id="nome" name="nome" value="<?php echo $contato['nome_usuario'];?>">
             <input type="hidden" id="id" name="id" value="<?php echo $contato['cpf'];?>"><br>
        </div>
    </div>
    <div>
        <label>Bio </label>
        <div>
            <textarea id="bio" name="bio" rows="4" cols="50"><?php echo $contato['bio_usuario'];?></textarea>
        </div>
    </div>
    <div>
        <label>Telefone </label>
        <div>
            <input type="phone" id="telefone" name="telefone" value="<?php echo $contato['telefone_usuario'];?>">
        </div>
    </div>
    <div>
        <label>E-mail </label>
        <div>
            <input type="email" id="email" name="email" value="<?php echo $contato['email'];?>">
        </div>
    </div>
    <div>
        <label>Data de Nascimento </label>
        <div>
            <input type="date" id="dtnascimento" name="dtnascimento" value="<?php echo $contato['data_nascimento'];?>">
        </div>
    </div>
    <div>
        <label>Gênero do usuário </label>
        <div>
            <input type="text" id="genero_usuario" name="genero_usuario" value="<?php echo $contato['genero_cliente'];?>">
        </div>
    </div>
    <div>
        <label>Foto de perfil </label>
        <div>
            <img src="../imagens/<?php echo $contato['avatar_url'];?>" alt=""><br>
            <input type="file" id="url_perfil" name="url_perfil" multiple>  
        </div>
    </div>
    <div>
        <label>Categorias </label>
        <div>
            <input type="text" id="categorias_usuario" name="categorias_usuario" value="<?php echo $contato['categorias_usuario'];?>">
        </div>
    </div>
    <div>
        <label>Rua </label>
        <div>
            <input type="text" id="rua" name="rua" value="<?php echo $contato['rua'];?>">
        </div>
    </div>
    <div>
        <label>Bairro </label>
        <div>
            <input type="text" id="bairro" name="bairro" value="<?php echo $contato['bairro'];?>">
        </div>
    </div>
    <div>
        <label>Cidade </label>
        <div>
            <input type="text" id="cidade" name="cidade" value="<?php echo $contato['cidade'];?>">
        </div>
    </div>
    <div>
        <label>Estado </label>
        <div>
            <input type="text" id="uf" name="uf" value="<?php echo $contato['estado'];?>">
        </div>
    </div>
    <div>
        <label>Número </label>
        <div>
            <input type="text" id="numero" name="numero" value="<?php echo $contato['numero'];?>">
        </div>
    </div>
    <div>
        <label>Complemento </label>
        <div>
            <input type="text" id="complemento" name="complemento" value="<?php echo $contato['complemento'];?>">
        </div>
    </div>
    <button type="submit">Salvar</button>
</form>

</body>
</html>

<?php
}
?>