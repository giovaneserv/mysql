<?php
include("conexao.php");
// receber as informaçoes do form por post

//cria as variaveis para receber as informações
$nome = $_POST['nome'];
$qntd = $_POST['quantidade'];
$estado = $_POST['estado'];
$categoria = $_POST['categorias'];
$data = $_POST['data'];

if (strtotime($data)) {
    // Se a data for válida, formate-a no formato desejado (AAAA-MM-DD)
    $data_formatada = date('Y-m-d', strtotime($data));
}
    
//query para salvar as informações no banco de dados 
$frutas = mysqli_query($conexao, "INSERT INTO frutas (nome, quantidade, id_categorias, estado, data_aquisicao) VALUES ('$nome', '$qntd', '$categoria', '$estado', '$data')");

if ($frutas) {
    echo "Sucesso, a fruta foi salva";
}
?>
