<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="../client/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="../client/css/header.css">
    <link type="text/css" rel="stylesheet" href="../client/css/footer.css">
    <title>Modificar Menu</title>
    <style>
        .cont{
            display:grid;
            grid-template-columns: 130px 130px 130px 130px;
            grid-template-areas: "tit tit tit tit"
                                "header1 header1 header2 header2"
                                "b1 b1 b2 b2"
                                "b3 b4 b5 b6"
                                "b7 b8 b9 b10"
                                "b11 b12 b13 b14"
                                "footer footer footer footer";
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin:50px;
        }

        .int-cont{
            justify-self: center;
        }

        .tit{ grid-area: tit; text-align: center; }
        .header1{ grid-area: header1; }
        .header2{ grid-area: header2; }
        .c1{ grid-area: b3; }
        .c2{ grid-area: b4; }
        .c3{ grid-area: b5; }
        .c4{ grid-area: b6; }
        .c5{ grid-area: b7; }
        .c6{ grid-area: b8; }
        .c7{ grid-area: b9; }
        .c8{ grid-area: b10; }
        .c9{ grid-area: b11; }
        .c10{ grid-area: b12; }
        .c11{ grid-area: b13; }
        .c12{ grid-area: b14; }
        
        .footer{ 
            grid-area: footer; 
            margin-top: 10px;
        }

        .btn{
            background-color: #A63D2B;
            transition-duration: 0.3s;
            transition-property: transform;
            border: 1px solid #A63D2B
        }

        .btn:hover, .btn:active, .btn:focus{
            transform: scale(1.05);
        }

        .btn2{
            background-color: #040e33;
            transition-duration: 0.3s;
            transition-property: transform;
            border: 1px solid #040e33;
        }

        .btn2:hover, .btn2:active, .btn2:focus{
            transform: scale(1.05);
        }

        input{
            padding: 5px;
        }

        .g-cont{
            display: grid;
            grid-template-areas: "g1 g2"
                                 "g3 g4"
                                 "g5 g6"
                                 "g7 g7";
            gap: 10px 10px;
            margin-top: 20px;
            justify-items: center;
            align-items: center;
        }


        .g1{ grid-area: g1; 
            justify-self: end;
        }

        .g2{ grid-area: g2; }

        .g3{ 
            grid-area: g3;
            justify-self: end;
        }

        .g4{ grid-area: g4; }
        .g5{ grid-area: g5; }
        .g6{ grid-area: g6; }
        .g7{ grid-area: g7; }

        .btn_back{
            background-color: #A63D2B;
            transition-duration: 0.3s;
            transition-property: transform;
            border: 1px solid #A63D2B;
            margin: 10px 0px 0px 10px;
        }

        .btn_back:hover, .btn_back:active, .btn_back:focus{
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php include("../client/header.php")?>
    <div>
        <input type="button" id="back" class="boton btn_back" value="Back">
    </div>
    <div class="cont">
        <div class="tit int-cont">
            <h1>Modificar preu dels productes dels menús</h1>
        </div>

        <div class='header1 int-cont'>
            <form action='ModificarMenu.php' method='POST'>
                <input type='hidden' name='mati' value='./json/cmati.json'>
                <input type='submit' class='boton btn2' value ='Menu mati'>
            </form>
        </div>

        <div class='header2 int-cont'>
            <form action='ModificarMenu.php' method='POST'>
                <input type='hidden' name='tarda' value='./json/ctarda.json'>
                <input type='submit' class='boton btn2' value ='Menu tarda'>
            </form>
        </div>

        <?php
            $n = 1;           
            if($_POST){
                if(isset($_POST['mati'])){ $ruta = $_POST['mati']; }
                if(isset($_POST['tarda'])){ $ruta = $_POST['tarda']; }
                if(isset($_POST['aux'])){ $ruta = $_POST['aux']; }

                $data = file_get_contents($ruta);
                $fitx = json_decode($data, true);

                foreach ($fitx as $prod){
                    echo "<div class='int-cont c".$n."'><form action='ModificarMenu.php' method='POST'>
                          <input type='hidden' name='Idprod' value='".$prod["id"]."'>
                          <input type='hidden' name='aux' value='".$ruta."'>
                          <input type='submit' class='boton btn' value ='Producte nº".$prod["id"]."'>
                          </form></div>";
                    $n++;
                }
                echo "<div class='footer int-cont'>";

                if(isset($_POST["Idprod"])){
                    foreach ($fitx as $prod){
                        if($prod['id'] == $_POST["Idprod"]){
                            echo "<form action='ModificarMenu.php' method='POST' enctype='multipart/form-data'>";
                            echo "<input type='hidden' name='prod' value='".$prod["id"]."'>";
                            echo "<div class='g-cont'>
                            <div class='g1'><label>Nom: </label></div>
                            <div class='g2'><input type='text' value='".$prod['nombre']."' name='nomProd' disabled></div>
                            <div class='g3'><label>Preu: </label></div>
                            <div class='g4'><input type='text' value='".$prod['precio']."' name='preuProd'></div>
                            <div class='g5'><label>Imatge (Ruta): </label></div>
                            <div class='g6'><input type='hidden' name='aux' value='".$ruta."'><input type='text' value='".$prod['img']."' name='imgProd' disabled></div>
                            <div class='g7'><input type='submit' class='boton btn' value ='Cambiar'></div>
                            </div>";
                            echo "</form></div>";
                        }
                    }
                }

                
                if(isset($_POST["prod"])){
                    $fitx[$_POST["prod"]-1]["nombre"] = $_POST["nomProd"];
                    $fitx[$_POST["prod"]-1]["precio"] = $_POST["preuProd"];
                    $fitx[$_POST["prod"]-1]["img"] = $_POST["imgProd"];
                    $data = json_encode($fitx);
                    file_put_contents($ruta, $data);
                    echo "<div class='footer int-cont'><p>Canvis efectuats</p></div>";
                }
            }
        ?>
    </div>
    <div class="div_foot">
        <?php include("../client/footer.php"); ?>
    </div>
    <script>
        document.getElementById("back").addEventListener("click", function(e){
            window.history.back();
        });
    </script>
</body>
</html>
