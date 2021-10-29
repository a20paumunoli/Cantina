<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./css/admin.css">
    <title>Admin</title>
</head>
    <body>
    <?php include ("../client/header.php")?>
    <div>
        <input type="button" id="back" class="boton btn_back" value="Back">
    </div>
    <div class="pantalla">
        <div id="area1" class="novetats1">
            <h2>Consultar Comandes</h2>
        </div>
        <div id="area2" class="novetats2">
            <h2>Modificar preus dels Menús</h2>
        </div>
    </div>

    <div class="div_foot">
        <?php include("../client/footer.php"); ?>
    </div>
</body>

<script>
    document.getElementById("area1").addEventListener("click", function(){
        window.location.href = "./ConsultarComandes.php";
    });
    document.getElementById("area2").addEventListener("click", function(){
        window.location.href = "./ModificarMenu.php";
    });

    document.getElementById("back").addEventListener("click", function(e){
        window.history.back();
    });
</script>
</html>