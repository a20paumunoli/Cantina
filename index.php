<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="normalize.css">
        <link type="text/css" rel="stylesheet" href="css/header.css">
        <link type="text/css" rel="stylesheet" href="css/index.css">
        <title>Landing page</title>
    </head>

    
    <body>
        <?php include("header.php") ?>  

        <!-- Carousel imagenes -->
        <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">

            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url(img/foto1.png);">
                    <!--<div class="container">
                        <h1>Example</h1>
                        <p>tetxuydeygdhufuiehf fjrfhuer</p> 
                        <a href="menu.php" class="btn btn-secondary btn-lg">Menú</a>
                    </div>-->
                </div>
                <div class="carousel-item" style="background-image: url(img/foto3.png);">
                   <!-- <div class="container">
                        <h1>Example2</h1>
                        <p>tetxuydeygdhufuiehf fjrfhuer</p>
                        <a href="menu.php" class="btn btn-secondary btn-lg">Menú</a>
                    </div>-->
                </div>
                <div class="carousel-item" style="background-image: url(img/foto7.png);">
                    <!--
                    <div class="container">
                        <h1>Example3</h1>
                        <p>tetxuydeygdhufuiehf fjrfhuer</p>
                        <a href="menu.php" class="btn btn-secondary btn-lg">Menú</a>   
                    </div>-->
                </div>
                <div class="carousel-item" style="background-image: url(img/foto8.png);">
                    <!--<div class="container">
                        <h1>Example4</h1>
                        <p>tetxuydeygdhufuiehf fjrfhuer</p>
                        <a href="menu.php" class="btn btn-secondary btn-lg">Menú</a>
                    </div>-->
                </div>
            </div>

            <div class="carousel-caption">
                <p class="text">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                <a href="menu.php" class="btn btn-secondary btn-lg">Menú</a>
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
                        <a href="admin.php" class="btn btn-secondary" id="admin_btn">entrar com admin</a>
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