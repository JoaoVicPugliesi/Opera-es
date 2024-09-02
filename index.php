<?php
  session_start();
  require_once('functions/soma_function.php');
  require_once('functions/sub_function.php');
  require_once('functions/mult_function.php');
  require_once('functions/div_function.php');
  require_once('functions/equ1_function.php');
  require_once('functions/equ2_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhaskara</title>
    <link rel="stylesheet" href="styles/index.css" type="text/css">
</head>
<body>
    <form class="form" action="index.php" method="post">
        <div class="user_numbers">
        <label for="choice" class="user_label">Escolha o número para A: </label>
        <input class="input_number" type="text" name="number_a" placeholder="a">
        </div>
        <div class="user_numbers">
        <label for="choice" class="user_label">Escolha o número para B: </label>
        <input class="input_number" type="text" name="number_b" placeholder="b">
        </div>
        <div class="user_numbers">
        <label for="choice" class="user_label">Escolha o número para C: </label>
        <input class="input_number" type="text" name="number_c" placeholder="c">
        </div>
       
        <div class="choices">
        <div class="operation">
        <label for="choice" class="operation_label">Soma</label>
        <input type="radio" name="operation" value="soma">
        </div>
        <div class="operation">
        <label for="choice" class="operation_label">Sub</label>
        <input type="radio" name="operation" value="sub">
        </div>
        <div class="operation">
        <label for="choice" class="operation_label">Mult</label>
        <input type="radio" name="operation" value="mult">
        </div>
        <div class="operation">
        <label for="choice" class="operation_label">Div</label>
        <input type="radio" name="operation" value="div">
        </div>
        <div class="operation">
        <label for="choice" class="operation_label">Equação 1°</label>
        <input type="radio" name="operation" value="equação_1°">
        </div>
        <div class="operation">
        <label for="choice" class="operation_label">Equação 2°</label>
        <input type="radio" name="operation" value="equação_2°">
        </div>
        </div>
        <input class="button" type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>

<?php

    if(isset($_POST["submit"])) {

        $number_a = filter_input(INPUT_POST, 'number_a', FILTER_VALIDATE_INT);
        $number_b = filter_input(INPUT_POST, 'number_b', FILTER_VALIDATE_INT);
        $number_c = filter_input(INPUT_POST, 'number_c', FILTER_VALIDATE_INT);
        $escolha_operation = $_POST["operation"];

        if(empty($number_a) || empty($number_b) || empty($number_c) || empty($escolha_operation)) {

            echo"Por favor, preencha os campos e digite números válidos";
            
        } else {
            
            $_SESSION["number_a"] = $number_a;
            $_SESSION["number_b"] = $number_b;
            $_SESSION["number_c"] = $number_c;
            $_SESSION["escolha_operation"] = $escolha_operation;

            echo"Número a: " . htmlspecialchars($_SESSION["number_a"]) . "<br>";
            
            echo"Número b: " . htmlspecialchars($_SESSION["number_b"]) . "<br>";

            echo"Número c: " . htmlspecialchars($_SESSION["number_c"]) . "<br>";

            switch($escolha_operation) {
            case "soma": 
            $soma = soma($_SESSION["number_a"], $_SESSION["number_b"], $_SESSION["number_c"]);
            echo "Soma: " . htmlspecialchars($soma) . "<br>";
            break;
            case "sub":
            $sub = sub($_SESSION["number_a"], $_SESSION["number_b"], $_SESSION["number_c"]);
            echo "Subtração: " . htmlspecialchars($sub) . "<br>";
            break;
            case "mult":
            $mult = mult($_SESSION["number_a"], $_SESSION["number_b"], $_SESSION["number_c"]);
            echo "Multiplicação: " . htmlspecialchars($mult) . "<br>";
            break;
            case "div":
            $div = div($_SESSION["number_a"], $_SESSION["number_b"], $_SESSION["number_c"]);
            echo "Divisão: " . htmlspecialchars($div) . "<br>";
            break;
            case "equação_1°":
            $equ1° = equ1($_SESSION["number_a"], $_SESSION["number_b"]);
            echo "Equação linear: " . htmlspecialchars($equ1°) . "<br>";
            break;
            case "equação_2°":
            $equ2° = equ2($_SESSION["number_a"], $_SESSION["number_b"], $_SESSION["number_c"]);
            echo "Equação Quadrática: " . htmlspecialchars($equ2°) . "<br>";
            break;
            default:
            echo "operação não reconhecida";
            break;
            }
        }

    }
?>