<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link type="text/css" rel="stylesheet" href="client/css/normalize.css">
        <link type="text/css" rel="stylesheet" href="client/css/header.css">
        <link type="text/css" rel="stylesheet" href="client/css/footer.css">
        <link type="text/css" rel="stylesheet" href="client/css/index.css">
        <title>Landing page</title>
    </head>

    <body>
        <?php include("client/header.php") ?>

        <!-- Mostrar un carrousel de fotos -->
        <div class="carousel">
            <div class="slider">
                <ul>
                    <li><img class="foto" src="./client/img/foto1.png"></li>
                    <li><img class="foto" src="./client/img/foto2.PNG"></li>
                    <li><img class="foto" src="./client/img/foto3.jpg"></li>
                    <li><img class="foto" src="./client/img/foto4.png"></li>
                </ul>
            </div>
        </div>

        <!-- Mostrar dos <div> amb un botó cadascún per tal d'accedir al menú i a l'apartat d'administració -->
        <div class="more">
            <div class="menu">
                <a href="./client/menu.php" class="btn boton">VEURE MENÚ</a>
            </div>

            <div class="admin">
                <div>
                    <img class="imgg" src="./client/img/admin.png">
                </div>
                <div class="ad">
                    <h3>Ets administrador de la cantina de l'Institut Pedralbes?</h3></br>
                    <a href="./administrador/admin.php" class="admin_btn boton">Entrar com admin</a>
                </div>
            </div>
        </div>
        <div>
            <?php include("client/footer.php"); ?>
        </div>
        <script type="text/javascript" src="client/js/index.js"> </script>
    </body>
</html>