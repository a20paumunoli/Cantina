<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/header.css">
    <link type="text/css" rel="stylesheet" href="/Cantina/client/css/footer.css">
    <title>Admin</title>
    <style>
        .pantalla{
            width: auto;
            height: 81vh;
            display: flex;
            text-align: center;
            justify-content:center;
        }
        .novetats1{
            color: white;
            background-color: #E2E3E5;
            width: 500px;
            height: auto;
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
            height: auto;
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
    <?php include ("../client/header.php")?>

    <div class=pantalla>
        <div id="area1" class="novetats1">
            <h2>Consultar Comandes</h2>
        </div>
        <div id="area2" class="novetats2">
            <h2>Modificar Menú</h2>
        </div>
    </div>


    <?php include ("../client/footer.php")?>
</body>
<script>
    document.getElementById("area1").addEventListener("click", function(){
        window.location.href = "ConsultarComandes.php";
    });
    document.getElementById("area2").addEventListener("click", function(){
        window.location.href = "ModificarMenu.php";
    });
</script>
</html>