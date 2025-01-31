<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perrito Aleatorio</title>
    <style>
        th,td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php


    $url = "https://dog.ceo/api/breeds/image/random";


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $perritos = $datos["message"];
    

    ?>

           
    <?php echo "<img width='150px' src='".$perritos."' alt=''>"?>
            


</body>
</html>