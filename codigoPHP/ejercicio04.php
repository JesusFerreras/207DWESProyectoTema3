<!doctype html>
<html>
    <head>
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>