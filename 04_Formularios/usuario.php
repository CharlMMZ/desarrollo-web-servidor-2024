<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuario</title>
	<?php   
    	error_reporting( E_ALL );
    	ini_set( "display_errors", 1 );    
	?>
</head>
<body>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    	$tmp_usuario = $_POST["usuario"];
    	$tmp_nombre = $_POST["nombre"];
    	$tmp_apellidos = $_POST["apellidos"];
    	$tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];

    	/**
     	* Entre 4 y 12 caracteres
     	* Letras a-z (mayus o minus), números y barrabaja
     	*/
    	if($tmp_usuario == '') {
        	$err_usuario = "El usuario es obligatorio";
    	} else {
        	$patron = "/^[a-zA-Z0-9_]{4,12}$/";
        	if(!preg_match($patron, $tmp_usuario)) {
            	$err_usuario = "El usuario debe tener 4 a 12 caracteres y
                	contener letras, números o barrabaja";
        	} else {
            	$usuario = $tmp_usuario;
            	echo "<h2>El usuario es $usuario</h2>";
        	}
    	}

    	/**
     	* 2-30 caracteres
     	* Solo letras (con tildes) y espacio en blanco
     	*/
    	if($tmp_nombre == '') {
        	$err_nombre = "El nombre es obligatorio";
    	} else {
        	if(strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 30) {
            	$err_nombre = "El nombre tiene que tener entre 2 y 30 caracteres";
        	} else {
            	$patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
            	if(!preg_match($patron, $tmp_nombre)) {
                	$err_nombre = "El nombre solo puede contener letras
                    	o espacios en blanco";
            	} else {
                	$nombre = $tmp_nombre;
                	echo "<h2>El nombre es $nombre</h2>";
            	}
        	}
    	}

    	/**
     	* 2-30 caracteres
     	* Solo letras (con tildes) y espacio en blanco
     	*/
    	if($tmp_apellidos == '') {
        	$err_apellidos = "Los apellidos son obligatorios";
    	} else {
        	if(strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 30) {
            	$err_apellidos = "Los apellidos tienen que tener entre 2 y 30 caracteres";
        	} else {
            	$patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
            	if(!preg_match($patron, $tmp_apellidos)) {
                	$err_apellidos = "Los apellidos solo pueden contener letras
                    	o espacios en blanco";
            	} else {
                	$apellidos = $tmp_apellidos;
                	echo "<h2>Los apellidos son $apellidos</h2>";
            	}
        	}
    	}

    	if($tmp_fecha_nacimiento == '') {
        	$err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
    	} else {
            $fecha_actual = date("Y-m-d");
            list($anno_actual,$mes_actual,$dia_actual) = explode("-", $fecha_actual);

            $fecha_nacimiento = date("Y-m-d");
            list($anno_introducida,$mes_introducida,$dia_introducida) = explode("-", $fecha_nacimiento);

            $user_year=$anno_actual-$anno_introducida;
            if ($user_year==121) {
                if ($mes_actual>$mes_introducida) {
                    echo "<h2>Tienes $user_year años.</h2>";
                }elseif ($mes_actual<$mes_introducida) {
                    echo "Tienes $user_year años, ERROR";
                }else{
                    if ($dia_actual>$dia_introducida) {
                        echo "<h2>Tienes $user_year años.</h2>";
                    }elseif ($dia_actual<$dia_introducida) {
                        echo "Tienes $user_year años, ERROR";
                    }else{
                        echo "<h2>Hoy cumples $user_year años...ERROR</h2>";
                    }
                }
            }elseif ($user_year>121) {
                echo "Tienes $user_year años, ERROR";
            }else {
                echo "<h2>Tienes $user_year años.</h2>";
            }
            
    	}
	}
	?>
	<form action="" method="post">
    	<input type="text" name="usuario" placeholder="Usuario">
    	<?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
    	<br><br>
    	<input type="text" name="nombre" placeholder="Nombre">
    	<?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
    	<br><br>
    	<input type="text" name="apellidos" placeholder="Apellidos">
    	<?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>"; ?>
    	<br><br>
    	<label>Fecha de nacimiento</label><br>
    	<input type="date" name="fecha_nacimiento" placeholder>
    	<?php if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>"; ?><br>
    	<input type="submit" value="Registrarse">
	</form>
</body>
</html>
