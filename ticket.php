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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="normalize.css">
    <link type="text/css" rel="stylesheet" href="css/header.css">
    <title>Ticket</title>
    <style>
            .separate{
                margin-left: 15px;
                width: auto;
                height: 75vh;
                display: flex;
            }
            .tabla{
                width: 500px;
            }
            h1{
                width: 500px;
                text-align: center;
            }
        </style> 
</head>
<body>
    <?php include("header.php") ?>

    <h1>Ticket</h1>
    <div class="separate">
        <?php
        //$_SESSION["productos"]=$_POST[$nom.$i]];
        if($_POST){
            ?>
        <div class="tabla">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Nom: </th>
                <td><?php echo $_POST['name'];?></td>
                
            </tr>
            <tr>
                <th scope="row">Telèfon: </th>
                <td><?php echo $_POST['tel'];?></td>
            </tr>
            <tr>
                <th scope="row">Correu: </th>
                <td colspan="2"><?php echo $_POST['email'];}?></td>
            </tr>
            <tr>
                <th scope="row">Comanda: </th>

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
                <th scope="row">Preu Total: </th>
                <td colspan="2"><?php echo $_SESSION['total'];?> €</td>
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
        $nF = "./comandes/".date("d"."-"."m"."-"."Y")."-n".$n.".json";
        if(file_exists($nF)){ $n++; }
    }while(file_exists($nF));

    file_put_contents($nF, json_encode($json));


    /*if(!file_exists($nF)){
        file_put_contents($nF, json_encode($json));
    }else{
        file_put_contents($nF, json_encode($json), FILE_APPEND);    
    }*/
    
    
    

    
    
    
    
    
    
    
    
    
    include ("footer.php"); ?>
</body>
</html>