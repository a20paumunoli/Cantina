<?php
date_default_timezone_set("Europe/Madrid");

$fecha = new DateTime();
//echo $fecha->format("l Y-m-d H:i:s" ), "\n";
$siguientefecha = $fecha->modify('+1 day');
$d = $siguientefecha->format("l");
$segact = strtotime("now");
echo strtotime("now"), "\n";
$segdia = strtotime("next $d");
echo strtotime("next $d"), "\n";
$resta = $segdia - $segact;
echo $resta;
//$fechaFinal = $fechatotal - $fecha;
//echo $fechaFinal->format("Y-m-d H:i:s");
setcookie('comanda',1,time()+ $resta);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>Ticket</title>
    <style>
            .separate{
                margin-left: 15px;
            }
        </style> 
</head>
<body>
    <?php include("header.php") ?>  
    <div class="separate"> 
        <h1>Ticket</h1>
    
    <?php
        if(!$_POST){

        } else {
            echo $_POST['email'];
        }
    ?>
    </div>




    <?php include ("footer.php"); ?>
</body>
</html>