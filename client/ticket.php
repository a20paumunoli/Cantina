<?php
    $segundosActuales = (date('G')*3600 + date('i')*60 + date('s'));
    $segundos24h = 86400;
    $restaTiempo = $segundos24h-$segundosActuales+7200;
    setcookie('comanda', "comanda_hecha_".uniqid(), time()+$restaTiempo);
    session_start();
    $json = array("Nombre" => "'".$_POST["name"]."'",
                   "Telefon" => "'".$_POST["tel"]."'",
                   "Correu" => "'".$_POST["email"]."'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link type="text/css" rel="stylesheet" href="css/header.css">
    <title>Ticket</title>
    <style>
            .separate{
                margin-left: 15px;
                width: auto;
                height: 75vh;
                display: grid;
                font-size: 20px;
                justify-content:center
            }
            .tabla{
                width: 500px;
                justify-content:center
            }
            h1{
                text-align: center;
            }
            .table{
                padding: 5px;
                margin-left: 35px;
                border: 1px black solid;
            }
            th{
                padding: 15px;
                text-align: end;
            }
            td{
                text-align: left;
            }
        </style> 
</head>
<body>
    <?php include("header.php") ?>


    <div class="separate">
        <h1>Ticket</h1>

        <?php
        //$_SESSION["productos"]=$_POST[$nom.$i]];
        if($_POST){
            ?>
        <div class="tabla">
        <table class="table">
            <thead>
            </thead>
            <tbody>
            <tr>
                <th>Nom: </th>
                <td><?php echo $_POST['name'];?></td>
                
            </tr>
            <tr>
                <th>Telèfon: </th>
                <td><?php echo $_POST['tel'];?></td>
            </tr>
            <tr>
                <th>Correu: </th>
                <td colspan="2"><?php echo $_POST['email'];}?></td>
            </tr>
            <tr>
                <th>Comanda: </th>

                    <td>
                        <?php
                            if($_SESSION){
                            for($i=0; $i<count($_SESSION['nombre']); $i++){
                                echo $_SESSION['nombre'][$i]."  x".$_SESSION['nproductos'][$i]."<br>";
                                $json = array_merge($json, array('producte'.$i => $_SESSION['nombre'][$i]." x".$_SESSION['nproductos'][$i]));
                            } 
                            $json = array_merge($json, array('total' => $_SESSION['total']));
                            
                        ?>
                    </td>
            </tr>
            <tr>
                <th>Preu Total: </th>
                <td><?php echo $_SESSION['total'];?> €</td>
            </tr>
            </tbody>
        </table>
        </div>
    <?php
    //$_SESSION["productos"]=$_POST[$nom.$i]];
    /*if($_POST){
        echo $_POST['name'];
        echo "<br>";
        echo $_POST['tel'];
        echo "<br>";
        echo $_POST['email'];
        echo "<br>";*/
    /*if($_SESSION){
        for($i=0; $i<count($_SESSION['nombre']); $i++){
            echo $_SESSION['nombre'][$i];
            echo $_SESSION['nproductos'][$i]."</br>";
        }
        echo $_SESSION['total'];*/
        session_destroy();
    }

    ?>
    </div>
    <?php
        $n = 1;
        do{
            $nF = "../administrador/comandes/".date("d"."-"."m"."-"."Y")."-n".$n.".json";
            if(file_exists($nF)){ $n++; }
        }while(file_exists($nF));

        file_put_contents($nF, json_encode($json));
        include ("footer.php"); 
    ?>
</body>
</html>