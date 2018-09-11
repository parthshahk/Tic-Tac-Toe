<!DOCTYPE html>
<html>
    <head>
        <title>Tic Tac Toe Multiplater</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Play tic tac toe online with friends!" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- <meta name="theme-color" content=""> -->
        <meta property="og:title" content="Tic Tac Toe Multiplayer" />
        <meta property="og:description" content="Play tic tac toe online with friends!" />
        <!-- <meta property="og:image" content="" /> -->
        <meta property="og:type" content="website" />
        <!-- <meta property="og:url" content="" /> -->
        <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />     -->
        <link rel="stylesheet" href="./css/materialize.min.css">
        <link rel="stylesheet" href="./css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Anton|Roboto:300,400,500" rel="stylesheet">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
        <!-- <link rel="canonical" href="" /> -->
    </head>
    <body>
        <section id="board">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <table>
                            <tr>
                                <td id="c0" class="cell"></td>
                                <td id="c1" class="cell"></td>
                                <td id="c2" class="cell"></td>
                            </tr>
                            <tr>
                                <td id="c3" class="cell"></td>
                                <td id="c4" class="cell"></td>
                                <td id="c5" class="cell"></td>
                            </tr>
                            <tr>
                                <td id="c7" class="cell"></td>
                                <td id="c7" class="cell"></td>
                                <td id="c8" class="cell"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        



        <script>
            document.addEventListener('DOMContentLoaded', function(){
                initializeCells('','x');
            });
        </script>
        <script src="./js/materialize.min.js"></script>
        <script src="./js/script.js"></script>
    </body>
</html>