<!doctype html>
<html>
    <head>
        <title>Ejercicio24</title>
        <style>
            p.error {
                color: red;
            }

            [readonly] {
                background-color: lightgray;
                color: gray;
            }

            [required] {
                background-color: lemonchiffon;
            }
        </style>
    </head>
    <body>
        <header>
            <h2>Construir y recoger un formulario con validación y recuperación de datos</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/22
             * @version 2024/10/22
             */
            
            require_once '../core/231018libreriaValidacion.php';
            
                //Indica si el formulario entero es valido
                $entradaOK = true;
                //Array donde se recogen los mensajes de error
                $aErrores = [
                    "texto" => null,
                    "rad" => null,
                    "check" => null,
                    "tlfno" => null,
                    "fecha" => null,
                    "hora" => null,
                    "rango" => null,
                    "seleccion" => null,
                    "area" => null,
                    "busqueda" => null,
                    "enlace" => null,
                    "contrasenya" => null,
                    "numero" => null,
                    "fichero" => null,
                    "color" => null
                ];
                //Array donde se recogen las respuestas con el formulario valido
                $aRespuestas = [
                    "texto" => null,
                    "rad" => null,
                    "check1" => null,
                    "check2" => null,
                    "check3" => null,
                    "tlfno" => null,
                    "fecha" => null,
                    "hora" => null,
                    "rango" => null,
                    "seleccion" => null,
                    "area" => null,
                    "busqueda" => null,
                    "enlace" => null,
                    "contrasenya" => null,
                    "numero" => null,
                    "fichero" => null,
                    "color" => null
                ];
                
                //Si se ha enviado un formulario antes
                if (isset($_REQUEST["submit"])) {
                    //Se rellena el array de errores con los mensajes de error
                    $aErrores["texto"] = validacionFormularios::comprobarAlfabetico($_REQUEST["texto"], 10, 2, 1);
                    $aErrores["rad"] = is_null($_REQUEST["rad"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["check"] = is_null($_REQUEST["rad"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["tlfno"] = validacionFormularios::validarTelefono($_REQUEST["tlfno"]);
                    $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST["fecha"], $fechaMaxima, $fechaMinima);
                    $aErrores["hora"] = !preg_match('/^([01][0-9] | 2[0-4]):[0-5][0-9]$/i', $_REQUEST["campo2"]);
                    $aErrores["area"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["area"]);
                    $aErrores["busqueda"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["area"]);
                    $aErrores["enlace"] = validacionFormularios::validarURL($_REQUEST["enlace"], $obligatorio);
                    $aErrores["contrasenya"] = validacionFormularios::validarPassword($_REQUEST["contrasenya"], $maximo, $minimo, 3);
                    $aErrores["numero"] = validacionFormularios::comprobarEntero($integer, $max, $min, 1);
                    $aErrores["fichero"] = validacionFormularios::;
                    $aErrores["color"] = validacionFormularios::;
                    
                    //Se comprueba que los mensajes de error sean nulos, en caso contrario el formulario no será valido y se borra la respuesta del campo erroneo
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
                    print_r($_REQUEST);
                    ?>    
                    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                        <fieldset>
                            <legend>Tipo text</legend>
                            <div>
                                <label for="texto">Texto</label>
                                <input novalidate required type="text" id="texto" name="texto" placeholder="Texto" value="<?php print(!empty($_REQUEST["texto"]) ? $_REQUEST["texto"]:""); ?>">
                                <p class="error"><?php print(!is_null($aErrores["texto"]) ? $aErrores["texto"]:""); ?></p>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo radio</legend>
                            <div>
                                <input novalidate required type="radio" id="rad1" name="rad" value="1" <?php print($_REQUEST["rad"]==1 ? "checked":"") ?>>
                                <label for="rad1">Radio 1</label>
                            </div>
                            <div>
                                <input novalidate required type="radio" id="rad2" name="rad" value="2" <?php print($_REQUEST["rad"]==2 ? "checked":"") ?>>
                                <label for="rad2">Radio 2</label>
                            </div>
                            <div>
                                <input novalidate required type="radio" id="rad3" name="rad" value="3" <?php print($_REQUEST["rad"]==3 ? "checked":"") ?>>
                                <label for="rad3">Radio 3</label>
                            </div>
                            <p class="error"><?php print(!is_null($aErrores["rad"]) ? $aErrores["rad"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo checkbox</legend>
                            <input novalidate type="checkbox" id="check1" name="check1" <?php print(isset($_REQUEST["check1"]) ? "checked":"") ?>>
                            <label for="check1">Checkbox 1</label>
                            <input novalidate type="checkbox" id="check2" name="check2" <?php print(isset($_REQUEST["check2"]) ? "checked":"") ?>>
                            <label for="check2">Checkbox 2</label>
                            <input novalidate type="checkbox" id="check3" name="check3" <?php print(isset($_REQUEST["check3"]) ? "checked":"") ?>>
                            <label for="check3">Checkbox 3</label>
                            <p class="error"><?php print(!is_null($aErrores["check"]) ? $aErrores["check"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo tel</legend>
                            <label for="tlfno">Teléfono</label>
                            <input novalidate type="tel" name="tlfno" id="tlfno" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" placeholder="987 65 43 21" value="<?php print(!empty($_REQUEST["tlfno"]) ? $_REQUEST["tlfno"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["tlfno"]) ? $aErrores["tlfno"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo date</legend>
                            <input novalidate type="date" name="fecha" id="fecha" value="<?php print(!empty($_REQUEST["fecha"]) ? $_REQUEST["fecha"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["fecha"]) ? $aErrores["fecha"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo time</legend>
                            <input novalidate type="time" name="hora" id="hora" min="06:00" max="18:00" value="<?php print(!empty($_REQUEST["hora"]) ? $_REQUEST["hora"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["hora"]) ? $aErrores["hora"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo range</legend>
                            <label for="rango">min</label>
                            <input novalidate type="range" name="rango" id="rango" value="<?php print(!empty($_REQUEST["rango"]) ? $_REQUEST["rango"]:""); ?>">
                            <label for="rango">max</label>
                        </fieldset>
                        <fieldset>
                            <legend>Lista desplegable</legend>
                            <select name="seleccion" id="seleccion">
                                <option value="Opción 1">Opción 1</option>
                                <option value="Opción 2">Opción 2</option>
                                <option value="Opción 3">Opción 3</option>
                                <option value="Opción 4">Opción 4</option>
                            </select>
                            <p class="error"><?php print(!is_null($aErrores["seleccion"]) ? $aErrores["seleccion"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Textarea</legend>
                            <textarea name="area" id="area" cols="30" rows="10" value="<?php print(!empty($_REQUEST["area"]) ? $_REQUEST["area"]:""); ?>"></textarea>
                            <p class="error"><?php print(!is_null($aErrores["area"]) ? $aErrores["area"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo search</legend>
                            <input novalidate type="search" name="busqueda" id="busqueda" value="<?php print(!empty($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["busqueda"]) ? $aErrores["busqueda"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo url</legend>
                            <input novalidate type="url" name="enlace" id="enlace" value="<?php print(!empty($_REQUEST["enlace"]) ? $_REQUEST["enlace"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["enlace"]) ? $aErrores["enlace"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo password</legend>
                            <input novalidate type="password" id="contrasenya" name="contrasenya" value="<?php print(!empty($_REQUEST["contrasenya"]) ? $_REQUEST["contrasenya"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["contrasenya"]) ? $aErrores["contrasenya"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo number</legend>
                            <input novalidate required type="number" name="numero" id="numero" step="5" value="<?php print(!empty($_REQUEST["numero"]) ? $_REQUEST["numero"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["numero"]) ? $aErrores["numero"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo file</legend>
                            <input novalidate type="file" name="fichero" id="fichero" value="<?php print(!empty($_REQUEST["fichero"]) ? $_REQUEST["fichero"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["fichero"]) ? $aErrores["fichero"]:""); ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo color</legend>
                            <input novalidate type="color" name="color" id="color" value="<?php print(!empty($_REQUEST["color"]) ? $_REQUEST["color"]:""); ?>">
                            <p class="error"><?php print(!is_null($aErrores["color"]) ? $aErrores["color"]:""); ?></p>
                        </fieldset>
                        <input novalidate type="submit">
                        <input novalidate type="reset">
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