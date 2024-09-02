<?php
    function equ2($number_a, $number_b, $number_c) {
        if ($number_a == 0) {
            echo "O coeficiente 'a' não pode ser zero.";
        }
        
        $delta = $number_b**2 - 4*$number_a*$number_c;

        if($delta > 0) {
            $x1 = ($number_b + sqrt($delta)) / (2*$number_a);
            $x2 = ($number_b - sqrt($delta) / (2*$number_a));
            echo "Raízes distintas: x1 = {$x1}"  . " e x2 = {$x2}";
        } elseif ($delta == 0) {
            $x = -$number_b / (2*$number_a);
            return "Raiz única: x = {$x}" ;
        } else {
            return "Não há raízes reais.";
        }
    }
?>