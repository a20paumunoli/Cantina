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
    <include src="./header.html"></include>  
    <h1>MENÚ</h1>

    <form method="POST" action="formulariDades.php">
        <label>prueba: </label> 
        <input type="text" name="o" requiered>
        <input id="Boton" type="Submit" value="Enviar">
    </form>

    <?php
        $data = file_get_contents("cmati.json");
        $menuMati = json_decode($data, true);
        foreach ($menuMati as $prod) {
            echo $prod["nombre"]." ". $prod["precio"]."€  ". $prod["id"];
            echo "<img src='".$prod["img"]."'></br>";
        }
    ?>



    <include src="./footer.html"></include>
</body>
</html>