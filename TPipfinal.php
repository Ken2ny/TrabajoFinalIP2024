<?php

// Módulo que realiza una carga automática de la matriz
function cargarMatrizAuto() {
    $matriz = [
        2014 => [30, 28, 26, 22, 18, 12, 10, 14, 17, 20, 25, 29],
        2015 => [33, 30, 27, 22, 19, 13, 11, 15, 18, 21, 26, 31],
        2016 => [34, 32, 29, 21, 18, 14, 12, 16, 18, 21, 27, 32],
        2017 => [33, 31, 28, 22, 18, 13, 11, 14, 17, 22, 26, 31],
        2018 => [32, 30, 28, 22, 17, 12, 9, 13, 16, 20, 24, 30],
        2019 => [32, 30, 27, 23, 19, 14, 12, 11, 17, 23, 25, 29],
        2020 => [31, 29, 28, 21, 19, 13, 10, 12, 16, 22, 27, 29],
        2021 => [30, 28, 26, 20, 16, 12, 11, 13, 17, 21, 28, 30],
        2022 => [31, 29, 27, 21, 17, 12, 11, 15, 18, 22, 26, 30],
        2023 => [32, 30, 27, 20, 16, 13, 13, 15, 19, 23, 28, 31],
    ];
    return $matriz; // Retorna carga automática
}

 // Módulo que realiza una carga manual de la matriz
function cargarMatrizManual() {
    $matriz = [];
    $meses = [
        0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio",
        6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre",
    ];
    // PARA: pasa por año y por mes, pidiendo una temperatura por cada año y mes
    for ($anio = 2014; $anio <= 2023; $anio++) {
        for ($mes = 0; $mes <= 11; $mes++) {
            echo "Ingrese la temperatura del año: " . $anio . " del mes de: " . $meses[$mes] . ": ";
            $temp = trim(fgets(STDIN));
            $matriz[$anio][$mes] = $temp;
        }
    }
    return $matriz; // Retorna carga manual
}
// Función que muestra el contenido de la matriz por filas y columnas.
function mostrarMatrizCompleta($matriz) {
    echo "Año  ENE   FEB   MAR   ABR   MAY   JUN   JUL   AGO   SEP   OCT   NOV   DIC \n"; // Imprime un texto con el año y los meses
    for ($anio = 2014; $anio <= 2023; $anio++) {        // PARA: pasa por año, escribiendo en fila año por año
        echo $anio . " ";
        for ($mes = 0; $mes <= 11; $mes++) {           // PARA: pasa por mes, escribiendo la temperatura
            echo $matriz[$anio][$mes] . "°C" . "  ";
        }
        echo "\n";
    }
 }

