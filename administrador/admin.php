<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <title>Admin</title>
    <style>

        .pantalla{
            width: auto;
            height: 81vh;
            display: flex;
            text-align: center;
            justify-content:center
        }
        .novetats1{
            color: white;
            background-color: #E2E3E5;
            width: 500px;
            height: 750px;
            text-align: center;
            border: 1px black solid;
            background-image: url("img/pizarra.jpg");
            -webkit-background-size: contain;
            margin: 15px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .novetats2{
            color: white;
            background-color: #E2E3E5;
            width: 500px;
            height: 750px;
            text-align: center;
            border: 1px black solid;
            background-image: url("img/menu.jpg");
            -webkit-background-size: contain;
            margin: 15px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        h2{
            background-color: black;
        }
    </style>

</head>
    <body>
    <?php include("../client/header.php") ?>

    <div class=pantalla>
        <div class="novetats1">
            <a href="ConsultarComandes.php"></a>
            <h2>Consultar Comandes</h2>
        </div>
        <div class="novetats2">
            <h2>Modificar Menú</h2>
        </div>
    </div>


    <?php include ("../client/footer.php"); ?>
</body>

</html>