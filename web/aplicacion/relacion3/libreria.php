<?php

/**
 * Esta función se le pasan cuatro parámetros: un array, una cadena y dos
    números. La función se encargará de añadir en el array el primer número a la posición asociativa
    indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se
    salga de la función. Además, cada vez que se llama a la función, se devuelve en el segundo número
    un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda
    llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe
    dar error si se indica como posición“2daw”o “primera”) * 
 * @param array $vector
 * @param string $cadena
 * @param int $numero1
 * @param int $numero2
 * @return bool
 */
function cuentaVeces(array &$vector, string $cadena, int $numero1, int &$numero2): bool{
    
    if($cadena=='2daw' || $cadena=='primera'){
        return false;
    }

    $vector[$cadena] = $numero1;
    
    $numero2++;

    return true;
}

/**
 * 2.- Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se 
        encarga  de  devolver  una  cadena  de  longitud  la  indicada  cuyos  caracteres  son  generados  de  forma 
        aleatoria  (caracteres  válidos:  letras  mayúsculas,  minúsculas  y  números).  Devolverá  false  si  se  ha 
        indicado un número negativo o igual a 0
 * @param mixed $par
 * @return bool|string
 */
function generarCadena($par=10){
    $array1 = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
    'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
];
    $cadena="";
    if($par<=0){
        return false;
    }else{
        for($i=0; $i<$par; $i++){
            $pos = array_rand($array1);
            $cadena.=$array1[$pos];
        }
    }
    return $cadena;
    
}

/**
 * 3.-  Función  operaciones().  Esta  función  recibe  al  menos  tres  parámetros.  El  primero  (entero)  es  el 
        tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser 1, suma todos los operandos 2, al primer operando se restan el resto 3, multiplicación de todos los operandos. En cualquier otro caso se suman los operandos que ocupan las posiciones pares  y se restan 
        los de las posiciones impares (el primer operando es 1). 
 * @param int $tipo
 * @param float[] $operandos
 * @return float|int
 */
function operaciones(int $tipo, float ...$operandos){
    switch ($tipo) {
        case 1: // Suma
            return array_sum($operandos);
            break;
        case 2: 
            $resultado = $operandos[0];
            for($i=1; $i<count($operandos); $i++) {
                $resultado-=$operandos[$i];
            }
            return $resultado;
            break;
        case 3: $resultado = 1;
            foreach ($operandos as $valor) {
                $resultado *= $valor;
            }
            return $resultado;
        default:
            // suma posiciones pares y resta impares
            $resultado = 0;

            for ($i = 0; $i < count($operandos); $i++) {
                if (($i + 1) % 2 == 0) { // posición par
                    $resultado += $operandos[$i];
                } else { // posición impar
                    $resultado -= $operandos[$i];
                }
            }

            return $resultado;
    }
}
