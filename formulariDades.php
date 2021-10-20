
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>Validació comanda</title>

    <style>

        .formulari{
            margin-left: 20px;
            margin-top:50px;
        }

    </style>



</head>

<body>
    <h1>Validació comanda</h1>
    <?php include("header.php") ?>  

    <!--Mostrar preu total compra-->
    
    <form method="post" name="form" action="ticket.php">

        <div class="formulari" >
            <div>
                <label for="name">Nom</label>
                <input name="name" type="text" id="nom" value="">
            </div>
        <br>
            <div>
                <label for="tlf">Teléfon</label>
                <input name="tlf" type="tel" id="tlf" size="9" placeholder="+34 XXXXXXXXX" width="10px" >
            </div>
        <br>
            <div>
                <label for="email">Correu electrònic </label>
                <input name="email" type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
            </div>

        <br>
            <div class="buttons">
                <input type="submit" value="Comprar" id="submit">
                <input type="reset" value="Neteja">
            </div>
        </div>

    </form>


    <script>

        var nom = document.getElementById("nom");
        var submit = document.getElementById("submit");

        window.onload = function(){
		    nom.focus();
	    }

        submit.addEventListener("click", function(e){
            var n = 0; 
            if(comprovarNom(nom) == 1){
                e.preventDefault();
                alert("Introdueix nom");
            }
            if(comprovarTel()){
                e.preventDefault();
                alert("Introdueix nom");
            }
            if(comprovarEmail()){
                e.preventDefault();
                alert("Introdueix nom");
            }


            function comprovarNom(nom) {
                if (nom.value == "a"){
                    n = 1;
                }
                return n;
            }
            
            
            function comprovarEmail() {
                if ("/^[a-zA-Z0-9._-]+@inspedralbes\.cat$/".test(email)){
                else{
                    alert("La dirección de email es incorrecta!.");
                }
            } 
        }

           
        });


    </script>




        

    <?php include ("footer.php"); ?>
</body>
</html>