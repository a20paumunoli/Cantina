<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #mati{
            background-color: lightcoral;
        }

        #tarda{
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <form method="POST">
    <div id="mati">
        <ul>
            <il>Bocata 12 <input type="checkbox" name="chorizo" value="bocata1"></il>
            <il>Bocata 2 <input type="checkbox" name="jamón" value="bocata2"></il>
            <il>Bocata 3 <input type="checkbox" name="nocilla" value="bocata3"></il>
            <il>Bocata 4 <input type="checkbox" name="queso" value="bocata4"></il>
        </ul>
    </div>
    <div id="tarda">
        <ul>
            <il>Tortilla <input type="checkbox" value="tortilla"></il>
            <il>Bocadillo 5 <input type="checkbox" value="bocadillo5"></il>
        </ul>
    </div>

    <input id="boton "type="reset" value="Borrar">
    <input id="Boton" type="Submit" value="Enviar">
    </form>

    <?php
    $bocata = array(
        const chorizo => array("Bocata chorizo", 3, "/img/chorizo.jpg", "chor");
        const jamon => array("Bocata jamón", 2,50, "/img/jamon.jpg", "jam");
        const nocilla => array("Bocata nocilla", 3, "/img/nocilla.jpg", "noc");
        const queso => array("Bocata queso", 2,60, "/img/queso.jpg", "ques")
    );
    
    
    echo $bocata[chorizo][1];
    ?>



    <include src="./footer.html"></include>
</body>
</html>








