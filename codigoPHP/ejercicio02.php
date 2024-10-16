<!doctype html>
<html>
    <head>
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>