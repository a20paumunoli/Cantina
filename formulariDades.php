
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

    <!--Mostrar preu total compra-->
    <h1>Validació comanda</h1>
    <form method="post" name="form" action="ticket.php">

        <div class="formulari" >
            <div>
                <label for="name">Nom</label>
                <input name="name" type="text" id="nom">
            </div>
        <br>
            <div>
                <label for="tlf">Teléfon</label>
                <input name="tlf" type="tel" id="tlf" size="9" placeholder="+34 XXXXXXXXX" width="10px">
                
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

        let nom = document.getElementById("nom");
        let tlf = document.getElementById("tlf");
        
        let submit = document.getElementById("submit");

        const err = [];
            err[0]="Introdueix nom";
            err[1]="Introdueix un teléfon";
            err[2]="Teléfon no numeric!";
            err[3]="Número de teléfon incorrecte (9 dígits)!";
            err[4]="Introdueix un email!";


        window.onload = function(){
            nom.focus();
        }

        submit.addEventListener("click", function(e){
            let n = 0;

            if(comprovarNom()){
                e.preventDefault();
                alert(err[0]);
            }

            if(comprovarTel()){ 
                e.preventDefault();
            }

            let vect = comprovarEmail();
            if(vect !== 0){
                if(vect[1] = 1)
                alert("Introdueix email");
            }   
        });

        function comprovarNom() {
            if(nom.value === ""){
        }

        function comprovarTel() {
            if(tlf.value === ""){
               alert("Introdueix un teléfon");
           }else if(!(/^[0-9]+$/.test(tlf.value))){
                alert("Teléfon no numeric!");
           }else if (tlf.value.length != 9){
                alert("Teléfon faltes o sobre nums!");
            }
        }

        
        /* comprovarEmail devuelve cierto si todo es ok, si no devuelve falso */
        function comprovarEmail() {
            let correu = document.getElementById("correu").value;
            let expresion = /^([a-zA-Z0-9._-]+)@inspedralbes.cat$/;
            let valid = 1;

            if(correu===""){

            }

            return expresion.exec(correu) ? 1 : 0;
        } 


    </script>




    <?php include ("footer.php"); ?>
</body>
</html>