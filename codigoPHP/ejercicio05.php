<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio05</title>
    </head>
    <body>
        <header>
            <h2>Inicializar y mostrar una variable timestamp</h2>
        </header>
        <main>
            <?php
                $oFechaActual = new DateTime("now");
                print("DateTime: ".$oFechaActual->format("d/m/Y H:i:s")."<br>Timestamp:".$oFechaActual->getTimestamp());
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>