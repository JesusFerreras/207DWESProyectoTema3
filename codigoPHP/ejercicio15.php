<!doctype html>
<html>
    <head>
        <title>Ejercicio15</title>
    </head>
    <body>
        <header>
            <h2>Crear, inicializar y recorrer un array</h2>
        </header>
        <main>
            <?php
            /**
             * @author Jesus Ferreras
             * @since 2024/10/03
             */
            
                //Guarda el sueldo asociado a cada dia
                $aSueldoDiario = [
                    'Lunes' => 1,
                    'Martes' => 2,
                    'Miercoles' => 3,
                    'Jueves' => 4,
                    'Viernes' => 5,
                    'Sabado' => 6,
                    'Domingo' => 7,
                ];
                //Acumula el sueldo de cada dia
                $dSueldoTotal = 0;
                
                foreach ($aSueldoDiario as $clave => $valor) {
                    print("Sueldo del $clave: $valor €<br>");
                    $dSueldoTotal += $valor;
                }
                print("Sueldo total: $dSueldoTotal €");
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