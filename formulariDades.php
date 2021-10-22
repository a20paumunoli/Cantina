
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Validació comanda</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        .grid_div{
            display: grid;
            grid-template-areas: "head head"
                                "ticket dades";
            grid-template-columns: 2fr 1fr;
            grid-template-rows: auto auto;
            grid-column-gap: 60px;  
            padding: 20px;      
            margin: 50px;
            background-color: grey;
        }

        .dades_comanda{
            grid-area: ticket;
            background-color: lightcoral;
            
        }

        .dades_persona{
            align-items: center;
            /*float: center;*/
            justify-items: left;
            background-color: lightblue;
        }

        .head{
            grid-area: head;
            justify-self: center;
        }

        .form_cont{
           
            
            margin-left: 140px;
            margin-right: 140px;
            padding: 15px;
        }

        .input{
            float: right;
        }

        .sub{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 25px;
        }





    </style>
    
</head>

<body>
<?php include("header.php") ?>





    <div class="grid_div">
        <div class="head">
            <h1>Validació comanda</h1>
        </div>

        <div class="dades_comanda">
            <div class="tit">
                <h2>Dades comanda</h2>
            </div>  
        </div>


        <!--Formulari Confirmació compra-->

        <div class="dades_persona">
            <form method="post" name="form" action="ticket.php">
                <div class="form_cont">
                    <div>
                        <label for="name">Nom</label>
                        <input class="input" name="name" type="text" id="nom">
                    </div>
                    <br>
                    <div>
                        <label for="tlf">Telèfon</label>
                        <input class="input" name="tlf" type="tel" id="tlf" width="10">

                    </div>
                    <br>
                    <div>
                        <label for="email">Correu </label>
                        <input class="input" name="email" type="email" id="correu" maxlength="50" placeholder="nom@inspedralbes.cat" />
                    </div>
                </div>
                <br>
                <div class="sub">
                    <input type="submit" value="Fer comanda" id="submit">
                </div>
            </form>
        </div>
    </div>


</div>

<script>

    /* Array amb els missatages d'error de validació  */
    const err = ["Introdueix nom", "Introdueix un telèfon", "Telèfon no numeric", "Número de telèfon incorrecte (9 dígits)", "Introdueix un email", "Email incorrecte (@inspedrables.cat)" ];

    /* Fer focus al camp nom al carregar la pàgina web */
    window.onload = function(){
        document.getElementById("nom").focus();
    }

    /* Mostrar missatges d'error */
    document.getElementById("submit").addEventListener("click", function(e){
        var n, text="", error = 0;

        if(errorNom()){ text += ("<b>"+err[0]+"!</b></br>"); error = 1;}

        n = errorTel();
        if(n){ text += ("<b>"+err[n]+"!</b></br>"); error = 1; }

        n = errorEmail();
        if(n){ text += ("<b>"+err[n]+"!</b>"); error = 1;}

        if(error){
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error!...',
                html: text
            });
        }
    });


    /* Funcions comprovació */

    function errorNom(){
        return (document.getElementById("nom").value === "") ? true : false;
    }

    function errorTel(){
        let tlf = document.getElementById("tlf").value, n;
        if(tlf == ""){ n = 1; }
        else if(!(/^[0-9]+$/.test(tlf))){ n = 2; }
        else if (tlf.length != 9){ n = 3; }
        else{ n = 0; }
        return n;
    }

    function errorEmail() {
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