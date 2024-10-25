<!doctype html>
<html>
    <head>
        <title>Ejercicio25</title>
        <style>
            table {
                table-layout: fixed;
                width: 100%;
            }
                table * {
                    margin: 0;
                }
            
            p.error {
                color: red;
            }

            input[readonly] {
                background-color: lightgray;
                color: #606060;
            }

            .obligatorio {
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
             * @version 2024/10/24
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
                    "correo" => null,
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
                    "correo" => null,
                    "contrasenya" => null,
                    "numero" => null,
                    "fichero" => null,
                    "color" => null
                ];
                
                $aRadio = [
                    "1" => "Radio 1",
                    "2" => "Radio 2",
                    "3" => "Radio 3"
                ];
                
                $aCheckbox = [
                    "check1" => "Checkbox 1",
                    "check2" => "Checkbox 2",
                    "check3" => "Checkbox 3",
                ];
                
                $aSeleccion = [
                    "opc1" => "Opción 1",
                    "opc2" => "Opción 2",
                    "opc3" => "Opción 3",
                    "opc4" => "Opción 4"
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
                    $aErrores["seleccion"] = empty($_REQUEST["seleccion"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["textarea"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["textarea"]);
                    $aErrores["busqueda"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["busqueda"]);
                    $aErrores["enlace"] = validacionFormularios::validarURL($_REQUEST["enlace"]);
                    $aErrores["correo"] = validacionFormularios::validarEmail($_REQUEST["correo"], 1);
                    $aErrores["contrasenya"] = validacionFormularios::validarPassword($_REQUEST["contrasenya"], 20, 5, 3, 1);
                    $aErrores["numero"] = validacionFormularios::comprobarFloat($_REQUEST["numero"], 50, 0, 1);
                    
                    //Se comprueba que los mensajes de error sean nulos, en caso contrario el formulario no es valido y se borra la respuesta del campo erroneo
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
                            <legend>Text</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="text" id="texto" name="texto" value="<?php print(!empty($_REQUEST["texto"]) ? $_REQUEST["texto"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["texto"]) ? $aErrores["texto"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Radio</legend>
                            <table>
                                <tr>
                                    <td>
                                        <?php
                                            $i = 1;
                                            foreach ($aRadio as $clave => $valor) {
                                                $seleccion = isset($_REQUEST["rad"]) && $_REQUEST["rad"]==$clave ? "checked":"";
                                                print(<<<FIN
                                                    <div>
                                                        <input class="obligatorio" type="radio" id="rad$i" name="rad" value="$clave" $seleccion>
                                                        <label for="rad$i">$valor</label>
                                                    </div>
                                                FIN);
                                            }
                                            unset($i);
                                        ?>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["rad"]) ? $aErrores["rad"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Checkbox</legend>
                            <table>
                                <tr>
                                    <td>
                                        <?php
                                            foreach ($aCheckbox as $clave => $valor) {
                                                $seleccion = isset($_REQUEST[$clave]) ? "checked":"";
                                                print(<<<FIN
                                                    <input class="obligatorio" type="checkbox" id="$clave" name="$clave" $seleccion>
                                                    <label for="$clave">$valor</label>
                                                FIN);
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["check"]) ? $aErrores["check"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Tel</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input type="tel" name="tlfno" id="tlfno" value="<?php print(!empty($_REQUEST["tlfno"]) ? $_REQUEST["tlfno"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["tlfno"]) ? $aErrores["tlfno"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Date</legend>
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
                            <legend>Time</legend>
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
                            <legend>Range</legend>
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
                                        <select class="obligatorio" name="seleccion" id="seleccion">
                                            <option value=""></option>
                                            <?php
                                                $i = 1;
                                                foreach ($aSeleccion as $clave => $valor) {
                                                    $selected = !empty($_REQUEST["seleccion"]) && $_REQUEST["seleccion"]=="$clave" ? "selected":"";
                                                    print(<<<FIN
                                                        <option value="$clave" $selected>$valor</option>
                                                    FIN);
                                                }
                                                unset($i);
                                            ?>
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
                                        <textarea name="textarea" id="textarea"><?php print(!empty($_REQUEST["textarea"]) ? $_REQUEST["textarea"]:""); ?></textarea>
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["textarea"]) ? $aErrores["textarea"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Search</legend>
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
                            <legend>Url</legend>
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
                            <legend>Email</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="email" id="correo" name="correo" value="<?php print(!empty($_REQUEST["correo"]) ? $_REQUEST["correo"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["correo"]) ? $aErrores["correo"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Password</legend>
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
                            <legend>Number</legend>
                            <table>
                                <tr>
                                    <td>
                                        <input class="obligatorio" type="number" name="numero" id="numero" value="<?php print(!empty($_REQUEST["numero"]) ? $_REQUEST["numero"]:""); ?>">
                                    </td>
                                    <td>
                                        <p class="error"><?php print(!is_null($aErrores["numero"]) ? $aErrores["numero"]:""); ?></p>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>File</legend>
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
                            <legend>Color</legend>
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