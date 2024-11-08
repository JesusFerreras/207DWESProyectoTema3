<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio27</title>
    </head>
    <body>
        <header>
            <h2>Utilización de la plantilla de formularios</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/24
             * @version 2024/10/24
             */
            
            require_once '../core/231018libreriaValidacion.php';
            
                //Indica si el formulario entero es valido
                $entradaOK = true;
                //Array donde se recogen los mensajes de error
                $aErrores = [
                    "nombre" => null,
                    "nacimiento" => null,
                    "estado" => null,
                    "numero" => null,
                    "vacaciones" => null,
                    "descripcion" => null
                ];
                //Array donde se recogen las respuestas con el formulario valido
                $aRespuestas = [
                    "nombre" => null,
                    "nacimiento" => null,
                    "estado" => null,
                    "numero" => null,
                    "vacaciones" => null,
                    "descripcion" => null
                ];
                
                //Guarda la fecha actual
                $oFechaActual = new DateTime("now");
                
                //Guarda las posibles respuestas para 'Estado'
                $aEstado = [
                    "estado1" => "Muy mal",
                    "estado2" => "Mal",
                    "estado3" => "Regular",
                    "estado4" => "Bien",
                    "estado5" => "Muy bien",
                ];
                
                //Guarda las posibles respuestas para 'Vacaciones'
                $aVacaciones = [
                    "vacaciones1" => "Ni idea",
                    "vacaciones2" => "Con la familia",
                    "vacaciones3" => "De fiesta",
                    "vacaciones4" => "Trabajando",
                    "vacaciones5" => "Estudiando DWES"
                ];
                
                //Si se ha enviado un formulario antes
                if (isset($_REQUEST["submit"])) {
                    //Se rellena el array de errores con los mensajes de error
                    $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST["nombre"], 10, 2, 1);
                    $aErrores["nacimiento"] = validacionFormularios::validarFecha($_REQUEST["nacimiento"], $oFechaActual->format('Y-m-d'));
                    $aErrores["estado"] = !isset($_REQUEST["estado"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["numero"] = validacionFormularios::comprobarEntero($_REQUEST["numero"], 10, 0, 1);
                    $aErrores["vacaciones"] = empty($_REQUEST["vacaciones"]) ? "Se debe escoger una opcion" : null;
                    $aErrores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["descripcion"], 1000, 1, 1);
                    
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
                        <table>
                            <tr>
                                <td>
                                    <label for="nombre">Nombre y apellidos del alumno:</label>
                                    <input class="obligatorio" type="text" id="nombre" name="nombre" value="<?php print(!empty($_REQUEST["nombre"]) ? $_REQUEST["nombre"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["nombre"]) ? $aErrores["nombre"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <label for="fecha">Fecha de nacimiento:</label>
                                    <input class="obligatorio" type="date" name="nacimiento" id="nacimiento" value="<?php print(!empty($_REQUEST["nacimiento"]) ? $_REQUEST["nacimiento"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["nacimiento"]) ? $aErrores["nacimiento"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <?php
                                        $i = 1;
                                        foreach ($aEstado as $clave => $valor) {
                                            $seleccion = isset($_REQUEST["estado"]) && $_REQUEST["estado"]==$clave ? "checked":"";
                                            print(<<<FIN
                                                <div>
                                                    <input class="obligatorio" type="radio" id="estado$i" name="estado" value="$clave" $seleccion>
                                                    <label for="rad$i">$valor</label>
                                                </div>
                                            FIN);
                                            $i++;
                                        }
                                        unset($i);
                                    ?>
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["estado"]) ? $aErrores["estado"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <label for="numero">¿Cómo va el curso? [0-10]</label>
                                    <input class="obligatorio" type="number" name="numero" id="numero" value="<?php print(!empty($_REQUEST["numero"]) ? $_REQUEST["numero"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["numero"]) ? $aErrores["numero"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <label for="vacaciones">¿Cómo se presentan las vacaciones de Navidad?</label>
                                    <select class="obligatorio" name="vacaciones" id="vacaciones">
                                        <option value=""></option>
                                        <?php
                                            foreach ($aVacaciones as $clave => $valor) {
                                                $seleccion = !empty($_REQUEST["vacaciones"]) && $_REQUEST["vacaciones"]=="$clave" ? "selected":"";
                                                print(<<<FIN
                                                    <option value="$clave" $seleccion>$valor</option>
                                                FIN);
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["vacaciones"]) ? $aErrores["vacaciones"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <p>Describe brevemente tu estado de ánimo</p>
                                    <textarea class="obligatorio" name="descripcion" id="descripcion"><?php print(!empty($_REQUEST["descripcion"]) ? $_REQUEST["descripcion"]:""); ?></textarea>
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["descripcion"]) ? $aErrores["descripcion"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" id="submit" name="submit">
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