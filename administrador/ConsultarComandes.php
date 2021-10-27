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
</head>
<body>
    <?php include("../client/header.php")?>  

    <div>
        <h1>Consultar Comandes</h1>

        <?php
            $carp = opendir("./comandes");
            while(false !== ($arch = readdir($carp))){
                if(str_contains($arch, date("d"."-"."m"."-"."Y"))){
                    $data = file_get_contents("./comandes/".$arch);
                    $fitx = json_decode($data, true);
                    print_r($fitx);
                }
            }

            closedir($carp);
             
        ?>

    </div>

    <?php include("../client/footer.php")?>
</body>
</html>