<?php
if (isset($_COOKIE["comanda"])){
    header('Location: error.php');
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <title>MENU</title>

        <style>
            .grid-cont1{
                display: grid;
                grid-template-columns: 3fr 1fr;
                margin: 10px 40px 10px 40px;
            }

            .pr-grid{
                display: grid;
                grid-template-rows: 3fr 1fr;
                align-items: center;
                justify-items: center;
            }

            .grid-cont2{
                display: grid;
                grid-template-areas: "comida comida comida comida"
                                        "comida1 comida2 comida3 comida4"
                                        "bebida bebida bebida bebida"
                                        "bebida1 bebida2 bebida3 bebida4"
                                        "dulce dulce submit submit"
                                        "dulce1 dulce2 submit submit";
                gap: 10px 25px;
                grid-template-columns: auto;
                grid-template-rows: 30px 250px 30px 250px 30px 250px;

            }

            .gc1{
                grid-area: comida;
                background-color: lightsteelblue;
            }

            .gc2{
                grid-area: comida1;
                background-color: lightsteelblue;
                column-gap: 10px;
            }

            .gc3{
                grid-area: comida2;
                background-color: lightsteelblue;
            }

            .gc4{
                grid-area: comida3;
                background-color: lightsteelblue;
            }

            .gc5{
                grid-area: comida4;
                background-color: lightsteelblue;
            }

            .gc6{
                grid-area: bebida;
                background-color: lightsteelblue;
            }

            .gc7{
                grid-area: bebida1;
                background-color: lightsteelblue;
            }
            .gc8{
                grid-area: bebida2;
                background-color: lightsteelblue;
            }
            .gc9{
                grid-area: bebida3;
                background-color: lightsteelblue;
            }

            .gc10{
                grid-area: bebida4;
                background-color: lightsteelblue;
            }

            .gc11{
                grid-area: dulce;
                background-color: lightsteelblue;
            }

            .gc12{
                grid-area: dulce1;
                background-color: lightsteelblue;
            }

            .gc13{
                grid-area: dulce2;
                background-color: lightsteelblue;
            }

            .gc14{
                grid-area: submit;
                background-color: lightsteelblue;
            }

            .ticket{
                background-color: grey;
                margin-left: 20px;
            }

            .responsive{
                width: 100%;
                max-width: 150px;
                height: auto;
            }

            /*.text{
    _
            }*/

            /*.img{
    _
            }*/

        </style>

    </head>

    <body>
        <?php 
            include("header.php");

            /*  -- Graella productes --  */
            function mostrarProd($menu, $n){
                $nom = ($n == 0) ? "prodtarda-" : "prodmati-" ;
                $let = 0;
                foreach ($menu as $prod) {
                    if($let == 0){
                        echo "<div class='gc".($let+1)."'>Comida</div>";
                        $let++;
                    }else if ($let == 5){
                        echo "<div class='gc".($let+1)."'>Begudes</div>";
                        $let++;
                    }else if($let == 10){
                        echo "<div class='gc".($let+1)."'>Dolços</div>";
                        $let++;
                    }
                    echo "<div class='gc".($let+1). " pr-grid'>";
                    echo '<div class="img">
                                        <img src='.$prod["img"].' class="responsive" alt="foto-'.$prod["img"].'">
                                    </div>
                                    <div class="text">
                                        <input type="button" id="quitar" class="quitar" value="-">
                                        <span>'.$prod["nombre"].  '</span><span> '.$prod["precio"].'€</span>
                                        <input type="hidden" id="'.$nom.$prod["id"].'" name="'.$nom.$prod["id"].'" value="0">
                                        <input type="button" id="añadir" class="añadir" value="+">
                                    </div></div>';
                    $let++;
                }
                echo "<div class='gc".($let+1)."'><input type='submit' value='Finalitzar compra'></div>";
            }
        ?>

        <form method="POST" action="formulariDades.php">
            <div class="grid-cont1">
                <div id='bot'>
                    <p>MENÚ</p>
                    <div id="mati" class="grid-cont2">
                        <?php
                            $n = 1;
                            $data = file_get_contents("json/cmati.json");
                            $menuMati = json_decode($data, true);
                            mostrarProd($menuMati, $n);
                        ?>
                    </div>

                    <div id="tarda" class="grid-cont2">
                        <?php
                            $n = 0;
                            $data = file_get_contents("json/ctarda.json");
                            $menuTarda = json_decode($data, true);
                            mostrarProd($menuTarda, $n);
                        ?>
                    </div>
                </div>

                <!-- Llistat elements seleccionats -->

                <div class="ticket">
                    <h3>Ticket</h3>
                    <div id="carrito"></div>
                    <div id="total">
                        <h4>Total: 0€</h4>
                    </div>
                </div>
            </div>
        </form>

        <script>
            /* Menú matí o tarda */
            let d = new Date();
            (d.getHours() <= "12") ? document.getElementById("tarda").style.display="none" : document.getElementById("mati").style.display="none";
            
            /* Añadir & Quitar producto */
            const idProductoJSON = 6;
            document.getElementById("bot").addEventListener("click", function(e){
                let idProd;
                if(e.target.classList.contains("añadir")){
                    idProd = e.target.parentElement.childNodes[idProductoJSON].id;
                    document.getElementById(idProd).value++;
                    actualizar_carrito();
                }
                else if(e.target.classList.contains("quitar")){
                    idProd = e.target.parentElement.childNodes[idProductoJSON].id;
                    if(document.getElementById(idProd).value > 0){ document.getElementById(idProd).value--; }
                    actualizar_carrito();
                }
            });

            /* Actualizar carrito */
            function actualizar_carrito(){
                let nom = (d.getHours() > "12") ? "prodtarda-" : "prodmati-" ; 
                let precio, nombre, text = "", total = 0, i, j;
                for(i=1; i<=10; i++){
                    console.log(nom+i);
                    nombre = document.getElementById(nom+i).previousElementSibling.previousElementSibling.innerHTML;
                    precio = parseFloat(document.getElementById(nom+i).previousElementSibling.innerHTML);
                    console.log(precio);
                    if(document.getElementById(nom+i).value > 0){
                        text += ("<p>"+nombre+"......"+document.getElementById(nom+i).value+"</p></br>");
                        for(j=0; j<document.getElementById(nom+i).value; j++){
                            total += precio;
                        }
                    }
                }
                document.getElementById("carrito").innerHTML = text;
                document.getElementById("total").innerHTML = "<h4>Total:"+total.toFixed(1)+"€</h4>";
            }
        </script>

        <?php include("footer.php"); ?>

    </body>
</html>
