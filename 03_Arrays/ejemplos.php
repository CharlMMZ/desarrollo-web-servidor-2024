<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" href="style.css">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    
    <?php
    /*
    //declarar arrays
    $frutas = array(
        1=>"Manzana",
        2=>"Naranja",
        3=>"Cereza"
    );

    print_r($frutas);
    //forma 2
    $frutas2 = [
        "Clave1"=>"Sandía",
        "Clave2"=>"Pera",
        "Clave3"=>"Melón"
    ];
    //las claves son o un número o string, así que lo redondea o adapta al valor más cercano
    //mirar en un cajón
    echo $frutas[1];
    echo $frutas2["Clave1"];

    */
    ?>

    <?php
    //forma 3
    /*
    $frutas3 = [// si no ponemos las claves se asignan números
        "Sandía",
        "Pera",
        "Melón"
    ];
    array_push($frutas3, "Mango", "Melocotón");
    $frutas3[7] = "Uva";//Hay que tener cuidado porque machaca
    $frutas3[] = "Piña";//Si no ponemos nada, lo añade al final del array

    //Array values (Machaca todas la claves que hay y las vuelve a asignar desde cero)
    $frutas3 = array_values($frutas3);

    print_r($frutas3);
    unset($frutas3[4]);//me cargo una
    print_r($frutas3);
    */
    ?>
    <?php
    
    //Añadir elementos
        $personas = array(
            "77469363J"=>"Pepe",
            "87469363H"=>"Paco",
            "76469363E"=>"Jorge",
        );

        
        $personas["66469363W"] = "Miguel";
        array_push($personas, "Fermín","Ildefonso");
        print_r($personas);
        echo "<p>".$personas["76469363E"]."</p>";

        //recorrer con bucles (el punto no lo utilizamos)
        echo "<ol>";
        /*
        for ($i = 0; $i < count($personas); $i++) { 
            echo "<li>".$personas[$i]."</li>";
        }*/
        foreach ($personas as $dni=>$persi) {
            echo "<li>".$persi." y su DNI es: ".$dni."</li>";
        }
        echo "</ol>";


        
        $frutas4 = [
            "Sandía",
            "Pera",
            "Melón"
        ];
        array_push($frutas4, "Mango", "Melocotón");
        //$frutas4[7] = "Uva";//Hay que tener cuidado porque machaca
        //$frutas4[] = "Piña";

        echo "<ol>";
        $i = 0;
        while ($i < count($frutas4)) {
            echo "<li>".$frutas4[$i]."</li>";
            $i++;
        }
        echo "</ol>";

        for ($i = 0; $i < count($frutas4); $i++) { 
            echo "<li>".$frutas4[$i]."</li>";
        }
        echo "<ol>";
        foreach ($frutas4 as $fruti) {
            echo "<li>".$fruti."</li>";
        }
        echo "</ol>";

        $tutifruti = [
            0 =>"Sandía",
            1 => "Pera",
            3 => "Melón"
        ];

        $fruti = [
            0 =>"Sandía",
            3 => "Pera",
            2 => "Melón"
        ];

        if ($tutifruti==$fruti) {
            echo "<h3>Los arrays son iguales</h3>";
        }else{
            echo "<h3>Los arrays NO son iguales</h3>";
        }
        asort($personas);
        //rsort($personas);
        //sort($personas);
        //arsort($personas);
        //ksort($personas);
        //krsort($personas);

    ?>

    <table>
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            
                <?php         
                foreach ($personas as $dni=>$persi) {
                    echo "<tr>";
                    echo "<td>$dni</td> <td>$persi</td>";
                    echo "</tr>";
                }
                ?>
                
                <?php //php puede cortarse y continuar después
                 foreach ($personas as $dni=>$persi) { ?>
                    <tr>
                        <td><?php echo $dni ?></td>
                        <td><?php echo $persi ?></td>
                    </tr>
                <?php }?>

        </tbody>
    </table>

</body>
</html>