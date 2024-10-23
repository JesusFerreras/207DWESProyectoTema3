<!doctype html>
<html>
    <head>
        <title>Ejercicio25</title>
        <style>
            table {
                table-layout: fixed;
                width: 100%;
            }
            
            p.error {
                color: red;
            }

            input[readonly] {
                background-color: lightgray;
                color: gray;
            }

            input.obligatorio {
                background-color: lemonchiffon;
                
            }
        </style>
    </head>
    <body>
        <header>
            <h2>Plantilla de formularios</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/22
             * @version 2024/10/23
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
                    "textarea" => null,
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
                    "textarea" => null,
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
                    $aErrores["rad"] = !isset($_REQUEST["rad"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["check"] = !isset($_REQUEST["check1"]) && !isset($_REQUEST["check2"]) && !isset($_REQUEST["check3"]) ? "Se debe escoger al menos una opcion" : null;
                    $aErrores["tlfno"] = validacionFormularios::validarTelefono($_REQUEST["tlfno"]);
                    $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST["fecha"], '01/01/2200', '01/01/1900');
                    $aErrores["hora"] = !empty($_REQUEST["hora"]) && !preg_match('/^([01][0-9] | 2[0-4]):[0-5][0-9]$/', $_REQUEST["hora"]) ? "La hora no cumple con el formato" : null;
                    $aErrores["textarea"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["textarea"]);
                    $aErrores["busqueda"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["textarea"]);
                    $aErrores["enlace"] = validacionFormularios::validarURL($_REQUEST["enlace"]);
                    $aErrores["contrasenya"] = validacionFormularios::validarPassword($_REQUEST["contrasenya"], 20, 5, 3);
                    $aErrores["numero"] = validacionFormularios::comprobarEntero($_REQUEST["numero"], 50, 0, 1);
                    
                    //Se comprueba que los mensajes de error sean nulos, en caso contrario el formulario no será valido y se borra la respuesta del campo erroneo
                    foreach ($aErrores as $clave => $valor) {
                        if (!empty($valor)) {
                            $entradaOK = false;
                            $_REQUEST[$clave] = '';
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
                    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                        <fieldset>
                            <legend>Tipo text</legend>
                            <table>
                                <tr>
                                    <td>
                                        <label for="texto">Texto</label>
                                        <input class="obligatorio" type="text" id="texto" name="texto" value="<?php print(!empty($_REQUEST["texto"]) ? $_REQUEST["texto"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["texto"]) ? $aErrores["texto"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo radio</legend>
                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <input class="obligatorio" type="radio" id="rad1" name="rad" value="1" <?php print(isset($_REQUEST["rad"]) && $_REQUEST["rad"]==1 ? "checked":""); ?>>
                                            <label for="rad1">Radio 1</label>
                                        </div>
                                        <div>
                                            <input class="obligatorio" type="radio" id="rad2" name="rad" value="2" <?php print(isset($_REQUEST["rad"]) && $_REQUEST["rad"]==2 ? "checked":""); ?>>
                                            <label for="rad2">Radio 2</label>
                                        </div>
                                        <div>
                                            <input class="obligatorio" type="radio" id="rad3" name="rad" value="3" <?php print(isset($_REQUEST["rad"]) && $_REQUEST["rad"]==3 ? "checked":""); ?>>
                                            <label for="rad3">Radio 3</label>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["rad"]) ? $aErrores["rad"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo checkbox</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="checkbox" id="check1" name="check1" <?php print(isset($_REQUEST["check1"]) ? "checked":"") ?>>
                                        <label for="check1">Checkbox 1</label>
                                        <input class="obligatorio" type="checkbox" id="check2" name="check2" <?php print(isset($_REQUEST["check2"]) ? "checked":"") ?>>
                                        <label for="check2">Checkbox 2</label>
                                        <input class="obligatorio" type="checkbox" id="check3" name="check3" <?php print(isset($_REQUEST["check3"]) ? "checked":"") ?>>
                                        <label for="check3">Checkbox 3</label>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["check"]) ? $aErrores["check"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo tel</legend>
                            <table>
                                <tr>
                                    <td>
                                        <label for="tlfno">Teléfono</label>
                                        <input type="tel" name="tlfno" id="tlfno" value="<?php print(!empty($_REQUEST["tlfno"]) ? $_REQUEST["tlfno"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["tlfno"]) ? $aErrores["tlfno"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo date</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="date" name="fecha" id="fecha" value="<?php print(!empty($_REQUEST["fecha"]) ? $_REQUEST["fecha"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["fecha"]) ? $aErrores["fecha"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo time</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="time" name="hora" id="hora" value="<?php print(!empty($_REQUEST["hora"]) ? $_REQUEST["hora"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["hora"]) ? $aErrores["hora"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo range</legend>
                            <table>
                                <tr>
                                    <td>
                                        <label for="rango">min</label>
                                        <input type="range" name="rango" id="rango" value="<?php print(!empty($_REQUEST["rango"]) ? $_REQUEST["rango"]:""); ?>">
                                        <label for="rango">max</label>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Lista desplegable</legend>
                            <table>
                                <tr>
                                    <td>
                                        <select name="seleccion" id="seleccion">
                                            <option value=""></option>
                                            <option value="Opción 1">Opción 1</option>
                                            <option value="Opción 2">Opción 2</option>
                                            <option value="Opción 3">Opción 3</option>
                                            <option value="Opción 4">Opción 4</option>
                                        </select>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["seleccion"]) ? $aErrores["seleccion"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Textarea</legend>
                            <table>
                                <tr>
                                    <td>
                                        <textarea name="textarea" id="textarea" cols="30" rows="10" value="<?php print(!empty($_REQUEST["textarea"]) ? $_REQUEST["textarea"]:""); ?>"></textarea>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["textarea"]) ? $aErrores["textarea"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo search</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="search" name="busqueda" id="busqueda" value="<?php print(!empty($_REQUEST["busqueda"]) ? $_REQUEST["busqueda"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["busqueda"]) ? $aErrores["busqueda"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo url</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="url" name="enlace" id="enlace" value="<?php print(!empty($_REQUEST["enlace"]) ? $_REQUEST["enlace"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["enlace"]) ? $aErrores["enlace"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo password</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="password" id="contrasenya" name="contrasenya" value="<?php print(!empty($_REQUEST["contrasenya"]) ? $_REQUEST["contrasenya"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["contrasenya"]) ? $aErrores["contrasenya"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo number</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="number" name="numero" id="numero" step="5" value="<?php print(!empty($_REQUEST["numero"]) ? $_REQUEST["numero"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["numero"]) ? $aErrores["numero"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo file</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="file" name="fichero" id="fichero" value="<?php print(!empty($_REQUEST["fichero"]) ? $_REQUEST["fichero"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["fichero"]) ? $aErrores["fichero"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tipo color</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="color" name="color" id="color" value="<?php print(!empty($_REQUEST["color"]) ? $_REQUEST["color"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["color"]) ? $aErrores["color"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <input type="submit" id="submit" name="submit">
                        <input type="reset" id="reset" name="reset">
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