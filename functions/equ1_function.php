<?php
    function equ1($number_a, $number_b) {
        if ($number_a == 0) {
            return "O coeficiente 'a' não pode ser zero.";
        }
        return -$number_b / $number_a;
    }
?>