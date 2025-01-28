<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Animes</title>
    <style>
        th,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php


    $url = "https://api.jikan.moe/v4/top/anime";


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];
    //print_r($animes);


    ?>
    <table>
        <thead>
            <th>Título</th>
            <th>Título Original</th>
            <th>Año</th>
            <th>Puesto</th>
            <th>Nota</th>
            <th>Sinopsis</th>
            <th>Portada</th>
            <!--<th>Tráiler</th>-->
        </thead>
        <tbody>
        <?php 
            foreach($animes as $anime){ ?>
            <tr>
                <td><?php echo $anime["title_japanese"] ?></td>
                
                <td><a href="anime.php?id=<?php echo $anime["mal_id"] ?>">
                <?php echo $anime["title"] ?></a></td>
                <td><?php echo $anime["year"] ?></td>
                <td><?php echo $anime["rank"] ?></td>
                <td><?php echo $anime["rating"] ?></td>
                <td><?php echo $anime["synopsis"] ?></td>
                <td><?php echo "<img width='150px' src='".$anime["images"]["jpg"]["image_url"]."' alt=''>"?></td>
                <!--<td><iframe src="<?php //echo $anime["trailer"]["embed_url"] ?>"></iframe></td>-->
            </tr>
        <?php  
        /*
            if (pagination has_next_page) {
                # code...
            }
            echo "<button>Pagina anterior</button>";
            echo "<button>Página siguiente</button>";
        */
        }   
        ?>
        </tbody>
    </table>
</body>
</html>