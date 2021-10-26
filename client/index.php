<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/footer.css">
        <link type="text/css" rel="stylesheet" href="css/index.css">
        <title>Landing page</title>
    </head>

    
    <body>
        <?php include("header.php") ?>  

        <div class="carousel">
        
            <div class="slider">
                <ul>
                    <li>
                        <img class="foto" src="img/foto1.png">
                    </li>
                    <li>
                        <img class="foto" src="img/foto3.PNG">
                    </li>
                    <li>
                        <img class="foto" src="img/foto5.png">
                    </li>
                    <li>
                        <img class="foto" src="img/foto7.png">
                    </li>
                </ul>
            </div>

            <div class="button">
                <a href="menu.php" class="boton">Menú</button>
            </div>
        </div>
        
        <!-- Novetats i admin -->
        <div class="more">
            <div class="novetats">
                Novetats
            </div>

            <div class="admin">
                <img scr="img/admiin.png" width="50" height="50">
                <h5>Ets administrador?</h5>

                <div class="admin2">
                    <a href="../administrador/admin.php" class="btn btn-secondary" id="admin_btn">entrar com admin</a>
                </div>

            </div>
        </div>

        <?php include ("footer.php"); ?>
        <script>
            if (document.cookie.split(';').some((item) => item.trim().startsWith('comanda='))) {
                Swal.fire({
                    position: 'center-center',
                    icon: 'warning',
                    title: 'Avui ja has fet una comanda...',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        </script>
    </body>
</html>

