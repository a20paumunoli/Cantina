
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        <link rel="stylesheet" href="normalize.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <link type="text/css" rel="stylesheet" href="header.css">
        <title>Landing page</title>

        <style>

            .carousel-item{
                top: 0px;
                height: 512px;
                background-color: black;
                color: white;
                position: relative;
                background-position: center;
                background-size: cover;
            }
            
            .container{
                position: absolute;
                bottom: 0px;
                left: 0px;
                padding-bottom: 50px;
                background-color: black;

            }
            
            .carousel-caption {
                background-color: rgba(166, 61, 43, 0.39);
            }

            .text{
                padding-bottom: 15px;
            }

            .btn-secondary, .btn-secondary:active, .btn-secondary:hover, .btn-secondary:visited, .btn-secondary:visited, .btn-secondary:focus{
                background-color: #A63D2B !important;
                border-color: #A63D2B !important;
            }

            .more{
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content:space-evenly; 
                margin: 35px;
            }

            .novetats{
                background-color: #E2E3E5;
                width: 550px;
                height: 300px;
                text-align: center;
            }
            
            
            .admin{
                display: flex;
                flex-direction: column;
                background-color: #E2E3E5;
                width: 360px;
                height: 150px;
            }

            .admin2{
                display: flex;
                align-self: center;
                width: max-content;
            }

            #admin_btn{
                margin:7px;
            }


        </style> 
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
    </body>
</html>