<!doctype html>
<html>
    <head>
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>