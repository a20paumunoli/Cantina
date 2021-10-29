<?php
    //Si el client ja ha fet una comanda, el redirigeix a la pagina d'error
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
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/footer.css">
        <link type="text/css" rel="stylesheet" href="css/menu.css">
        <title>MENU</title>
    </head>

    <body>
        <?php 
            include("header.php");

            /* Funció que mostra tots els productes d'un menu */
            function mostrarProd($menu, $n){
                $nom = ($n == 0) ? "prodtarda-" : "prodmati-" ;
                $let = 1;
                echo "<div class='menu'><h1>MENU</h1></div>";
                foreach ($menu as $prod) {
                    echo "<div class='gc".$let." pr-grid'>";
                    echo '<div class="img">
                             <img src='.$prod["img"].' class="responsive" alt="foto-'.$prod["img"].'">
                          </div>
                          <div class="text">
                             <input type="button" class="quitar bt"  id="quitar" value="-">
                             <span>'.$prod["nombre"].' </span><span> '.$prod["precio"].'€</span>
                             <input type="hidden" id="'.$nom.$prod["id"].'" name="'.$nom.$prod["id"].'" value="0">
                             <input type="button" id="añadir" class="bt añadir" value="+">
                         </div>                
                         </div>';                
                    $let++;
                }
            }
        ?>

        <form method="POST" action="formulariDades.php">
            <div class="grid-cont1">
                <div id='bot'>
                    <div id="mati" class="grid-cont2">
                        <?php
                            //Mostrar els productes del menu del matí
                            $n = 1;
                            $data = file_get_contents("../administrador/json/cmati.json");
                            $menuMati = json_decode($data, true);
                            mostrarProd($menuMati, $n);
                        ?>
                    </div>

                    <div id="tarda" class="grid-cont2">
                        <?php
                            //Mostrar els productes del menu de la tarda
                            $n = 0;
                            $data = file_get_contents("../administrador/json/ctarda.json");
                            $menuTarda = json_decode($data, true);
                            mostrarProd($menuTarda, $n);
                        ?>
                    </div>
                </div>

                <!-- Llistat elements seleccionats -->
                <div class="ticket">
                    <div class='menu'><h1>TICKET</h1></div>
                    <div id="carrito" class="carrito"></div>
                    <div id="total" class="total">
                        <h2 class="end">Total: <span id="pr">0.0</span>€</h2>
                    </div>
                    <div class="sbm">
                        <input type="submit" id="submit" class="boton btn_ticket" value="Finalitzar comanda ->">
                    </div>
                </div>
            </div>
        </form>
        
        <div class="div_foot">
            <?php include("footer.php"); ?>
        </div>

        <script>
            /* Una variable (h) adquireix un valor (0 - 1) en funcio de l'hora que és per tal de mostrar menú del matí o de la tarda */
            let d = new Date();
            let h, t;
            if(d.getHours() < 11){ h = 0; }
            else if(d.getHours() == 11 && d.getMinutes() <= "30"){ h = 0; }
            else{ h = 1; }
            (!h) ? document.getElementById("tarda").style.display="none" : document.getElementById("mati").style.display="none";

            /* Afegir i treure producte */
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

            /* Funció que actualitza el "carrito" i mostra els productes seleccionats */
            function actualizar_carrito(){
                const prodTot = 13;
                let nom = (h) ? "prodtarda-" : "prodmati-" ;
                let precio, nombre, text = "", total = 0, i, j;
                for(i=1; i<prodTot; i++){
                    nombre = document.getElementById(nom+i).previousElementSibling.previousElementSibling.innerHTML;
                    precio = parseFloat(document.getElementById(nom+i).previousElementSibling.innerHTML);
                    if(document.getElementById(nom+i).value > 0){
                        text += ("<p>"+nombre+" x"+document.getElementById(nom+i).value+"</p></br>");
                        for(j=0; j<document.getElementById(nom+i).value; j++){
                            total += precio;
                        }
                    }
                }
                
                document.getElementById("carrito").innerHTML = text;
                document.getElementById("pr").innerHTML = total.toFixed(1);
                
                /* Mostrar el botó de finalitzar compra si s'ha seleccionat >=1 productes i no mostrar-lo en el cas que no hi hagi cap producte seleccionat */
                t = (parseFloat(document.getElementById("pr").innerHTML) > 0) ? "inline" : "none" ;
                document.getElementById("submit").style.display = t;
            }
        </script>
    </body>
</html>
