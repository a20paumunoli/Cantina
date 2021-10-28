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
            width: auto;

        }
        .wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-column-gap: 6px;
            grid-row-gap:6px;
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
            $carp = opendir("./comandes");
            while(false !== ($arch = readdir($carp))){
                if(str_contains($arch, date("d"."-"."m"."-"."Y"))){
                    $data = file_get_contents("./comandes/".$arch);
                    $fitx = json_decode($data, true);
                    print_r($fitx);


                    echo "<div class='box'>";
                    echo "<ol>";
                        echo "<li>Nombre: ".$fitx["Nombre"]."</li>";
                        echo "<li>Telefon: ".$fitx["Telefon"]."</li>";
                        echo "<li>Correu".$fitx["Correu"]."</li>";
                    echo "</ol>";
                    echo "</div>";
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