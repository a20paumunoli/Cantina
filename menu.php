<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>MENU</title>
</head>
<body>
    <?php include("header.html") ?>   variant_cmp
    <h1>MENÚ</h1>

    <form method="POST" action="formulariDades.php">
        <label>prueba: </label> 
        <input type="text" name="o" requiered>
        <input id="Boton" type="Submit" value="Enviar">
    </form>
    <div class="mati">
    <?php

        $data = file_get_contents("json/cmati.json");
        $menuMati = json_decode($data, true);
        foreach ($menuMati as $prod) {
    ?>
        <div>
        <?php
            echo "<img src='".$prod["img"]."'></br>";
        ?>
            <button class="afegir">+</button>
        <?php
            echo $prod["nombre"]." ". $prod["precio"]."€  ". $prod["id"];
        ?>
            <button class="treure">-</button>
        </div>
        <?php
        }
    ?>
    </div>
    <div class="tarda">
        <?php

        $data = file_get_contents("json/ctarda.json");
        $menuTarda = json_decode($data, true);
        foreach ($menuTarda as $prod) {
            ?>
            <div>
                <?php
                echo "<img src='".$prod["img"]."'></br>";
                ?>
                <button class="afegir">+</button>
                <?php
                echo $prod["nombre"]." ". $prod["precio"]."€  ". $prod["id"];
                ?>
                <button class="treure">-</button>
            </div>
            <?php
        }
        ?>
    </div>



    <?php include ("footer.html"); ?>
</body>
</html>