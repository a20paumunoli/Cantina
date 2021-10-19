<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="normalize.css">
    <title>Ticket</title>
    <style>
            .separate{
                margin-left: 15px;
            }
        </style> 
</head>

<body>
    <?php include("header.html") ?>  
    <div class="separate"> 
        <h1>Ticket</h1>
    
    <?php
        if(!$_POST){

        } else {
            echo $_POST['email'];
        }
    ?>
    </div>




    <?php include ("footer.html"); ?>
</body>
</html>