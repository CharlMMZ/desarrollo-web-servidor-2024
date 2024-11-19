<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Fútbol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <!--
        $tmp_iniciales = htmlspecialchars($_POST["iniciales"]);
        con esto prevenimos que nos puedan ejecutar un script o un html en la página

        Con el trim quitamos los espacios en blanco del final y del principio
        $tmp_iniciales = trim(htmlspecialchars($_POST["iniciales"]));

        preg replace cambia los caracteres especiales según el patron que le hemos dado
        $tmp_iniciales = preg_replace('/\s+/', '', $tmp_iniciales);
        en este caso quitamos los espacios en blanco por un espacio
        
    -->
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_equipo = $_POST["equipo"];
                if(isset($_POST["liga"])) $tmp_liga = $_POST["liga"];
                else $tmp_liga = "";
                $tmp_iniciales = $_POST["iniciales"];
                $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

                if($tmp_equipo == "") {
                    $err_equipo = "El equipo es obligatorio";
                }else{
                    if (strlen($tmp_equipo)>60) {
                        $err_equipo = "El equipo debe tener entre 1 y 60 caracteres";
                    } else {
                        $patron="/^[a-zA-Z0-9 ]+$/";
                        if (!preg_match($patron, $tmp_equipo)) {
                            $err_equipo = "El equipo solo puede contener letras, números y espacios en blanco";
                        }else{
                            $equipo=$tmp_equipo;
                        }
                    }
                    
                }
            }
            
            if($tmp_liga == "") {
                $err_liga = "La liga es obligatoria";
            }else{
                $ligas_validas=["ps4", "ps5", "switch", "xboxsx", "pc"];
                if (in_array($tmp_liga, $ligas_validas)) {
                    $err_liga = "Elige una liga válida";
                }
            }

            if (strlen($tmp_iniciales)>255) {
                $err_iniciales="La iniciales no puede tener más de 255 caracteres";
            }else {
                $patron="/^[a-zA-Z0-9 .,]+$/";
                if (!preg_match($patron, $tmp_iniciales)) {
                    $err_iniciales = "El equipo solo puede contener letras, números, espacios en blanco, puntos y comas";
                }else{
                    $iniciales=$tmp_iniciales;
                }
            }

            if($tmp_fecha_fundacion == "") {
                $err_fecha_fundacion = "La fecha de fundacion es obligatoria";
            }else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_fecha_fundacion)) {
                    $err_fecha_fundacion = "El formato de la fecha es incorrecto";
                } else {
                    list($anno,$mes,$dia)=explode('-',$tmp_fecha_fundacion);
                    if ($anno < 1947) {
                        $err_fecha_fundacion = "El año no puede ser anterior al 1947";
                    }else{
                        $anno_actual = date("Y");
                        $mes_actual = date("m");
                        $dia_actual = date("d");

                        if($anno - $anno_actual > 10) {
                            $err_fecha_fundacion = "El videojuego 
                                no puede lanzarse dentro de más de 10 años";
                        } elseif($anno - $anno_actual < 10) {
                            //  FECHA VÁLIDA
                            $fecha_fundacion = $tmp_fecha_fundacion;
                        } else {
                            if($mes - $mes_actual < 0) {
                                //  FECHA VÁLIDA
                                $fecha_fundacion = $tmp_fecha_fundacion;
                            } elseif($mes - $mes_actual > 0) {
                                $err_fecha_fundacion = "El videojuego 
                                    no puede lanzarse dentro de más de 10 años";
                            } else {
                                if($dia - $dia_actual > 0) {
                                    $err_fecha_fundacion = "El videojuego 
                                        no puede lanzarse dentro de más de 10 años";
                                } elseif($dia - $dia_actual <= 0) {
                                    $fecha_fundacion = $tmp_fecha_fundacion;
                                }
                            }
                        }
                    }
                }
            
            }
        ?>
        <h1>Formulario de fuchibol</h1>
        <form class="col-4" action = "" method="post">
            <div class="mb-3">
                <label class="form-label">Equipo</label>
                <input class="form-control" type="text" name="equipo">
                <?php if(isset($err_equipo)) echo "<span class='error'>$err_equipo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Iniciales</label>
                <input class="form-control" type="text" name="iniciales">
                <?php if(isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Liga</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="liga" value="easports">
                    <label class="form-check-label">Liga EA Sports</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="liga" value="hypermotion">
                    <label class="form-check-label">Liga Hypermotion</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="liga" value="primerarfef">
                    <label class="form-check-label">Primera RFEF</label>
                </div>

                <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Número de jugadores</label>
                <input class="form-control" type="text" name="njugadores">
                <?php if(isset($err_njugadores)) echo "<span class='error'>$err_njugadores</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de fundacion</label>
                <input class="form-control" name="fecha_fundacion" type="date">
                <?php if(isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>