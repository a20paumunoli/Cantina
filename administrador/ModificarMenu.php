<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./css/mostrarm.css">  
    <title>Modificar Menu</title>
</head>

<body>
    <?php include("../client/header.php")?>

    <!-- Boto anar enrere -->
    <div>
        <input type="button" id="back" class="boton btn_back" value="Back">
    </div>

    <!-- Mostrar  anar enrere -->
    <div class="cont">
        <div class="tit int-cont">
            <h1>Modificar preu dels productes dels menús</h1>
        </div>

        <div class='header1 int-cont'>
            <form action='ModificarMenu.php' method='POST'>
                <input type='hidden' name='mati' value='./json/cmati.json'>
                <input type='submit' class='boton btn2' value ='Menu mati'>
            </form>
        </div>

        <div class='header2 int-cont'>
            <form action='ModificarMenu.php' method='POST'>
                <input type='hidden' name='tarda' value='./json/ctarda.json'>
                <input type='submit' class='boton btn2' value ='Menu tarda'>
            </form>
        </div>

        <?php
            $n = 1;           
            if($_POST){

                //En funcio del botó seleccionat, la ruta es ./json/ctarda.json o ./json/cmati.json 
                if(isset($_POST['mati'])){ $ruta = $_POST['mati']; }
                if(isset($_POST['tarda'])){ $ruta = $_POST['tarda']; }
                if(isset($_POST['aux'])){ $ruta = $_POST['aux']; }

                //Obtenir dades del fitxer seleccionat i guardar-les a la variable $fitx
                $data = file_get_contents($ruta);
                $fitx = json_decode($data, true);

                //Mostrar 12 botons que fan referencia als 12 productes del fitxer seleccionat
                foreach ($fitx as $prod){
                    echo "<div class='int-cont c".$n."'><form action='ModificarMenu.php' method='POST'>
                          <input type='hidden' name='Idprod' value='".$prod["id"]."'>
                          <input type='hidden' name='aux' value='".$ruta."'>
                          <input type='submit' class='boton btn' value ='Producte nº".$prod["id"]."'>
                          </form></div>";
                    $n++;
                }
                echo "<div class='footer int-cont'>";

                //Mostrar 3 inputs amb les dades del producte seleccionat (nom, preu, img[ruta]) - Només es pot modificar l'input del preu
                if(isset($_POST["Idprod"])){
                    foreach ($fitx as $prod){
                        if($prod['id'] == $_POST["Idprod"]){
                            echo "<form action='ModificarMenu.php' method='POST' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='prod' value='".$prod["id"]."'>";
                            echo "<div class='g-cont'>
                            <div class='g1'><label>Nom: </label></div>
                            <div class='g2'><input type='text' value='".$prod['nombre']."' name='nomProd' disabled></div>
                            <div class='g3'><label>Preu: </label></div>
                            <div class='g4'><input type='text' value='".$prod['precio']."' name='preuProd'></div>
                            <div class='g5'><label>Imatge (Ruta): </label></div>
                            <div class='g6'><input type='hidden' name='aux' value='".$ruta."'><input type='text' value='".$prod['img']."' name='imgProd' disabled></div>
                            <div class='g7'><input type='submit' class='boton btn' value ='Cambiar'></div>
                            </div>";
                            echo "</form></div>";
                        }
                    }
                }

                //Guardar els canvis a la variable $fitx i introduir-los al fitxer seleccionat a l'inici.
                if(isset($_POST["prod"])){
                    $fitx[$_POST["prod"]-1]["nombre"] = $_POST["nomProd"];
                    $fitx[$_POST["prod"]-1]["precio"] = $_POST["preuProd"];
                    $fitx[$_POST["prod"]-1]["img"] = $_POST["imgProd"];
                    $data = json_encode($fitx);
                    file_put_contents($ruta, $data);
                    echo "<div class='footer int-cont'><p>Canvis efectuats</p></div>";
                }
            }
        ?>
    </div>

    <div class="div_foot">
        <?php include("../client/footer.php"); ?>
    </div>
    <script>
        // Boto anar enrere 
        document.getElementById("back").addEventListener("click", function(e){
            window.history.back();
        });
    </script>
</body>
</html>
