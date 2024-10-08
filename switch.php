<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("CHARACTER", ".");

        $parsed = strtolower( CHARACTER );
        switch ( $parsed ) {
            case ctype_alpha( CHARACTER ) != 1:
                echo "El carácter ".CHARACTER." no es un carácter válido";
                break;
            case preg_match("/[a,e,i,o,u]/", $parsed) == true:
                echo "El carácter ".CHARACTER." es una vocal";
                break;
            default:
                echo "El carácter ".CHARACTER." es una consonante";
                break;
        }
    ?>
</body>
</html>