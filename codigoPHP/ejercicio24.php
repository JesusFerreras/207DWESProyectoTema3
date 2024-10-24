<!doctype html>
<html>
    <head>
        <title>Ejercicio24</title>
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

            [readonly] {
                background-color: lightgray;
                color: #606060;
            }

            input.obligatorio {
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
             * @since 2024/10/09
             * @version 2024/10/24
             */
            
            require_once '../core/231018libreriaValidacion.php';
            
                //Indica si el formulario entero es valido
                $entradaOK = true;
                //Array donde se recogen los mensajes de error
                $aErrores = [
                    "texto" => null,
                    "textoObligatorio" => null,
                    "textoBloqueado" => null,
                    "fecha" => null,
                    "numero" => null
                ];
                //Array donde se recogen las respuestas con el formulario valido
                $aRespuestas = [
                    "texto" => null,
                    "textoObligatorio" => null,
                    "textoBloqueado" => null,
                    "fecha" => null,
                    "numero" => null
                ];
                
                //Si se ha enviado un formulario antes
                if (isset($_REQUEST["submit"])) {
                    //Se rellena el array de errores con los mensajes de error
                    $aErrores["texto"] = validacionFormularios::comprobarAlfabetico($_REQUEST["texto"], 10, 1);
                    $aErrores["textoObligatorio"] = validacionFormularios::comprobarAlfabetico($_REQUEST["textoObligatorio"],20 ,2 , 1);
                    $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST["fecha"], '01/01/2200', '01/01/1900');
                    $aErrores["numero"] = validacionFormularios::comprobarEntero($_REQUEST["numero"], 50, 0);
                    
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
                    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
                        <table>
                            <tr>
                                <td>
                                    <label for="texto">Texto</label>
                                    <input type="text" id="texto" name="texto" value="<?php print(!empty($_REQUEST["texto"]) ? $_REQUEST["texto"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["texto"]) ? $aErrores["texto"]:""); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="textoObligatorio">Texto Obligatorio</label>
                                    <input class="obligatorio" type="text" id="textoObligatorio" name="textoObligatorio" value="<?php print(!empty($_REQUEST["textoObligatorio"]) ? $_REQUEST["textoObligatorio"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["textoObligatorio"]) ? $aErrores["textoObligatorio"]:""); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="textoBloqueado">Texto Bloqueado</label>
                                    <input readonly type="text" id="textoBloqueado" name="textoBloqueado" value="Texto Bloqueado">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["textoBloqueado"]) ? $aErrores["textoBloqueado"]:""); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="fecha">Fecha</label>
                                    <input type="date" name="fecha" id="fecha" value="<?php print(!empty($_REQUEST["fecha"]) ? $_REQUEST["fecha"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["fecha"]) ? $aErrores["fecha"]:""); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="numero">Numero</label>
                                    <input type="number" name="numero" id="numero" value="<?php print(!empty($_REQUEST["numero"]) ? $_REQUEST["numero"]:""); ?>">
                                </td>
                                <td>
                                    <p class="error"><?php print(!is_null($aErrores["numero"]) ? $aErrores["numero"]:""); ?></p>
                                </td>
                            </tr>
                        </table>
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