<?php
//CONEXÃO COM O BANCO

$host = "localhost";//servidor onde esta o banco de dados
$user = "root"; //nome do usuario
$psw = ""; //senha do banco de dados
$database = "freelancers"; // nome do banco de dados

//Criar conexao com banco de dados
$con = new mysqli($host,$user,$psw,$database);
if ($con->connect_error) { 
    die("Conexão falhou");
}
echo"Conectado com Sucesso ";
?>