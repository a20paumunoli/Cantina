
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>Formulari dades</title>
</head>
<body>
    <?php include("header.html") ?>  
    <h1>Formulari</h1>

    <form method="POST" action="ticket.php">
        <div>
            <div>
                <p>Email</p>
            </div>
            <div>
            </br>
                <input type="text" name="email" maxlength="30" required/>
            </div>
        </div>
        <hr/>
        <input id="Boton" type="Submit" value="Enviar">
    </form>

    <?php
        if(!$_POST){

        } else {
            echo $_POST['o'];
        }
    ?>
    <include src="./footer.html"></include>
</body>
</html> 