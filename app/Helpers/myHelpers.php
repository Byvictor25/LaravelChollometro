<?php
function fechaActual(string $formato): string {
    $fechaActual = new DateTime();
    return $fechaActual->format($formato);
}
