<?php
include "conexao.php";
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
        <article class="form">
            <hr>
            <?php 
                $id= $_GET["id"];
                $fruta = mysqli_query($conexao, "SELECT *FROM  frutas WHERE id = $id");
                $dados = mysqli_fetch_assoc($fruta);
            ?>
            <form action="salvar.php" method="POST">
                <div> 
                    <label>Nome da fruta</label>
                    <input type="text" name="nome" value="<?php $dados["nome"];?>">
                </div>
                <div>
                    <label>Quantidade</label>
                    <input type="text" name="quantidade">
                </div>
                <div>
                    <label>Estado</label>
                    <input type="text" name="estado">
                </div>
                <div>
                    <label>Data</label>
                    <input type="date" name="data">
                </div>
                <div>
                    <label>Categoria</label>
                    <select name="categorias">
                        <?php
                        $categorias = mysqli_query($conexao, "SELECT * FROM categorias");
                        while ($categoria = mysqli_fetch_assoc($categorias)) {
                            echo "<option value=" . $categoria["id"] . ">" . $categoria["nome"] . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div>
                    <label>Preço</label>
                    <input type="number" name="preco">
                </div>
                <button type="submit">Salvar</button>
            </form>
        </article>
    </main>
</body>

</html>