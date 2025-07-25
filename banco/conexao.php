<?php
$host = 'localhost'; 
    $usuario = 'root'; 
    $senha = NULL; 
    $banco = 'freelancer'; 
    $porta = '3316';

    
    $conn = new mysqli($host,$usuario,$senha,$banco, $porta); 
    
    if ($conn->connect_error) { 
        die("Conexão falhou: " . $conn->connect_error); 
    }

    ?>