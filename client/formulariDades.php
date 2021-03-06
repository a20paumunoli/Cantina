<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link type="text/css" rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/footer.css">
        <link type="text/css" rel="stylesheet" href="css/form.css">
        <title>Validació comanda</title>
    </head>

    <body>
        <?php
        // iniciem sessió session
        session_start();
        include("header.php");
        ?>

        <div class="grid_div">

            <!-- Titol Pagina -->
            <div class="head">
                <h1>Validació comanda</h1>
            </div>

            <div class="dades_comanda">
                <div class="tit">
                    <h1>Dades de la comanda</h1>

                    <!-- Dades comanda -->
                    <?php

                    //En funció de l'hora, escollim el nom i la ruta dels fitx .json 
                    if (date("H") < 11) {
                        $h = 0;
                    } else if (date("H") == 11 && date("i") <= "30") {
                        $h = 0;
                    } else {
                        $h = 1;
                    }
                    if ($h) {
                        $nom = "prodtarda-";
                        $fit = "../administrador/json/ctarda.json";
                    } else {
                        $nom = "prodmati-";
                        $fit = "../administrador/json/cmati.json";
                    }

                    $total = 0;
                    if ($_POST) {
                        $prodTot = 12;
                        $data = file_get_contents($fit);
                        $menu = json_decode($data, true);
                        $bocatas = array();
                        $nproductos = array();

                        //Mostrar els productes seleccionats al menu
                        for ($i = 1; $i <= $prodTot; $i++) {
                            if ($_POST[$nom . $i] > 0) {
                                foreach ($menu as $m) {
                                    if ($m['id'] == $i) {
                                        echo ("<p class='prod'>- " . $m['nombre'] . " x" . $_POST[$nom . $i] . "</p>");
                                        array_push($bocatas, $m['nombre']);
                                        array_push($nproductos, $_POST[$nom . $i]);
                                        for ($j = 0; $j < $_POST[$nom . $i]; $j++) {
                                            $total += $m['precio'];
                                        }
                                    }
                                }
                            }
                        }
                    }

                    //Mostrar el preu total
                    echo "<h2>Total: " . $total . "€</h2>";

                    //Pasar les dades de la comnada a la variable $_SESSION
                    $_SESSION['total'] = $total;
                    $_SESSION['nombre'] = $bocatas;
                    $_SESSION['nproductos'] = $nproductos;
                    ?>
                </div>

                <!-- Botó tornar enrrere -->
                <input type="button" id="back" class="boton btn_back" value="Back">
            </div>


            <!--Formulari Confirmació compra-->
            <div class="dades_persona">
                <h2 class="h2">Dades Personals</h2>
                <form class="from1" method="post" name="form" action="ticket.php">
                    <div class="form_cont">
                        <div class="form_item">
                            <label for="name">Nom</label>
                            <input class="input" name="name" type="text" id="nom">
                        </div>
                        </br>
                        <div class="form_item">
                            <label for="tlf">Telèfon</label>
                            <input class="input" name="tel" type="tel" id="tlf" width="10">
                        </div>
                        </br>
                        <div class="form_item">
                            <label for="email">Correu </label>
                            <input class="input" name="email" type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
                        </div>
                    </div>
                    </br>
                    <div class="sub">
                        <input type="submit" value="Fer comanda" class="boton btn_submit" id="submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="div_foot">
            <?php include("footer.php"); ?>
        </div>

        <script type="text/javascript" src="./js/formulariDades.js"></script>
    </body>
</html>