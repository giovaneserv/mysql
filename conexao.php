<?php

$conexao = mysqli_connect("localhost:403","root","123456","quitanda",);

if($conexao) {
    echo "Sucesso";
}  else {
    echo "Deu Ruim!";
}