<?php
function div($number_a, $number_b, $number_c) {
    if ($number_a == 0 || $number_b == 0 || $number_c == 0) {
        echo"Erro: Divisão por zero não permitida.";
       
    }
    return ($number_a) / ($number_b) / ($number_c);
}
?>