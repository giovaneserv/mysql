<?php
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stilo.css">
    <title>Quitanda</title>
</head>

<body>
    <main>
        <header>
            <div id="logo"><img src="img/logo.png"></div>
            <nav>
               <?php
               include "menu.php";
               ?>
            </nav>
        </header>
        <article>
            <?php

            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $frutas = mysqli_query($conexao, "SELECT *FROM frutas where id_categorias = $id");
            }else{
                $frutas = mysqli_query($conexao, "SELECT *FROM frutas");
            }
             /* Estrutura de repeticao que traz as frutas cadastradas */
            while($fruta = mysqli_fetch_assoc($frutas)){

            ?>
            <div class="bloco cor<?= $fruta["id_categorias"];?>">
                <main>
                    <header>
                        <div class="bolinha"></div>
                    </header>
                    <p class="titulo"><?= $fruta["nome"];?></p>
                    <div class="data_quantidade">
                        <div class="quantidade">
                            <p class="claro">Quantidade</p>
                            <p><?= $fruta["quantidade"];?></p>
                        </div>
                        <div class="data">
                            <p class="claro">Data</p>
                            <p><?= $fruta["data_aquisicao"];?></p>
                        </div>
                    </div>
                </main>
            </div>
            <?php } ?>
        </article>
    </main>
</body>

</html>