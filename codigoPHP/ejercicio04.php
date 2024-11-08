<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio04</title>
    </head>
    <body>
        <header>
            <h2>Mostrar fecha y hora actual formateada en portugués</h2>
        </header>
        <main>
            <?php
                $oFechaActual = new DateTime("now", new DateTimeZone("Europe/Lisbon"));
                print($oFechaActual->format("d/F/Y, H:i"));
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>