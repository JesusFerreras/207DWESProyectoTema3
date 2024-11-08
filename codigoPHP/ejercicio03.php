<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio03</title>
    </head>
    <body>
        <header>
            <h2>Mostrar fecha y hora actual formateada en castellano</h2>
        </header>
        <main>
            <?php
                
                $ok = setlocale(LC_ALL, "es_ES");
                date_default_timezone_set("Europe/Madrid");
                
                $oFechaActual = new DateTime("now");
                $oFechaNacimiento = new DateTime("2002-05-19");
                $oFechaFuturo = new DateTime("2050-1-1");
                
                print("Hoy es ".strftime("%d de %B de %Y", $oFechaActual->getTimestamp())." y son las ".$oFechaActual->format("H:i")." en Benavente");
                
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Lisbon"));
                print(", las ".$oFechaActual->format("H:i")." en Oporto<br>");
                
                $oFechaActual->setTimezone(new DateTimeZone("Europe/Madrid"));
                print("Nací el ".strftime("%d de %B de %Y", $oFechaNacimiento->getTimestamp())." y por tanto tengo ".date_diff($oFechaActual, $oFechaNacimiento)->format("%Y")." años, que es lo mismo que ".date_diff($oFechaActual, $oFechaNacimiento)->format("%a")." días<br>");
                print("El ".strftime("%d de %B de %Y", $oFechaFuturo->getTimestamp())." tendré ".date_diff($oFechaFuturo, $oFechaNacimiento)->format("%Y")." años<br>");
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>