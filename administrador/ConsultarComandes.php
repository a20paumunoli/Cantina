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
        .table{
            padding: 5px 15px 5px 5px;
            border: 1px black solid;
            background: white;
            border-radius: 8px;
        }
        th{
            padding: 5px;
            text-align: end;
            width: 30%;
        }

        td{
            text-align: left;
            width: 70%;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("../client/header.php")?>  

    <div>
        <h1>Consultar Comandes</h1>
        <hr>
            <div class="wrapper">
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