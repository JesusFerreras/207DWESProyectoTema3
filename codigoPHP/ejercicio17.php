<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio17</title>
    </head>
    <body>
        <header>
            <h2>Crear, inicializar y recorrer un array bidimensional</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/07
             */
                //Array con todos los asientos
                $aAsientos;
                //Numero de columnas de $aAsientos
                $iColumnas = 20;
                //Numero de filas de $aAsientos
                $iFilas = 15;
                //Numero maximo de asientos a llenar
                $iPuestosMax = 5;
                
                //Rellena $aAsientos con hasta $iPuestosMax puestos de forma aleatoria
                for ($i = 0; $i < $iPuestosMax; $i++) {
                    $aAsientos[rand(0,$iFilas-1)][rand(0,$iColumnas-1)] = $i;
                }
                
                //Muestra por pantalla la distribucion de $aAsientos
                for ($i = 0; $i < $iFilas; $i++) {
                    for ($j = 0; $j < $iColumnas; $j++) {
                        if (isset($aAsientos[$i][$j])) {
                            print($aAsientos[$i][$j]." ");
                        } else {
                            print("- ");
                        }
                    }
                    print("<br>");
                }
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>