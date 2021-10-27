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

        <div class="carousel">
            <div class="slider">
                <ul>
                    <li>
                        <img class="foto" src="./client/img/foto1.png">
                    </li>
                    <li>
                        <img class="foto" src="./client/img/foto3.PNG">
                    </li>
                    <li>
                        <img class="foto" src="./client/img/foto5.png">
                    </li>
                    <li>
                        <img class="foto" src="./client/img/foto7.png">
                    </li>
                </ul>
            </div> 
        </div>
        
        <!-- Novetats i admin -->
        <div class="more">
            <div class="menu">
                <div class="button">
                    <a href="./client/menu.php" class="btn">VEURE MENÚ</a>
                </div>
            </div>

            <div class="admin">
                <div class="admin-button">
                    <img class="imgg" src="./client/img/admin.png" width="50px">
                    <h4>Ets administrador?</h4>
                </div>

                <div class="admin2">
                    <a href="./administrador/admin.php" id="admin_btn">entrar com admin</a>
                </div>
            </div>

        </div>

        <?php include ("client/footer.php")?>
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

