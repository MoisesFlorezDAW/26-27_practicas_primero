<?php

/**
 * Funcion que devuelve un numero
 * Si el numero es menor de 10 se dara un error
 * 
 * @param int $num Numero al que aplicar el doble
 * @return bool devuelve el doble del argumento o false en caso de error
 */


/**
 * Funcion que devuelve un numero
 * Si el numero es menor de 10 se dara un error
 * 
 * @param int $num Numero al que aplicar el doble
 * @return bool|int devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false
{
    //$num es menor de 10, consideramos que hay un error
    if ($num < 10)
        return false;
    return 2 * $num;
}
