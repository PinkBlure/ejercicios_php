<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function potencia($base, $exponente = 2) {
            return $base ** $exponente;
        }

        echo "La potencia de 2 es ".potencia(2).".<br>";
        echo "La potencia de 2 sobre 4 es ".potencia(2, 4).".<br>";
    ?>
</body>
</html>