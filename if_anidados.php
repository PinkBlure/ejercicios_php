<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("CHARACTER", "A");

        $parsed = strtolower( CHARACTER );

        if (ctype_alpha( CHARACTER ) != 1) {
            echo "El carácter ".CHARACTER." no es un carácter válido";
        } elseif (preg_match("/[a,e,i,o,u]/", $parsed)) {
            echo "El carácter ".CHARACTER." es una vocal";
        } else {
            echo "El carácter ".CHARACTER." es una consonante";
        }
    
    ?>
</body>
</html>