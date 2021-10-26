
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/form.css">
        <title>Validació comanda</title>

    </head>

    <body>
    <?php
    // start a session
    session_start();

    ?>
        <?php include("header.php") ?>

        <div class="grid_div">
            <div class="head">
                <h1>Validació comanda</h1>
            </div>

            <div class="dades_comanda">
                <div class="tit">
                    <h2>Dades comanda</h2>
                    <?php

                        if(date("H") < 11){ $h = 0; }
                        else if( date("H") == 11 && date("i") <= "30"){ $h = 0; }
                        else{ $h = 1; }
                        if($h){
                            $nom = "prodtarda-" ;
                            $fit = "json/ctarda.json";
                        }else{
                            $nom = "prodmati-" ;
                            $fit = "json/cmati.json";
                        }

                        $total=0;

                        if($_POST){
                            $data = file_get_contents($fit);
                            $menu = json_decode($data, true);
                            $bocatas = array();
                            $nproductos = array();

                            for($i=1; $i<=10; $i++){
                                if($_POST[$nom.$i] > 0){
                                    foreach($menu as $m){
                                        if($m['id'] == $i){
                                            echo ("<p>".$m['nombre'].".....".$_POST[$nom.$i]."</p>");
                                            array_push($bocatas, $m['nombre']);
                                            array_push($nproductos, $_POST[$nom.$i]);
                                            for($j=0; $j<$_POST[$nom.$i]; $j++){
                                                $total += $m['precio'];
                                            }
                                        }
                                        //$_SESSION["productes"]=$_POST[$nom.$i];
                                    }
                                }
                            }
                        }
                            echo "<h4>Total: ".$total."€</h4>";
                            $_SESSION['total']=$total;
                            $_SESSION['nombre']=$bocatas;
                            $_SESSION['nproductos']=$nproductos;
                    //print_r($_SESSION);
                    ?>
                </div>
            </div>


            <!--Formulari Confirmació compra-->

            <div class="dades_persona">
                <form method="post" name="form" action="ticket.php">
                    <div class="form_cont">
                        <div>
                            <label for="name">Nom</label>
                            <input class="input" name="name" type="text" id="nom">
                        </div>
                        <br>
                        <div>
                            <label for="tlf">Telèfon</label>
                            <input class="input" name="tel" type="tel" id="tlf" width="10">

                        </div>
                        <br>
                        <div>
                            <label for="email">Correu </label>
                            <input class="input" name="email" type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
                        </div>
                    </div>
                    <br>
                    <div class="sub">
                        <input type="submit" value="Fer comanda" id="submit">
                    </div>
                </form>
            </div>
            <?php

            /*if( $_POST["submit"] ){
            foreach($_POST as $campo => $valor) {
            $_SESSION["registro"][$campo] = $valor;
            }
            }
            echo $_SESSION['registro']['name'];
            echo $_SESSION['registro']['tlf'];
            echo $_SESSION['registro']['email'];*/
            ?>
        </div>


    </div>

    <script>
        /* Fer focus al camp nom al carregar la pàgina web */
        window.onload = function(){
            document.getElementById("nom").focus();
        }

        /* Array amb els missatages d'error de validació  */
        const err = ["Introdueix nom", "Introdueix un telèfon", "Telèfon no numeric", "Número de telèfon incorrecte (9 dígits)", "Introdueix un email", "Email incorrecte (@inspedrables.cat)" ];

        /* Mostrar missatges d'error */
        document.getElementById("submit").addEventListener("click", function(e){
            var n, text="", error = 0;

            if(errorNom()){ text += ("<b>"+err[0]+"!</b></br>"); error = 1;}

            n = errorTel();
            if(n){ text += ("<b>"+err[n]+"!</b></br>"); error = 1; }

            n = errorEmail();
            if(n){ text += ("<b>"+err[n]+"!</b>"); error = 1;}

            if(error){
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Error!...',
                    html: text
                });
            }
        });

        /* Funcions comprovació Nom & Telefon & Email */

        function errorNom(){
            return (document.getElementById("nom").value === "") ? true : false;
        }

        function errorTel(){
            let tlf = document.getElementById("tlf").value, n;
            if(tlf == ""){ n = 1; }
            else if(!(/^[0-9]+$/.test(tlf))){ n = 2; }
            else if (tlf.length != 9){ n = 3; }
            else{ n = 0; }
            return n;
        }

        function errorEmail() {
            let correu = document.getElementById("correu").value, n;
            if(correu == ""){ n = 4; }
            else if(!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(correu))){ n = 5; }
            else{ n = 0; }
            return n;
        }
    </script>




        <?php include ("footer.php"); ?>
    </body>
</html>