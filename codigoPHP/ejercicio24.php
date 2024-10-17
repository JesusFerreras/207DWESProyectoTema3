<!doctype html>
<html>
    <head>
        <title>Ejercicio24</title>
    </head>
    <body>
        <header>
            <h2>Construir y recoger un formulario con validación y recuperación de datos</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/09
             * @version 2024/10/17
             */
            
            require_once '../core/231018libreriaValidacion.php';
            
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
                    //Se rellena el array de errores con los mensajes de error
                    $aErrores["campo1"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["campo1"], 10, 1);
                    $aErrores["campo2"] = validacionFormularios::comprobarAlfabetico($_REQUEST["campo2"]);
                    
                    //Se comprueba que los mensajes de error sean nulos, en caso contrario
                    foreach ($aErrores as $clave => $valor) {
                        if (!empty($valor)) {
                            $entradaOK = false;
                            $_REQUEST[$clave] = "";
                        }
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
                        print("$clave: $valor<br>");
                    }
                } else {
                    //Mostrar de formulario
                    ?>       
                    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <label for="campo1">Campo1 (1-10 caracteres) :</label>
                            <input type="text" id="campo1" name="campo1" value="<?php print(!empty($_REQUEST["campo1"]) ? $_REQUEST["campo1"]:""); ?>">
                            <p><?php print(!is_null($aErrores["campo1"]) ? $aErrores["campo1"]:""); ?></p>
                        </div>
                        <div>
                            <label for="campo2">Campo2 (Solo letras) :</label>
                            <input type="text" id="campo2" name="campo2" value="<?php print(!empty($_REQUEST["campo2"]) ? $_REQUEST["campo2"]:""); ?>">
                            <p><?php print(!is_null($aErrores["campo2"]) ? $aErrores["campo2"]:""); ?></p>
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>