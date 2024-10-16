<!doctype html>
<html>
    <head>
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
             * @version 2024/10/16
             */
                //Indica si el formulario entero es valido
                $bValido = true;
                //Array donde se recogen los mensajes de error
                $aErrores;
                
                print_r($_REQUEST);
                
                //Si se ha enviado un formulario antes
                if (isset($_REQUEST["submit"])) {
                    //Se comprueba que los campos sean correctos, en caso contrario el formulario no es valido
                    if (strlen($_REQUEST["campo1"]) < 1 || strlen($_REQUEST["campo1"]) > 10) {
                        $aErrores["campo1"] = "Este campo debe contener entre 1 y 10 caracteres";
                        $bValido = false;
                    }
                    if (!preg_match('/^[a-z]+$/i', $_REQUEST["campo2"])) {
                        $aErrores["campo2"] = "Este campo solo debe contener letras";
                        $bValido = false;
                    }
                } else {
                    $bValido = false;
                }
                
                //Si el formulario es valido
                if ($bValido) {
                    //Mostrar los valores de los campos
                    print("Campo1: ".$_REQUEST["campo1"]."<br>");
                    print("Campo2: ".$_REQUEST["campo2"]);
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
            <div>
                <a href="../../index.html">Jesús Ferreras González</a>
            </div>
            <div>
                <a href="../indexProyectoTema3.php">Tema 3</a>
            </div>
        </footer>
    </body>
</html>