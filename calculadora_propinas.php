<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de propinas</title>
</head>
<body>
    <h1 style="display: flex;">Calculadora de propinas</h1>
    <?php
        define ("TOTALCUENTA",100);
        define("PORCENTAJE_PROPINA", 15);

        echo "El total de la cuenta es <strong>".number_format(TOTALCUENTA, 2)."</strong>€<br>";
        echo "El porcentaje de propina es de <strong>".number_format(PORCENTAJE_PROPINA,2)."</strong>%<br>";

        $propina = number_format((TOTALCUENTA * PORCENTAJE_PROPINA) / 100, 2);

        echo "La propina debe de ser un total de <strong>$propina"."</strong>€<br>";

        $cuenta = number_format(TOTALCUENTA + $propina, 2);

        echo "<h2>El total de la cuenta es de $cuenta"."€</h2>";
    ?>
</body>
</html>