<!-- AQUI CALCULEM EL TEMPS QUE QUEDA FINS ARRIBAR A LES 00:00 PER FER QUE LA COOKIE FINALITZI A AQUESTA HORA */ -->
<?php
    $segundosActuales = (date('G')*3600 + date('i')*60 + date('s'));
    $segundos24h = 86400;
    $restaTiempo = $segundos24h-$segundosActuales+7200;
    
    /*  Crear Cookie  */
    setcookie('comanda', "comanda_hecha_".uniqid(), time()+$restaTiempo);

    /* Aqui obrim la sessió i inicialitzem la variable $json amb un array que contè les dades 
    del client perque s'utilitzarà per guardar enviar totes les dades de la comanda a un fitxer .json */
    session_start();
    $json = array("Nombre" => "'".$_POST["name"]."'",
                   "Telefon" => "'".$_POST["tel"]."'",
                   "Correu" => "'".$_POST["email"]."'");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/footer.css">
        <link type="text/css" rel="stylesheet" href="css/ticket.css">
        <title>Ticket</title>
    </head>
    <body>
        <?php include("header.php")?>

        <div class="separate">
            <div>
                <h1>Ticket</h1>
            </div>

            <!-- Mostrar les dades del client i de la comanda en una taula --> 
            <?php if($_POST){ ?>
            <div class="tabla">
                <table class="table">
                    <tbody>
                        <!-- Mostrar les dades del client que arriben per la variable POST -->
                        <tr>
                            <th>Nom: </th>
                            <td><?php echo $_POST['name'];?></td>   
                        </tr>
                        <tr>
                            <th>Telèfon: </th>
                            <td><?php echo $_POST['tel'];?></td>
                        </tr>
                        <tr>
                            <th>Correu: </th>
                            <td colspan="2"><?php echo $_POST['email'];}?></td>
                        </tr>

                        <!-- Mostrar les dades de la comanda que arriben per la variable SESSION -->
                        <tr>
                            <th>Comanda: </th>
                            <td>
                                <?php
                                    // Mostrar les dades de la comanda que arriben per la variable SESSION
                                    if($_SESSION){
                                        for($i=0; $i<count($_SESSION['nombre']); $i++){
                                            echo $_SESSION['nombre'][$i]."  x".$_SESSION['nproductos'][$i]."<br>";
                                            // Afegir dades a la variable json
                                            $json = array_merge($json, array('producte'.$i => $_SESSION['nombre'][$i]." x".$_SESSION['nproductos'][$i]));
                                        } 
                                        $json = array_merge($json, array('total' => $_SESSION['total']));
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <!-- Mostrar el preu total -->
                            <th>Preu Total: </th>
                            <td><?php if($_SESSION){ echo $_SESSION['total']."€"; }?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php
            /* TANQUEM LA SESSIÓ QUAN S'ACABI D'IMPRIMIR EL TICKET PER PANTALLA */
            session_destroy();
            $n = 1;

            /* A CONTINUACIÓ GUARDEM LES DADES DE TOTA LA COMANDA (QUE ES TROBEN A LA VARIABLE $JSON) 
            EN UN FITXER QUE ES CREARA AL DIRECTORI /administrador/comandes */
            do{
                $nF = "../administrador/comandes/".date("d"."-"."m"."-"."Y")."-n".$n.".json";
                if(file_exists($nF)){ $n++; }
            }while(file_exists($nF));

            file_put_contents($nF, json_encode($json));
        ?>

        <div class="div_foot">
            <?php include("./footer.php"); ?>
        </div>

    </body>
</html>