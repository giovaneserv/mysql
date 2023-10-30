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

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $frutas = mysqli_query($conexao, "SELECT *FROM frutas where id_categorias = $id");
            } else {
                $frutas = mysqli_query($conexao, "SELECT *FROM frutas");
            }
            /* Estrutura de repeticao que traz as frutas cadastradas */
            while ($fruta = mysqli_fetch_assoc($frutas)) {

            ?>
                <div class="bloco cor<?= $fruta["id_categorias"]; ?>">
                    <main>
                        <header>
                            <div class="bolinha"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></div>
                            <div class="bolinha2"><a href="salvar.php?acao=delete&id=<?=$fruta['id'];?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </a> </div>
                        </header>
                        <p class="titulo"><?= $fruta["nome"] . '-' . $fruta['estado'] . '-' . $fruta['quantidade']; ?></p>
                        <div class="data_quantidade">
                            <div class="quantidade">
                                <p class="claro">Quantidade</p>
                                <p><?= $fruta["quantidade"]; ?></p>
                            </div>
                            <div class="data">
                                <p class="claro">Data</p>
                                <p><?= $fruta["data_aquisicao"]; ?></p>
                            </div>
                        </div>
                    </main>
                </div>
            <?php } ?>
        </article>
    </main>
</body>

</html>