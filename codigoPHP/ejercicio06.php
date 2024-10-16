<!doctype html>
<html>
    <head>
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>