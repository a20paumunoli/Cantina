<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/header.css">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/footer.css">
    <title>Consultar Comandes</title>
    <style>
        .box {
            border: 1px black solid;
            padding: 10px 10px 10px 10px;
            width: 500px;
        }
        .wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(600px, 1fr));
            grid-column-gap: 6px;
            grid-row-gap:6px;
            margin-left: 85px;
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
    </div>
        <div class="wrapper">
            <?php
                $carp = opendir("./comandes");
                while(false !== ($arch = readdir($carp))) {

                    if (str_contains($arch, date("d" . "-" . "m" . "-" . "Y"))) {
                        $data = file_get_contents("./comandes/" . $arch);
                        $fitx = json_decode($data, true);
                        echo '<div class="box">';
                        print_r($fitx);
                        echo '</div>';
                    }
                }
                closedir($carp);
            ?>
        </div>


    <?php include("../client/footer.php")?>
</body>
</html>