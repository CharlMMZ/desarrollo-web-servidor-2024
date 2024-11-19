<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Equipos de Fútbol</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Formulario de Equipos de Fútbol</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_equipo = $_POST["equipo"];
            $tmp_iniciales = $_POST["iniciales"];
            $tmp_liga = $_POST["liga"];
            $tmp_num_jugadores = $_POST["num_jugadores"];
            $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

            // Validación equipo
            if (strlen($tmp_equipo) < 3 || strlen($tmp_equipo) > 20) {
                $err_equipo = "El equipo debe tener entre 3 y 20 caracteres";
            } else {
                $patron_equipo = "/^[a-zA-Z0-9áéíóúÁÉÍÓÚ., ]+$/";
                if (!preg_match($patron_equipo, $tmp_equipo)) {
                    $err_equipo = "El equipo solo puede contener letras, números, espacios, puntos y comas";
                } else {
                    $equipo = $tmp_equipo;
                }
            }

            // Validación iniciales
            if (strlen($tmp_iniciales) != 3) {
                $err_iniciales = "Las iniciales deben tener exactamente 3 caracteres";
            } else {
                $patron_iniciales = "/^[A-Z]{3}$/";
                if (!preg_match($patron_iniciales, $tmp_iniciales)) {
                    $err_iniciales = "Las iniciales deben ser 3 letras mayúsculas";
                } else {
                    $iniciales = $tmp_iniciales;
                }
            }

            // Validación liga
            if (!in_array($tmp_liga, ["Liga EA Sports", "Liga HyperMotion", "Primera RFEF"])) {
                $err_liga = "Debe seleccionar una liga válida";
            } else {
                $liga = $tmp_liga;
            }

            // Validación número de jugadores
            if ($tmp_num_jugadores < 26 || $tmp_num_jugadores > 32) {
                $err_num_jugadores = "El número de jugadores debe estar entre 26 y 32";
            } else {
                $num_jugadores = $tmp_num_jugadores;
            }

            // Validación fecha de fundación
            $fecha_actual = date("Y-m-d");
            $fecha_limite = "1889-12-18";
            if ($tmp_fecha_fundacion > $fecha_actual || $tmp_fecha_fundacion < $fecha_limite) {
                $err_fecha_fundacion = "La fecha de fundación debe ser entre hoy y el 18 de diciembre de 1889";
            } else {
                $fecha_fundacion = $tmp_fecha_fundacion;
            }
        }
        ?>

        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Equipo</label>
                <input class="form-control" type="text" name="equipo" value="<?php echo isset($tmp_equipo) ? $tmp_equipo : ''; ?>">
                <?php if (isset($err_equipo)) echo "<span class='error'>$err_equipo</span>"; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Iniciales</label>
                <input class="form-control" type="text" name="iniciales" value="<?php echo isset($tmp_iniciales) ? $tmp_iniciales : ''; ?>">
                <?php if (isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>"; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Liga</label>
                <select class="form-control" name="liga">
                    <option value="">Selecciona una liga</option>
                    <option value="Liga EA Sports" <?php if (isset($tmp_liga) && $tmp_liga == "Liga EA Sports") echo "selected"; ?>>Liga EA Sports</option>
                    <option value="Liga HyperMotion" <?php if (isset($tmp_liga) && $tmp_liga == "Liga HyperMotion") echo "selected"; ?>>Liga HyperMotion</option>
                    <option value="Primera RFEF" <?php if (isset($tmp_liga) && $tmp_liga == "Primera RFEF") echo "selected"; ?>>Primera RFEF</option>
                </select>
                <?php if (isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Número de jugadores</label>
                <input class="form-control" type="number" name="num_jugadores" value="<?php echo isset($tmp_num_jugadores) ? $tmp_num_jugadores : ''; ?>">
                <?php if (isset($err_num_jugadores)) echo "<span class='error'>$err_num_jugadores</span>"; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de fundación</label>
                <input class="form-control" type="date" name="fecha_fundacion" value="<?php echo isset($tmp_fecha_fundacion) ? $tmp_fecha_fundacion : ''; ?>">
                <?php if (isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>"; ?>
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>

</html>