// Función que muestra una temperatura dado un mes y un año
function mostrarTempAnioMes($matriz, $anio, $mes, $meses) {
    if ($anio >= 2014 && $anio <= 2023) {                                                        //Pasa por todos los años
        if ($mes >= 0 && $mes <= 11) {                                                              // Valida si el mes está entre 0 y 11
            echo "La temperatura del año " . $anio . " del mes " . $meses[$mes] . " es: " . $matriz[$anio][$mes] . "°C\n";     // Imprime la salida
        } else {
            echo "Mes no válido";
        }
    } else {
        echo "Año no válido";
    }
}
// Funcion que muestra la temperatura de un anho entero
function mostrarTempAnio($matriz, $anio){
    if ($anio >= 2014 && $anio <= 2023) {
        echo "La temperatura de todo el año: " . $anio . "\n";
        echo "ENE   FEB   MAR   ABR   MAY   JUN   JUL   AGO   SEP   OCT   NOV   DIC \n";
        for ($mes = 0; $mes <= 11; $mes++) {
            echo $matriz[$anio][$mes] . "°C" . "  ";
        }
    } else {
        echo "Año no válido \n";
    }
    echo "\n";
}
// Funcion que muestra la temperatura de un mismo mes en diferente anho
function mostrarTempMes($mes, $matriz, $meses) {
    if ($mes >= 0 && $mes <= 11) {
        for ($anio = 2014; $anio <= 2023; $anio++) {
            echo "La temperatura en " . $anio . " de: " . $meses[$mes] . " es: " . $matriz[$anio][$mes] . "°C\n";
        }
    } else {
        echo "Mes no válido";
    }
}
// Funcion calcula el promedio de temperatura
function calcularPromedio($mes, $matriz){
    $promedio = 0;
    $totalDecada = 0;
    if ($mes >= 0 && $mes <= 11) {
        for ($anio = 2014; $anio <= 2023; $anio++) {
            $totalDecada += $matriz[$anio][$mes];
        }
        $promedio = $totalDecada / 10;
    }

    return $promedio;
}
// Funcion para calcular la Max y Min temperatura de cada mes y cada anho
function hallarMaxMin($matriz, $meses) {
    for ($anio = 2014; $anio <= 2023; $anio++) {
    $maxTemp = -99999;
    $minTemp = 99999;
    $mesMax = " ";             //
    $mesMin = " ";             //
        
    for ($mes = 0; $mes <= 11; $mes++) {
        if ($matriz[$anio][$mes] < $minTemp) {
        $minTemp = $matriz[$anio][$mes];
        $mesMin = $meses[$mes];
        }
        if ($matriz[$anio][$mes] > $maxTemp) {
        $maxTemp = $matriz[$anio][$mes];
        $mesMax = $meses[$mes];
        }    
    }
    echo "||||| Año: " . $anio . " ||||| \n";
    echo "Temperatura Maxima \n";
    echo "Mes: " . $mesMax . "\n";
    echo "TempMax: " . $maxTemp . "°C\n";
    echo "Temperatura Minima \n";
    echo "Mes: " . $mesMin . "\n";
    echo "TempMin: " . $minTemp . "°C\n";
    echo "\n";
    }
}
// Funcion Mostrar datos de primavera
function mostrarPrimavera($matriz, $meses) {
    $primavera = cargarDatosPrimavera($matriz, $meses);
    echo "Temperaturas en primavera: " . "\n";
    echo "Año  OCT   NOV   DIC \n";
        for ($anio = 2014; $anio <= 2023; $anio++) {
        echo $anio . " ";
            for ($mes = 9; $mes <= 11; $mes++) {
            echo $primavera[$anio][$mes] . "°C" . "  ";
        }
    echo "\n";
    }
}
// Funcion para cargar los datos de primavera
function cargarDatosPrimavera($matriz) {
    $primavera = [];
    for ($anio = 2014; $anio <= 2023; $anio++) {
        for ($mes = 9; $mes <= 11; $mes++) { 
        $primavera[$anio][$mes] = $matriz[$anio][$mes];    //Asinamos el valor que viene de la matriz a primavera para usarlo en opcion 8
        }
    }
    return $primavera;
}
// Funcion Mostrar datos de invierno
function mostrarInvierno($matriz,$meses){
    $invierno = cargarDatosInvierno($matriz, $meses);
    echo "Temperaturas en invierno: " . "\n";
    echo "Año  JUL   AGO   SEP " . "\n";
    for ($anio = 2019; $anio <= 2023; $anio++) {
    echo $anio . " ";
        for ($mes = 6; $mes <= 8; $mes++) {
        echo $invierno[$anio][$mes] . "°C" . "  ";
    }
    echo "\n";
    }
}
// Funcion para cargar los datos de invierno
function cargarDatosInvierno($matriz) {
    $invierno = [];
    for ($anio = 2019; $anio <= 2023; $anio++) {
        for ($mes = 6; $mes <= 8; $mes++) { 
        $invierno[$anio][$mes] = $matriz[$anio][$mes];   //Asignamos el valor que viene de la matriz a invierno para usarlo en opcion 9
        }
    }
    return $invierno;
}

// MODULO MOSTRAR MATRIZ ASOCIATIVA
function mostrarMatrizAsociativa($matriz) { 
$asociativa = cargarMatrizAsociativa($matriz);    //Se llama al modulo
        echo "Matriz Completa: \n";
        echo "Año  ENE   FEB   MAR   ABR   MAY   JUN   JUL   AGO   SEP   OCT   NOV   DIC \n"; //Se imprime la matriz completa en pantalla
        for ($anio = 2014; $anio <= 2023; $anio++) {                                        //Pasa por todos los anhos
        echo $anio . " ";                                                                   //Imprime el anho
            for ($mes = 0; $mes <= 11; $mes++){                                            //Pasa por todos los meses
            echo $asociativa["completa"][$anio][$mes]."°C" . "  ";                         //Imprime las temperaturas
            }
        echo "\n"; //Salto de linea
        }
        echo "Matriz Primavera: " . "\n";
        echo "Año  OCT   NOV   DIC \n";
        for ($anio = 2014; $anio <= 2023; $anio++){                             //Pasa por todos los anhos
        echo $anio . " ";                                                       //Imprime el anho
            for ($mes = 9; $mes <= 11; $mes++) {                               //Pasa por los meses OCT-NOV-DIC
            echo $asociativa["Primavera"][$anio][$mes]."°C" . "  ";            //Imprime las temperaturas
            }
        echo "\n"; //Salto de linea
        }
        
        echo "Matriz invierno: " . "\n";
        echo "Año  JUL   AGOS  SEP " . "\n";
        for ($anio = 2019; $anio <= 2023; $anio++){                           //Pasa por todos los anhos
        echo $anio . " ";                                                     //Imprime el anho
            for ($mes = 6; $mes <= 8 ; $mes++){                               //Pasa por los meses JUL-AGOS-SEP
            echo $asociativa["Invierno"][$anio][$mes]."°C" . "  ";            //Imprime las temperaturas
            }
        echo "\n"; //Salto de linea
        }
    }
