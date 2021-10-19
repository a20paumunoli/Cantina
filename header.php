<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="sylesheet" href="css/normalize.css">
    <title>header</title>
    
    <style>
        #h-cont{
            display: grid; 
            grid-template-columns: auto 1fr auto; 
            align-content: center; 
            padding: 10px 16px 10px 60px;
        }
        
        #h-1{
            justify-self: left;
            align-self: center;
            padding-left: 14px; 
            padding-right: 14px;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        #h-2{
            align-self: end;
            justify-self: left;
            margin-left: 10px
        }

        #h-3{
            justify-self: right;
            align-self: end;
        }

        .btn{
            color: #dc3545;
            font-size: 17.5px;
        } 

        h1{ margin-bottom: 0px !important;}

        p{margin: 0px 0px 0px 0px}

        .sp2{
            font-weight: lighter;
            font-size: 20px;
        }

    </style>

</head>


<body>
    
    <div id="h-cont" class="alert alert-secondary">
        <div id="h-1">        
            <a href="index.php"><img id="logo" src="../img/logo.png"  width="60px"> </a>
        </div>

        <div id="h-2">
            <h1 class="display-5">Cantina<span class="sp2"> de l'Ins Pedralbes</span></h1>
            
        </div>

        <div id="h-3"> 
            <a href="index.php" class="btn btn-outline-danger"><i id="icon" class="bi bi-house"></i> <span>Home</span></a>            
        </div>

    </div>
    

</body>

</html>