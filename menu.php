<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/normalize.css">
        <title>MENU</title>

        <style>
            
            .grid-cont1{
                display: grid;
                grid-template-columns: 3fr 1fr;
                margin: 10px 40px 10px 40px;
            }

            .grid-cont2{
                display: grid; 
                grid-template-areas: "comida comida comida comida"
                                     "comida1 comida2 comida3 comida4"
                                     "bebida bebida bebida bebida"
                                     "bebida1 bebida2 bebida3 bebida4"
                                     "dulce dulce submit submit"
                                     "dulce1 dulce2 submit submit";
            }

            .gc1{
                grid-area: comida;
                background-color: red;
                height: 50px;
            }

            .gc2{
                grid-area: comida1; 
                background-color: blue;
            }

            .gc3{
                grid-area: comida2;
                background-color: lightblue;
            }

            .gc4{
                grid-area: comida3;
                background-color: lightsteelblue;
            }

            .gc5{
                grid-area: comida4;
                background-color: darkblue;
            }

            .gc6{
                grid-area: bebida;
                background-color: limegreen;
            }

            .gc7{
                grid-area: bebida1;
                background-color: lightseagreen;
            }
            .gc8{
                grid-area: bebida2;
                background-color: green;
            }
            .gc9{
                grid-area: bebida3;
                background-color: greenyellow;
            }
            
            .gc10{
                grid-area: bebida4;
                background-color: lightgreen;
            }

            .gc11{
                grid-area: dulce;
                background-color: lightcoral;
            }

            .gc12{
                grid-area: dulce1;
                background-color: coral;
            }

            .gc13{
                grid-area: dulce2;
                background-color: pink;
            }

            .gc14{
                grid-area: submit;
                background-color: red;
            }
            
            .ticket{
                background-color: grey;
                margin-left: 20px;
            }

        
        </style>

    </head>

    <body>
        <?php include("header.php") ?>
        
        <form method="POST" action="formulariDades.php">
            <label>prueba: </label>
            <input type="text" name="o" requiered>
            <input id="Boton" type="Submit" value="Enviar">
        </form>
        
        <div class="grid-cont1">
            <div>
                <p>MENÚ</p>
                <div class="grid-cont2">
                    <div class="gc1">Comida</div>
                    <div class="gc2">a</div>
                    <div class="gc3">a</div>
                    <div class="gc4">a</div>
                    <div class="gc5">a</div>
                    <div class="gc6">Bebida</div>
                    <div class="gc7">a</div>
                    <div class="gc8">a</div>
                    <div class="gc9">a</div>
                    <div class="gc10">a</div>
                    <div class="gc11">Dulce</div>
                    <div class="gc12">a</div>
                    <div class="gc13">a</div>
                    <div class="gc14">Submit</div>
                </div>
            </div>
            <div class="ticket">
                <h3>Ticket</h3>
                <div>

                </div>
            </div>
        </div>


            
        <div class="mati">
            <?php
            $data = file_get_contents("json/cmati.json");
            $menuMati = json_decode($data, true);
            foreach ($menuMati as $prod) {
            ?>
                <div>
                    <?php
                        echo "<img src='" . $prod["img"] . "'></br>";
                    ?>
                    <button class="afegir">+</button>
                    <?php
                        echo $prod["nombre"] . " " . $prod["precio"] . "€  " . $prod["id"];
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
                        echo "<img src='" . $prod["img"] . "'></br>";
                        ?>
                        <button class="afegir">+</button>
                        <?php
                        echo $prod["nombre"] . " " . $prod["precio"] . "€  " . $prod["id"];
                        ?>
                        <button class="treure">-</button>
                    </div>
            <?php
            }
            ?>
        </div>

        <?php include("footer.php"); ?>
    </body>
</html>