<?php

/*
Dado el string A56B455VB23GTY23J 
Eliminar todos los caracteres
Extraer cada número que esté comprendido entre dichos caracteres y añadirlo a un array
El array debe contener valores únicos y deberá estar ordenado de menor a mayor.
la salida del código será la siguiente
Array ( [0] => 23 [1] => 56 [2] => 455 )

Debes medir el tiempo que tarda en ejecutarse la llamada, hay que implementar el método intentando obtener el máximo performance posible.
Indicar la complejidad según Big-io
El código debe implementar la misma lógica para cualquier otro String
*/

print_r(ExtractNumbers::getNumbers('A56B455VB23GTY23J'));

class ExtractNumbers
{
	// PRIMER INTENTO
	/*
    public static function getNumbers($string)
    {
		$numeros=array();
		for( $index = 0; $index < strlen($string); $index++ )
		{
			if( is_numeric($string[$index]) ) 	// Si es numerico con dicha función
			{
				$numeros[] .= $string[$index];	// Voy añadiendo
			}
		}  
		echo $numeros;
    }
	*/
	
	/*
	* Buscado por internet para devolver en momento actual en milisegundos para calcular el tiempo que se pide 
	*/
	static function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

	/*
	* Extraer y añadir al array
	*/	
    public static function getNumbers($string)
    {
        $inicioTiempo = ExtractNumbers::microtime_float();	// iniciar el tiempo de la función que he encontrado por internet
        $array = array();					// inicializar el array nuevo para usarlo
        $string = str_split($string);		// convertimos el string en array	
        foreach ($string as $key => $value) { // lo recorremos con un bucle FOREACH
            if(is_numeric($value)){			// comprobamos si el valor es un numero con la funcion encontra de is_numeric
                $array[] = $value;			// entonces si lo es, es decir, es numero lo introducimos en el arraay
            }
        }
        $finTiempo = ExtractNumbers::microtime_float();	// fin al tiempo para ver lo que tarda

        $resultadoTiempo = ($finTiempo - $inicioTiempo) * 1000; //TIEMPO QUE TARDA EN EJECUTAR LA LLAMADA.
        return $array;
    }


}