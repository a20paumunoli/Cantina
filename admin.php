<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link type="text/css" rel="stylesheet" href="css/header.css">
    <title>Admin</title>
    <style>

        .pantalla{
            width: auto;
            height: 81vh;
            display: flex;
            text-align: center;
            justify-content:center
        }
        .novetats{
            background-color: #E2E3E5;
            width: 750px;
            height: 700px;
            text-align: center;
            border: 1px black solid;

        }
    </style>

</head>
    <body>
    <?php include("header.php") ?>

    <div class=pantalla>
        <div class="novetats" id="area1">
            <h2>Consultar Comandes</h2>
        </div>
        <div class="novetats" id="area2">
            <h2>Modificar Menú</h2>
        </div>
    </div>


    <?php include ("footer.php"); ?>
</body>
<script>
    document.getElementById("area1").addEventListener("click",function(e){

        document.getElementById("x").innerHTML= "X: "+ e.x;
        document.getElementById("y").innerHTML= "Y: "+ e.y;
    })
</script>
</html>