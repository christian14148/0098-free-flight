<?php 


if ($_FILES["url_perfil"]["error"] == UPLOAD_ERR_OK) {
    $nomeArquivoOriginal = $_FILES["url_perfil"]["name"];
    $extensao = pathinfo($nomeArquivoOriginal, PATHINFO_EXTENSION);
    $nomeArquivoNovo = date("YmdHis") . "." . $extensao;
    $caminhoTemporario = $_FILES["url_perfil"]["tmp_name"];
    $caminhoDestino = "../imagens/". $nomeArquivoNovo; //A pasta imagens precisa existir
    $uploadOk = 1;


// Verifica se o arquivo da imagem é verdadeira ou falsa 
if(isset($_POST["submit"])) { 
  $check = getimagesize($caminhoTemporario); 
  if($check !== false) { 
    //echo "O arquivo é uma imagem - " . $check["mime"] . "."; 
    $uploadOk = 1; 
  } else { 
    //echo "O arquivo não é uma imagem válida."; 
    $uploadOk = 0; 
  } 
} 
 
// Verifica se o arquivo já existe
if (file_exists($nomeArquivoOriginal)) { 
  //echo "Desculpe, o arquivo já existe."; 
  $uploadOk = 0;
} 
 
// Verifica o tamanho do arquivo
if ($_FILES["url_perfil"]["size"] > 500000) { 
  //echo "Desculpe, o arquivo enviado é maior do que 500Kb."; 
  $uploadOk = 0; 
} 
 
// Allow certain file formats 
if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" 
&& $extensao != "gif" ) { 
  //echo "Desculpe, são aceitos somente arquivos JPG, JPEG, PNG & GIF."; 
  $uploadOk = 0; 
}

    // Verifica se $uploadOk é 0. Se for, retorna erro.
    if ($uploadOk == 0) { 
        echo "O seu arquivo não foi enviado.";  
    } else { // Se tudo estiver ok, realiza o upload do arquivo
        if (move_uploaded_file($caminhoTemporario, $caminhoDestino)) { 
            //echo "A imagem foi salva com sucesso.";
            //echo $caminhoDestino;
            //echo "<img src='$caminhoDestino'>";
            //echo "<img src=imagens/".$nomeArquivoNovo.">"; 
        } else { 
            echo "Desculpe. Ocorreu algum erro. Tente novamente mais tarde."; 
        } 
    } 
} else {
    echo "Erro no upload: " . $_FILES["url_perfil"]["error"];
}

 
?> 