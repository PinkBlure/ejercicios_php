<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        date_default_timezone_set("Atlantic/Canary");

        define("DIA", date("d-m-Y"));

        $formatter = new IntlDateFormatter(
            'es_ES',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Atlantic/Canary',
            IntlDateFormatter::GREGORIAN,
            'EEEE');
        $timestamp = strtotime(DIA);
        $diaSemana = $formatter->format($timestamp);

        define("HORA", $hora = date("H:i"));
        echo "<h2>Hola, hoy es ".ucfirst($diaSemana).", ".DIA." y son las ".HORA."</h2>";

        $horario = [
            ["DSW con David","DOR con Badel","EMR con Carolina","DEW con Marta","DPL con Acerina"],
            ["DSW con David","DOR con Badel","DEW con Marta","DEW con Marta","DPL con Acerina"],
            ["DOR con Badel","DSW con David","DEW con Marta","DOR con Badel","DEW con Marta"],
            ["Recreo","Recreo","Recreo","Recreo","Recreo"],
            ["EMR con Carolina","DSW con David","DEW con Marta","DOR con Badel","DEW con Marta"],
            ["EMR con Carolina","DPL con Acerina","DSW con David","DPL con Acerina","DSW con David"],
            ["DOR con Badel","DPL con Acerina","DSW con David","DPL con Acerina","DSW con David"]
        ];

        $horas = ["8:00", "8:55", "9:50", "10:45", "11:15", "12:10", "13:05", "14:00"];
    ?>

    <table border="1">
        <tr>
            <th>Horario</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <?php
            for( $d = 0; $d < count($horario); $d++ ) {
                $row = "<tr><td style='text-align: center; padding: .8rem'>{$horas[$d]} - {$horas[$d+1]}</td>";
                for ( $h = 0; $h < count($horario[$d]); $h++) {
                    $row .= "<td style='text-align: center; padding: .8rem'>{$horario[$d][$h]}</td>";
                }
                echo "$row</tr>";
            }
        ?>
    </table>

    <br>
    <form method="POST">
        <legend>BUSCADOR DE ASIGNATURA POR DÍA Y HORA</legend>
        <label for="dia">Día: </label>
        <select id="dia" name="dia" required>
            <option value="" disabled selected>-- Selecciona un día --</option>
            <option value="0">Lunes</option>
            <option value="1">Martes</option>
            <option value="2">Miércoles</option>
            <option value="3">Jueves</option>
            <option value="4">Viernes</option>
        </select>
        <label for="hora">Hora: </label>
        <select id="hora" name="hora" required>
            <option value="" disabled selected>-- Selecciona una hora --</option>
            <option value="0">8:00 - 8:55</option>
            <option value="1">8:55 - 9:50</option>
            <option value="2">9:50 - 10:45</option>
            <option value="3">10:45 - 11:15</option>
            <option value="4">11:15 - 12:10</option>
            <option value="5">12:10- 13:05</option>
            <option value="6">13:05 - 14:00</option>
        </select>
        <input type="submit" value="El alumno se encuentra en...">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            leerFormulario($horario);
        }

        function leerFormulario($horario) {
            $dia = $_POST['dia'] ?? null;
            $hora = $_POST['hora'] ?? null;
            echo "El alumno se encuentra en: {$horario[$hora][$dia]}.<br><br>";
        }
    ?>

    <?php
        function buscarHora($d, $horas, $horario) {
            if (($horas[0] <= HORA) && (HORA <= $horas[1])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[0][$d]}.";
            } elseif (($horas[1] <= HORA) && (HORA <= $horas[2])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[1][$d]}.";
            } elseif (($horas[2] <= HORA) && (HORA <= $horas[3])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[2][$d]}.";
            } elseif (($horas[3] <= HORA) && (HORA <= $horas[4])) {
                echo "El alumno está ahora mismo en el recreo.";
            } elseif (($horas[4] <= HORA) && (HORA <= $horas[5])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[4][$d]}.";
            } elseif (($horas[5] <= HORA) && (HORA <= $horas[6])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[5][$d]}.";
            } elseif (($horas[6] <= HORA) && (HORA <= $horas[7])) {
                echo "El alumno está ahora mismo en la asignatura {$horario[6][$d]}.";
            } else {
                echo "El alumno no tiene clase a esta hora.";
            }
        }

        echo "<br>INFORMACIÓN ACTUAL<br>";
        switch (ucfirst($diaSemana)) {
            case "Lunes":
                buscarHora(0, $horas, $horario);
                break;
            case "Martes":
                buscarHora(1, $horas, $horario);
                break;
            case "Miércoles":
                buscarHora(2, $horas, $horario);
                break;
            case "Jueves":
                buscarHora(3, $horas, $horario);
                break;
            case "Viernes":
                buscarHora(4, $horas, $horario);
                break;
            default:
                echo "El alumno no tiene clases hoy";
                break;
        }
    ?>
</body>
</html>