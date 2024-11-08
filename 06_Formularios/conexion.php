<?php 
//IP aunque podemos tambien con "127.0.0.1" (Loopback)
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contraseña = "estudiante";
    $_base_de_datos = "animes_bd";

    //Tenemos dos opciones de librerías para crear una conexion con BBDD
    //Mysqli (más simple) o PDO(más completa)

    $_conexion=new Mysqli($_servidor,$_usuario,$_contraseña,$_base_de_datos)
        or die("Error de Conexión");

?>