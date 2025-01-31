<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rick and Morty</title>
        <?php
            error_reporting( E_ALL );
            ini_set( "display_errors", 1 );    
        ?>
    </head>
    <body>
    <?php
        $url = "https://rickandmortyapi.com/api/character/";
    
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
    
        $datos = json_decode($respuesta, true);
        $rick = $datos["results"];



        $cantidad_personajes = $_GET["info"]["count"]
        ?>
        <h1>
            <?php echo "Personajes: ".$_GET["info"]["count"]?>
        </h1>

        
        <?php foreach($datos as $personaje){ ?>
            <?php foreach($personaje["studios"] as $studio){ ?>
                
                   <?php echo $studio["name"]; ?> 
                
            <?php } ?>
        <?php } ?>
        <h2>Género</h2>
        <?php foreach($datos as $anime){ ?>
            <?php foreach($anime["genres"] as $genre){ ?>
                
                   <?php echo $genre["name"]; ?> 
                
            <?php } ?>
        <?php } ?>
        <h2>Productoras</h2>
        <?php foreach($datos as $anime){ ?>
            <?php foreach($anime["producers"] as $producer){ ?>
                
                   <?php echo $producer["name"]; ?> 
                
            <?php } ?>
        <?php } ?>
        <h2>Sinopsis</h2>
        <p>
            <?php echo $anime["synopsis"] ?>
        </p>
    
        <h2>Tráiler</h2>
        <iframe src="<?php echo $anime["trailer"]["embed_url"] ?>"></iframe>

        <form class="col-4" action="" method="get" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Cantidad de personajes</label>
                <input class="form-control" name="usuario" type="text">
            </div>
            <select name="genero" id="genero">
                <option value="female">Female</option>
                <option value="male">Male</option>
            </select>
            <select name="especie" id="especie">
                <option value="human">Human</option>
                <option value="alien">Alien</option>
            </select>
            <input type="submit" value="Comprobar personajes">
        </form>
    </body>
    </html>