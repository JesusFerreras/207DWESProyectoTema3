<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio06</title>
    </head>
    <body>
        <header>
            <h2>Calcular la fecha y el día de la semana de dentro de 60 días</h2>
        </header>
        <main>
            <?php
                $oFechaActual = new DateTime("now", new DateTimeZone("Europe/Madrid"));
                print("Fecha actual: ".$oFechaActual->format("A, d/m/Y")."<br>Fecha de dentro de 60 días: ".(date_add($oFechaActual, ))->getTimestamp());
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>