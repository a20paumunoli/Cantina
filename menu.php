<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/normalize.css">
        <title>MENU</title>

        <style>
            .grid-cont1{
                display: grid;
                grid-template-columns: 3fr 1fr;
                margin: 10px 40px 10px 40px;
            }

            .pr-grid{
                display: grid; 
                grid-template-rows: 3fr 1fr;
                align-items: center;
                justify-items: center;
            }

            .grid-cont2{
                display: grid; 
                grid-template-areas: "comida comida comida comida"
                                     "comida1 comida2 comida3 comida4"
                                     "bebida bebida bebida bebida"
                                     "bebida1 bebida2 bebida3 bebida4"
                                     "dulce dulce submit submit"
                                     "dulce1 dulce2 submit submit";
                gap: 10px 25px;
                grid-template-columns: auto;
                grid-template-rows: 30px 250px 30px 250px 30px 250px;
                
            }

            .gc1{
                grid-area: comida;
                background-color: lightsteelblue;
            }

            .gc2{
                grid-area: comida1; 
                background-color: lightsteelblue;
                column-gap: 10px;
            }

            .gc3{
                grid-area: comida2;
                background-color: lightsteelblue;
            }

            .gc4{
                grid-area: comida3;
                background-color: lightsteelblue;
            }

            .gc5{
                grid-area: comida4;
                background-color: lightsteelblue;
            }

            .gc6{
                grid-area: bebida;
                background-color: lightsteelblue;
            }

            .gc7{
                grid-area: bebida1;
                background-color: lightsteelblue;
            }
            .gc8{
                grid-area: bebida2;
                background-color: lightsteelblue;
            }
            .gc9{
                grid-area: bebida3;
                background-color: lightsteelblue;
            }
            
            .gc10{
                grid-area: bebida4;
                background-color: lightsteelblue;
            }

            .gc11{
                grid-area: dulce;
                background-color: lightsteelblue;
            }

            .gc12{
                grid-area: dulce1;
                background-color: lightsteelblue;
            }

            .gc13{
                grid-area: dulce2;
                background-color: lightsteelblue;
            }

            .gc14{
                grid-area: submit;
                background-color: lightsteelblue;
            }
            
            .ticket{
                background-color: grey;
                margin-left: 20px;
            }

            .responsive{
                width: 100%;
                max-width: 150px;
                height: auto;
            }

            /*.text{
  _              
            }*/

            /*.img{
_ 
            }*/
        
        </style>

    </head>

    <body>
        <?php include("header.php") ?>
        
        <form method="POST" action="formulariDades.php">
            <div class="grid-cont1">
                
                <!-- Menú -->
                <div>
                    <p>MENÚ</p>
                    <div class="grid-cont2">
                    <?php
                        $data = file_get_contents("json/cmati.json");
                        $menuMati = json_decode($data, true);
                        mostrarProd($menuMati);

                        function mostrarProd($menuMati){                
                            $var = 0;
                            foreach ($menuMati as $prod) {
                                if($var == 0){
                                    echo "<div class='gc".($var+1)."'>Comida</div>";
                                    $var++;
                                }else if ($var == 5){
                                    echo "<div class='gc".($var+1)."'>Begudes</div>";
                                    $var++;
                                }else if($var == 10){
                                    echo "<div class='gc".($var+1)."'>Dolços</div>";
                                    $var++;
                                }         
                                echo "<div class='gc".($var+1). " pr-grid'>";
                                    echo '<div class="img">
                                            <img src='.$prod["img"].' class="responsive">
                                          </div>
                                          <div class="text">
                                            <input type="button" value="+">
                                            '.$prod["nombre"].  ' '.$prod["precio"].'€  '.$prod["id"].'
                                            <input type="button" value="-">
                                          </div></div>';
                                $var++; 
                            }
                            echo "<div class='gc".($var+1)."'><input type='submit' value='Finalitzar compra'></div>";
                        }
                    ?>
    <!-- <div>
        <div class="gc1">Comida</div>
        <div class="gc2">

        </div>
        <div class="gc3">

        </div>
        <div class="gc4">

        </div>
        <div class="gc5">

        </div>
        <div class="gc6">Bebida</div>
        <div class="gc7">

        </div>
        <div class="gc8">

        </div>
        <div class="gc9">

        </div>
        <div class="gc10">
            
        </div>
        <div class="gc11">Dulce</div>
        <div class="gc12">

        </div>
        <div class="gc13">

        </div>
        <div class="gc14">Submit</div>
    </div>  -->
                    </div>
                </div>

                <!-- Llistat elements seleccionats -->

                <div class="ticket">
                    <h3>Ticket</h3>
                    <div>

                    </div>
                </div>
            </div>
        </form>


            

                    
        </div>

        <!-- <div class="tarda">
            
                $data = file_get_contents("json/ctarda.json");
                $menuTarda = json_decode($data, true);
                foreach ($menuTarda as $prod) {
                ?>
                    <div>
                    
                        echo "<img src='" . $prod["img"] . "'></br>";
                        
                        <button class="afegir">+</button>
                        
                        echo $prod["nombre"] . " " . $prod["precio"] . "€  " . $prod["id"];
                       
                        <button class="treure">-</button>
                    </div>
            
            }
           
        </div> -->

        <?php include("footer.php"); ?>
    </body>
</html>