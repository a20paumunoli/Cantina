
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Validació comanda</title>

    <style>

        .formulari{
            margin-left: 20px;
            margin-top:50px;
        }

    </style>

</head>

<body>
    <?php include("header.php") ?>  

    <!--
        
      **** Mostrar dades compra ****

    -->

    <h1>Validació comanda</h1>


    <!--Formulari Confirmació compra-->

    <form method="post" name="form" action="ticket.php">

        <div class="formulari" >
            <div>
                <label for="name">Nom</label>
                <input name="name" type="text" id="nom">
            </div>
        <br>
            <div>
                <label for="tlf">Telèfon</label>
                <input name="tlf" type="tel" id="tlf" placeholder="+34 XXXXXXXXX" width="10px">
                
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

        /* Array amb els missatages de error de validació  */
        const err = ["Introdueix nom", "Introdueix un telèfon", "Telèfon no numeric!", "Número de telèfon incorrecte (9 dígits)!", "Introdueix un email", "Email incorrecte (@inspedrables.cat)!" ];


        window.onload = function(){
            document.getElementById("nom").focus();
        }

        /* Mostrar missatges error */
        document.getElementById("submit").addEventListener("click", function(e){
            var n;

            if(comprovarNom()){
                alert(err[0]);
                e.preventDefault();
            }

            n = comprovarTel();
            if(n){
                e.preventDefault();
                alert(err[n]);
            }
            
            n = comprovarEmail()
            if(comprovarEmail()){
                e.preventDefault();
                alert(err[n]);
            }
        });


        /* Funcions comprovació */

        function comprovarNom() {
            return (document.getElementById("nom").value === "") ? true : false;
        }

        function comprovarTel(){
            let tlf = document.getElementById("tlf").value, n;
            if(tlf == ""){ n = 1; }
            else if(!(/^[0-9]+$/.test(tlf))){ n = 2; }
            else if (tlf.length != 9){ n = 3; }
            else{ n = 0; }
            return n;
        }

        function comprovarEmail() {
            let correu = document.getElementById("correu").value, n;
            if(correu == ""){ n = 4; }
            else if(!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(correu))){ n = 5; }
            else{ n = 0; }
            return n;
        } 

    </script>




    <?php include ("footer.php"); ?>
</body>
</html>