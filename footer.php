<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <title></title>
        <style>
            #grid-c{
                display: grid;  
                grid-template-columns: 1fr 2fr 1fr;
            }
            #d1{
                justify-self: left;
                align-self: center;
            }

            #d2{
                justify-self: center;
                align-self: center;
            }

            #d3{
                justify-self: right;
                align-self: center;
            }

            p{
                margin: 0px 0px 0px 0px;
            }

            .sp{
                border-right: 1px solid black;
                margin-right: 5px;
            }

        </style>
    </head>
    <body>
        <div id="grid-c" class="alert alert-secondary">
            <div id="d1">
                <a href="" class="link-dark">About us</a>
                </br>
                <a href="" class="link-dark">Contactanos</a>
            </div>
            <div id="d2">
                <p>Copyright © 2021 Ins Pedralbes. Todos los derechos reservados.</p>
            </div>
            <div id="d3">
                <span class="sp">
                    <a href="https://www.instagram.com/inspedralbes/" class="link-dark"><i class="bi bi-instagram"></i></a>
                </span>
                <span class="sp">
                    <a href="https://www.linkedin.com/school/institut-pedralbes" class="link-dark"><i class="bi bi-linkedin"></i></a>
                </span>
                <span>
                    <a href="https://www.twitter.com/inspedralbes/" class="link-dark"><i class="bi bi-twitter"></i></a>
                </span>
            </div>
        </div>
    </body>
</html>