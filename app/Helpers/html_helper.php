<?php

namespace App\Helpers;

if(!function_exists("isSelected")){
    /**
     * Identifica si el elemento de la iteracion a sido seleccionado en el modelo
     * @param $corriente
     * @param $actual
     * @return string|null
     */
    function isSelected($corriente, $actual): ?string
    {
        return $corriente == $actual ? "selected" : null;
    }
}
