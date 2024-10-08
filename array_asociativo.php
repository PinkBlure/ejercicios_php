<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array = array(
            "Moisés" => 7,
            "Giovanny" => 8,
            "Aileen" => 10
        );

        foreach ($array as $key => $value) {
            echo "El estudiante ". $key ." tiene una nota de ". $value .".<br>";
        }

        $total = 0;
        foreach ($array as $key => $value) {
            $total += $value;
        }

        echo "<br>La media de la clase es de ". number_format($total/count($array), 2) .".<br>";
    ?>
</body>
</html>