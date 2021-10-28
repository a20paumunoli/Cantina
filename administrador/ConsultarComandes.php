<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <title>Consultar Comandes</title>
    <style>
        .box {
            border: 1px black solid;
            padding: 20px 20px 20px 20px;
            width: 325px;

        }
        .wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(325px, 1fr));
            grid-column-gap: 6px;
            grid-row-gap:6px;
            margin-left: 25px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("../client/header.php")?>  

    <div>
        <h1>Consultar Comandes</h1>
            <div class="wrapper">
        <?php
        $p = 1;
            $carp = opendir("./comandes");
            while(false !== ($arch = readdir($carp))){
                if(str_contains($arch, date("d"."-"."m"."-"."Y"))){
                    $data = file_get_contents("./comandes/".$arch);
                    $fitx = json_decode($data, true);
                    //print_r($fitx);



                    echo "<div class='box'>";
                    echo "<div>";

                        echo "<div><h3>Comanda nº$p</h3></div>";
                        echo "<div><b>Nombre:</b> ".$fitx["Nombre"]."</div>";
                        echo "<div><b>Telefon:</b> ".$fitx["Telefon"]."</div>";
                        echo "<div><b>Correu:</b> ".$fitx["Correu"]."</div>";

                        $nprod = (count($fitx)-4);
                        //echo $nprod;
                        echo "<div><b>Comanda: </b></div>";
                        for($i=0; $i<$nprod; $i++){
                        echo "<div>".$fitx['producte'.$i]."</div>";
                        };
                        echo  "<div><b>Preu total:</b> ".$fitx["total"]." €</div>";
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