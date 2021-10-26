<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Error</title>
    <style>

        .pantalla{
            width: auto;
            height: 81vh;
            display: flex;
            align-items: center;
        }

        .err{
            margin-left: auto;
            display: flex;
            justify-content: center;
            margin-right: auto; 
            flex-direction: column;          
        }

        .err_h1{
            color: #800000;
        }


    </style>
</head>

<body>
    <?php include("header.php") ?>
    <div class=pantalla>
        <div class="err">
            <img src="img/error_pizza.png">
            <h1 class="err_h1">Error, ja has fet la comanda d'avui!</h1>
        </div>
    </div>

    <?php include ("footer.php"); ?>
</body>
</html>