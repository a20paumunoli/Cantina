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

        <!-- Carousel imagenes -->
        
        <div class="carousel">
            <div class="slides">
                <!-- botones -->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <!-- img -->
                <div class="slide first">
                    <img src="foto1">
                </div>
                

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