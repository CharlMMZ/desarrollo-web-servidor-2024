<?php 
//IP aunque podemos tambien con "127.0.0.1" (Loopback)
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    //$_base_de_datos = "animes_bd";
    $_base_de_datos = "animes_bd";

    //Tenemos dos opciones de librerías para crear una conexion con BBDD
    //Mysqli (más simple) o PDO(más completa)
    try {
        $_conexion=new PDO("mysql:host=$_servidor;dbname=$_base_de_datos", 
        $_usuario, $_contrasena);
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Conexión fallida: ". $e -> getMessage());
    }

?>