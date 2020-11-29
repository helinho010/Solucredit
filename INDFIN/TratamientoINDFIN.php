<?php
    $contenidoArchivoIndFinOrigianl = fopen('/home/hacker/Documentos/titles/30.05.2020.txt', 'r+') or die("Error al abrir el archivo");
    $nuevoArchivoIndFin = fopen("/home/hacker/Escritorio/nuevoArchivo.txt", "r+") or die ("Error de apertura");
    
    $uno = "COOP. DE A. Y C. SOLUCREDIT LTDA.";
    $dos = "BALANCE DE SUMAS Y SALDOS";
    $tres = "Expresado en:";
    $cuatro = "Agencia: CONSOLIDADO";
    $cinco = "------------------------------------------------------------------------------------------------------------------------------------";
    $seis = "====";

    while(!feof($contenidoArchivoIndFinOrigianl))
    {
        $linea = fgets($contenidoArchivoIndFinOrigianl);
            if (!(preg_match("/$uno/i", $linea) == 1 || preg_match("/$dos/i", $linea) == 1 || preg_match("/$tres/i", $linea) == 1 || preg_match("/$cuatro/i", $linea) == 1 ||  preg_match("/$cinco/i", $linea) == 1 || preg_match("/$seis/i", $linea) == 1)) 
            {
                $linea = trim($linea);                
                $datoPrimeraColumna = substr($linea, 0, strpos($linea," "));
                $datoUltimaColumna = substr($linea, strripos($linea, " "), strlen($linea));
                if ($datoPrimeraColumna == "" && $datoUltimaColumna == "" ) {
                    # code...
                }
                else {
                    $datoFinal = $datoPrimeraColumna." | ".$datoUltimaColumna;
                }
                fwrite($nuevoArchivoIndFin,$datoFinal);
                fwrite($nuevoArchivoIndFin,PHP_EOL);
            }
    }

    fclose($contenidoArchivoIndFinOrigianl);
    fclose($nuevoArchivoIndFin);
?>