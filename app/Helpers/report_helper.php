<?php

namespace App\helpers;

use PDF;

if (!function_exists('generate_pdf')) {
    /**
     * genera nuevo reporte en base a datos y vistas
     * @param $data
     * @param $view
     * @param $filename
     * @return mixed
     */
    function generate_pdf($data, $view, $filename): mixed
    {
        $pdf = PDF::loadView($view, $data);
        return $pdf->download($filename);
    }
}
