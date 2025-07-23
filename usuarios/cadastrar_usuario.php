<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeFlight</title>
</head>


<!--
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
-->
<!--
http://localhost/freelancers/usuarios/cadastrar_usuario.php?p=inserir
-->
<?php
include('../banco/conexao.php');
if ($_GET['p']=='inserir'){ 
    
        $cpf = $_POST['cpf']; 
        $nome = $_POST['nome']; 
        $senha = hash('md2',$_POST['senha']); 
        $telefone = $_POST['telefone']; 
        $email = $_POST['email']; 
        $dtnascimento = $_POST['dtnascimento'];
        $bio_usuario = $_POST['bio'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $genero_usuario = $_POST['genero_usuario'];
        $url_perfil = $_POST['url_perfil'];
        $categorias = $_POST['categorias'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['uf'];
        $uf = $_POST['uf'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
         
        $sql = "INSERT INTO usuarios (cpf, nome_usuario, senha_usuario, telefone_usuario, email, data_nascimento, bio_usuario, cep, rua, bairro, cidade, estado, numero, complemento, tipo_usuario, genero_cliente, avatar_url, categorias_usuario) 
                            VALUES ('$cpf', '$nome', '$senha', '$telefone',  '$email',  '$dtnascimento', '$bio_usuario', '$cep', '$rua', '$bairro', '$cidade', '$estado', '$numero', '$complemento', '$tipo_usuario', '$genero_usuario', '$url_perfil', '$categorias')"; 
        
        if ($conn->query($sql) === TRUE){ 
        echo "Contato cadastrado com sucesso!<br>"; 
        echo '<a href="cadastrar_usuario.php" class="btn btn-primary">Voltar</a>'; 
        } else { 
        echo "Erro: " . $sql . "<br>" . $conn->error; 
        }
    }else{
?>

<body>
    
    <form action="cadastrar_usuario.php?p=inserir" method="POST">
    <div>
        <label>CPF </label>
        <input type="number" name="cpf" required>
    </div>
    <div>
        <label>Nome </label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>Senha </label>
        <input type="password" name="senha" required>
    </div>
    <div>
        <label>Telefone </label>
        <input type="phone" name="telefone" required>
    </div>
    <div>
        <label>Email </label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Data de Nascimento </label>
        <input type="date" name="dtnascimento" required>
    </div>
    <div>
        <label>Tipo de usuário </label>
        <input type="text" name="tipo_usuario" palceholder="tipo" list="type" required>
        <datalist id="type">
            <option value="Freelancer"></option>
            <option value="Contratante"></option>
    </div>
    <div>
        <label>Gênero </label>
        <input type="text" name="genero_usuario" palceholder="genero" list="faixa" required>
        <datalist id="faixa">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="Outro"></option>
        </datalist>
    </div>
    <div>
        <label>Foto de perfil </label>
        <input type="file" name="url_perfil" accept="image/*">
    </div>
    <div>
        <label>Categorias de trabalho </label>
        <input type="text" name="categorias">
    </div>

        <!--        API         -->

    <div class="frm-group">
        <label>CEP</label>
        <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="8"/>
    </div>
   
   <div class="frm-group">
      <label>Rua</label>
      <input type="text" name="rua" id="rua"/>
    </div>
     
    <div class="frm-group">
      <label>Bairro</label>
      <input type="text" name="bairro" id="bairro"/>
    </div>
     
    <div class="frm-group">
      <label>Cidade</label>
      <input type="text" name="cidade" id="cidade"/>
    </div>
     
    <div class="frm-group">
      <label>Estado</label>
      <input type="text" name="uf" id="uf"/>
    </div>

    <div class="frm-group">
      <label>Número</label>
      <input type="text" name="numero" id="numero" />
    </div>

    <div class="frm-group">
      <label>Complemento</label>
      <input type="text" name="complemento" id="complemento" />
    </div>
    <div>
        <label>Biografia </label>
        <input type="text" name="bio">
    </div>
    <button type="submit">Cadastrar</button>
    </form>

    <script>
function pesquisacep(valor) {

    // Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    // Verifica se campo cep possui valor informado.
    if (cep != "") {

        // Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        // Valida o formato do CEP.
        if (validacep.test(cep)) {

            // Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            // Cria um elemento javascript.
            var script = document.createElement('script');

            // Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            // Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            alert("Formato de CEP inválido");
            limpa_formulario_cep();
            
        }
    } // end if.
    else {
        // cep sem valor, limpa formulário.
        limpa_formulario_cep();
    }
}

function limpa_formulario_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        // Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        // CEP não Encontrado.
        limpa_formulario_cep();
        alert("CEP não encontrado.");
    }
}
</script>
<?php
}
?>

</body>
</html>