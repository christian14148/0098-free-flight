<?php

    $cep = '33110220';
    // Inicializa a sessão cURL
    $ch = curl_init();

    // Define a URL da API
    curl_setopt($ch, CURLOPT_URL, "https://brasilapi.com.br/api/cep/v1/{".$cep."}");

    // Define que a resposta deve ser retornada como string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Define o método HTTP (GET)
    curl_setopt($ch, CURLOPT_HTTPGET, true);

    // Executa a requisição
    $response = curl_exec($ch);

    // Verifica se houve erros
    if(curl_errno($ch)){
        echo 'Erro na requisição: ' . curl_error($ch);
    } else {
        // Trata a resposta
        $data = json_decode($response, true); // Supondo que a resposta seja JSON
        if ($data) {
            print_r($data);
            
        } else {
            echo "Resposta inválida: " . $response;
        }
    }

    // Fecha a sessão cURL
    curl_close($ch);

    
?>

    