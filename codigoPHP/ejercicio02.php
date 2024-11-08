<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio02</title>
    </head>
    <body>
        <header>
            <h2>Inicializar y mostrar una variable heredoc</h2>
        </header>
        <main>
            <?php
                $iEntero = 2;
                $sCadena = <<<FIN
                    Prueba de heredoc, línea 1<br>
                    Prueba de heredoc, línea $iEntero
                FIN;
                
                print($sCadena);
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>