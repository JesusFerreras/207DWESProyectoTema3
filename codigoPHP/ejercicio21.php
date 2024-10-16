<!doctype html>
<html>
    <head>
        <title>Ejercicio21</title>
    </head>
    <body>
        <header>
            <h2>Construir y recoger un formulario</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/08
             * @version 2024/10/08
             */
            ?>
            <form action="tratamiento.php" method="post">
                <div>
                    <label for="campo1">Campo1:</label>
                    <input type="text" id="campo1" name="campo1">
                </div>
                <div>
                    <label for="campo2">Campo2:</label>
                    <input type="text" id="campo2" name="campo2">
                </div>
                <div>
                    <input type="submit" id="submit" name="submit">
                </div>
            </form>
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