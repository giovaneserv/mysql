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
            $categorias = mysqli_query($conexao, "SELECT *FROM categorias");
             /* Estrutura de repeticao que traz as frutas cadastradas */
            while($categoria = mysqli_fetch_assoc($categorias)){

            ?>
            <div class="bloco">
                <a href="index.php?id=<?= $categoria['id'];?>">
                <main>
                    <header>
                        <div class="bolinha"></div>
                    </header>
                    <p class="titulo"><?= $categoria["nome"];?></p>
                    <div class="data_quantidade">
                    </div>
                </main>
            </div>
            <?php } ?>
        </article>
    </main>
</body>

</html>