//MODULO CARGAR MATRIZ ASOCIATIVA
function cargarMatrizAsociativa($matriz) {
$primavera = cargarDatosPrimavera($matriz);   //Cargamos primavera
$invierno = cargarDatosInvierno($matriz);     //Cargamos Invierno
$asociativa = [
        "completa" => $matriz,            
        "Primavera" => $primavera,        
        "Invierno" => $invierno         
    ];
return $asociativa; //Retornamos para que lo cargado se guarde en Asociativa
}

    
$matriz = [];
// Nombre de los meses
$meses = [
   0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio",
   6 => "Julio", 7 => "Agosto", 8 => "septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre",
];

do {
    
    echo "MENU DE OPCIONES \n";
    echo "1. Cargar Datos Automaticamente \n";
    echo "2. Cargar Datos Manualmente \n"; 
    echo "3. Mostrar el contenido de matriz \n"; 
    echo "4. Mostrar la temperatura de un anho y mes especifico \n"; 
    echo "5. Mostrar la temperatura de todo un anho \n"; 
    echo "6. Mostrar las temperaturas de un mes de cada anho y el promedio \n";
    echo "7. Mostrar la minima y maxima temperatura, anho y mes \n";
    echo "8. Mostrar matriz de primavera(oct-nov-dic) de todos los años \n";
    echo "9. Mostrar matriz de invierno últimos 5 años de invierno (jul-ago-sep) \n";
    echo "10. Mostrar matriz asociativa \n";
    echo "0. Salir \n";
    
    echo "\n";
    echo "Ingrese opcion(0-10): ";
    $opcion = trim(fgets(STDIN));
    
    switch($opcion) {
   
    case 1:
        $matriz = cargarMatrizAuto();
        echo "Datos Automaticos Cargados \n";
        break;
    case 2:
        $matriz = cargarMatrizManual($meses);
        echo "Datos Manuales Cargados \n";
        break;
    case 3:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
         break;
        } else { 
        mostrarMatrizCompleta($matriz);
        break;
        }
    case 4:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Ingrese el año (2014-2023): ";
        $anio = trim(fgets(STDIN));
        echo "Ingrese el mes (1-12): ";
        $mes = trim(fgets(STDIN)) - 1;
        echo "Cargando...... \n";
        mostrarTempAnioMes($matriz, $anio, $mes, $meses);
        break;
        }
    case 5:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Ingrese el año (2014-2023): ";
        $anio = trim(fgets(STDIN));
        echo "Cargando...... \n";
        mostrarTempAnio($matriz,$anio);
        break;
        }
    case 6:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Ingrese el mes (1-12): ";
        $mes = trim(fgets(STDIN)) - 1;
        echo "Cargando...... \n";
        mostrarTempMes($mes,$matriz,$meses);
        $promedio = calcularPromedio($mes, $matriz);
        echo "El promedio de: " . $meses[$mes] . " es " . $promedio . "°C \n";
        break;
        }  
    case 7:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Cargando...... \n";
        hallarMaxMin($matriz, $meses);
        break;
        }
    case 8:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Cargando...... \n";    
        mostrarPrimavera($matriz, $meses);
        break;
        }
    case 9:
        if (count($matriz)== 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Cargando...... \n";
        mostrarInvierno($matriz,$meses);
        break;
        }
    case 10:
        if (count($matriz) == 0) {
        echo "Datos no cargados \n";
        break;
        } else {
        echo "Cargando...... \n";
        mostrarMatrizAsociativa($matriz);
        break;
        }       
    case 0:
        $opcion = 0;    // Si eligen opcion 0, se termina el repetir
        echo "Fin programa. \n";
        break;
    default:
        echo "opcion no valida \n";
        break; 
    }
    //Do while / Repetir
    } while ($opcion != 0);
    

