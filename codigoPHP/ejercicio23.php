<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio23</title>
    </head>
    <body>
        <header>
            <h2>Construir y recoger un formulario con validación</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/09
             * @version 2024/10/17
             */
                //Indica si el formulario entero es valido
                $entradaOK = true;
                //Array donde se recogen los mensajes de error
                $aErrores = [
                    "campo1" => null,
                    "campo2" => null
                ];
                //Array donde se recogen las respuestas con el formulario valido
                $aRespuestas = [
                    "campo1" => null,
                    "campo2" => null
                ];
                
                //Si se ha enviado un formulario antes
                if (isset($_REQUEST["submit"])) {
                    //Se comprueba que los campos sean correctos, en caso contrario el formulario no es valido
                    if (strlen($_REQUEST["campo1"]) < 1 || strlen($_REQUEST["campo1"]) > 10) {
                        $aErrores["campo1"] = "Este campo debe contener entre 1 y 10 caracteres";
                        $entradaOK = false;
                    }
                    if (!preg_match('/^[a-z]+$/i', $_REQUEST["campo2"])) {
                        $aErrores["campo2"] = "Este campo solo debe contener letras";
                        $entradaOK = false;
                    }
                } else {
                    $entradaOK = false;
                }
                
                //Si el formulario es valido
                if ($entradaOK) {
                    //Rellenar el array de respuestas
                    foreach ($_REQUEST as $clave => $valor) {
                        $aRespuestas[$clave] = $valor;
                    }
                    
                    //Mostrar los valores de los campos
                    foreach ($aRespuestas as $clave => $valor) {
                        print("$clave: $valor");
                    }
                } else {
                    //Mostrar de formulario
                    ?>       
                    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <label for="campo1">Campo1 (1-10 caracteres) :</label>
                            <input type="text" id="campo1" name="campo1">
                            <p><?php print(isset($aErrores["campo1"]) ? $aErrores["campo1"]:""); ?></p>
                        </div>
                        <div>
                            <label for="campo2">Campo2 (Solo letras) :</label>
                            <input type="text" id="campo2" name="campo2">
                            <p><?php print(isset($aErrores["campo2"]) ? $aErrores["campo2"]:""); ?></p>
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