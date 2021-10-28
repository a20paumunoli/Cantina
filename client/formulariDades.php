
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
            // start a session
            session_start();
            include("header.php") 
        ?>
    
        <div class="grid_div">
        
            <div class="head">
                <h1>Validació comanda</h1>
            </div>
        
            <div class="dades_comanda">
            
            <div class="tit">
                
                    <!-- Dades comanda -->

                    <h2>Dades comanda</h2>
                    <?php

                        if(date("H") < 11){ $h = 0; }
                        else if( date("H") == 11 && date("i") <= "30"){ $h = 0; }
                        else{ $h = 1; }
                        if($h){
                            $nom = "prodtarda-" ;
                            $fit = "../administrador/json/ctarda.json";
                        }else{
                            $nom = "prodmati-" ;
                            $fit = "../administrador/json/cmati.json";
                        }

                        $total=0;

                        if($_POST){
                            $prodTot = 12;
                            $data = file_get_contents($fit);
                            $menu = json_decode($data, true);
                            $bocatas = array();
                            $nproductos = array();

                            for($i=1; $i<=$prodTot; $i++){
                                if($_POST[$nom.$i] > 0){
                                    foreach($menu as $m){
                                        if($m['id'] == $i){
                                            echo ("<p>".$m['nombre']." x".$_POST[$nom.$i]."</p>");
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
                    ?>

                    <input type="button" id="back" class="boton btn_back" value="Back">
                </div>
            </div>


            <!--Formulari Confirmació compra-->

            <div class="dades_persona">
                <form class="from1" method="post" name="form" action="ticket.php">
                    <div class="form_cont">
                        <div class="form_item">
                            <label for="name">Nom</label>
                            <input class="input" name="name" type="text" id="nom">
                        </div>
                        <br>
                        <div class="form_item">
                            <label for="tlf">Telèfon</label>
                            <input class="input" name="tel" type="tel" id="tlf" width="10">
                        </div>
                        <br>
                        <div class="form_item">
                            <label for="email">Correu </label>
                            <input class="input" name="email" type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
                        </div>
                    </div>
                    <br>
                    <div class="sub">
                        <input type="submit" value="Fer comanda" class="boton btn_submit" id="submit">
                    </div>
                </form>
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
                e.preventDefault(); //prevee/bloqueja la funció predeterminada del form, submit
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR...',
                    html: text
                });
            }
        });

        /* Funcions comprovació Nom, Telefon & Email */
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


        /* Funció per a tornar a la pàgina anterior (menú.php) */
        document.getElementById("back").addEventListener("click",function (e){
            window.history.back();
        });

    </script>

    


    <div class="div_foot">
        <?php include("footer.php"); ?>
    </div>
    
    </body>
</html>