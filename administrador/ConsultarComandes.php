<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./css/comandes.css">
    <title>Consultar Comandes</title>
</head>
<body>
    <?php include("../client/header.php")?>  

    <div>
        <h1>Consultar Comandes</h1>
        <hr>
            <div class="wrapper">
                <!-- IMPRIMIM PER PANTALLA LES COMANDES QUE ESTAN GUARDADES AL JSON COMANDES -->
        <?php
            $p = 1;
            $carp = opendir("./comandes");
            while(false !== ($arch = readdir($carp))){
                if(strstr($arch, date("d"."-"."m"."-"."Y"))){
                    $data = file_get_contents("./comandes/".$arch);
                    $fitx = json_decode($data, true);
                    //print_r($fitx);

                    echo "<div class='box'>";
                        echo "<div>";
                            echo '<table class="table">';
                                echo '<tbody>';
                                    echo '<tr>';
                                        echo "<h3>Comanda nº$p</h3>";
                                    echo '</tr>';
                                    echo '<tr>';
                                        echo "<th>Nombre:</th> <td>".$fitx["Nombre"]."</td>";
                                    echo '</tr>';
                                    echo '<tr>';
                                        echo "<th>Telefon:</th> <td>".$fitx["Telefon"]."</td>";
                                    echo '</tr>';
                                    echo '<tr>';
                                        echo "<th>Correu:</th> <td>".$fitx["Correu"]."</td>";
                                    echo '</tr>';
                                    echo '<tr>';

                                        $nprod = (count($fitx)-4);
                                        //echo $nprod;
                                        echo "<th>Comanda: </th><tr></tr>";
                                        for($i=0; $i<$nprod; $i++){
                                            echo "<th></th><td><li>".$fitx['producte'.$i]."</li></td>";
                                    echo '</tr>';
                                        };
                                    echo '<tr>';
                                        echo  "<th >Total:</th> <td>".$fitx["total"]." €</td>";
                                    echo '</tr>';
                                echo '</tbody>';
                            echo '</table>';
                        echo "</div>";
                    echo "</div>";
                    $p ++;
                }
            }

                    closedir($carp);
                ?>
            </div>
    </div>

    <div class="div_foot">
        <?php include("../client/footer.php"); ?>
    </div>

</body>
</html>