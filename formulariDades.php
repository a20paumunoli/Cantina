
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>Validació comanda</title>
</head>

<body>
    <h1>Validació comanda</h1>
    <?php include("header.html") ?>  

    <!--Mostrar preu total compra-->
    
    <form method="POST" action="ticket.php">

        <div id="formulari" >
            <div>
                <label for="name">Nom</label>
                <input name="name" type="text" id="name" required>
            </div>
        <br>
            <div>
                <label for="tlf">Teléfon</label>
                <input name="tlf" type="tel" id="tlf" size="9" placeholder="+34 XXX XX XX XX" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" width="10px" required>
            </div>
        <br>
            <div>
                <label for="email">Correu electrònic </label>
                <input name="email" type="email" maxlength="50" placeholder="nom@inspedralbes.cat" required/>
            </div>
        </div>

        <br>

        <div id="buttons">
            <input type="submit" value="Comprar">
            <input type="reset" value="Neteja">
        </div>

    </form>

<!--
    <script>
        function validarEmail(email) {
            if ("/^[a-zA-Z0-9._-]+@inspedralbes\.cat$/".test(email)){
            else{
            alert("La dirección de email es incorrecta!.");
            }
            }   
    
    }
    </script>
-->

    <?php include ("footer.html"); ?>
</body>
</html>