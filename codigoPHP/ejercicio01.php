<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Ejercicio01</title>
    </head>
    <body>
        <header>
            <h2>Inicializar variables de tipos básicos y mostrar datos por pantalla</h2>
        </header>
        <main>
            <?php
                $bBooleano = true;
                $iEntero = 4;
                $dDecimal = 3.5;
                $sCadena = "abcd";
                $aVector = array($bBooleano, $iEntero, $dDecimal, $sCadena);

                print("<h3>Función echo</h3>");
                echo('La variable <i>$bBooleano</i> es de tipo '.gettype($bBooleano)." y tiene el valor <b>$bBooleano</b><br>");
                echo('La variable <i>$iEntero</i> es de tipo '.gettype($iEntero)." y tiene el valor <b>$iEntero</b><br>");
                echo('La variable <i>$dDecimal</i> es de tipo '.gettype($dDecimal)." y tiene el valor <b>$dDecimal</b><br>");
                echo('La variable <i>$sCadena</i> es de tipo '.gettype($sCadena)." y tiene el valor <b>$sCadena</b>");

                print("<h3>Función print</h3>");
                print('La variable <i>$bBooleano</i> es de tipo '.gettype($bBooleano)." y tiene el valor <b>$bBooleano</b><br>");
                print('La variable <i>$iEntero</i> es de tipo '.gettype($iEntero)." y tiene el valor <b>$iEntero</b><br>");
                print('La variable <i>$dDecimal</i> es de tipo '.gettype($dDecimal)." y tiene el valor <b>$dDecimal</b><br>");
                print('La variable <i>$sCadena</i> es de tipo '.gettype($sCadena)." y tiene el valor <b>$sCadena</b>");

                print("<h3>Función printf</h3>");
                printf('La variable <i>%s</i> es de tipo %s y tiene el valor <b>%b</b><br>', '$bBooleano', gettype($bBooleano), $bBooleano);
                printf('La variable <i>%s</i> es de tipo %s y tiene el valor <b>%d</b><br>', '$iEntero', gettype($iEntero), $iEntero);
                printf('La variable <i>%s</i> es de tipo %s y tiene el valor <b>%.2f</b><br>', '$dDecimal', gettype($dDecimal), $dDecimal);
                printf('La variable <i>%s</i> es de tipo %s y tiene el valor <b>%s</b><br>', '$sCadena', gettype($sCadena), $sCadena);

                print("<h3>Función print_r</h3>");
                print_r($bBooleano);
                print("<br>");
                print_r($iEntero);
                print("<br>");
                print_r($dDecimal);
                print("<br>");
                print_r($sCadena);
                print("<br>");
                print_r($aVector);
                
                print("<h3>Función var_dump</h3>");
                var_dump($bBooleano);
                print("<br>");
                var_dump($iEntero);
                print("<br>");
                var_dump($dDecimal);
                print("<br>");
                var_dump($sCadena);
                print("<br>");
                var_dump($aVector);
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
        </footer>
    </body>
</html>