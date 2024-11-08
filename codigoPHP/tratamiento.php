<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
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
                //Mostrar los valores de los campos
                print("Campo1: ".$_REQUEST["campo1"]."<br>");
                print("Campo2: ".$_REQUEST["campo2"]);
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>