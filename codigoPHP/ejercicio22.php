<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio22</title>
    </head>
    <body>
        <header>
            <h2>Construir y recoger un formulario en la misma página</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/09
             * @version 2024/10/09
             */
                //Comprobar si se han enviado datos
                if (isset($_REQUEST["submit"])) {
                    //Mostrar los valores de los campos
                    print("Campo1: ".$_REQUEST["campo1"]."<br>");
                    print("Campo2: ".$_REQUEST["campo2"]);
                } else {
                    //Mostrar el formulario para la recoleccion de datos
                    ?>       
                    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
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
                    <?php
                }
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>