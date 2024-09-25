<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Lista con while</h3>
    <?php
        $i = 1;
        echo "<ul>";
        while($i <= 10){
            echo "<li>$i</li>";
            $i++;
        }
        echo "</ul>"

    ?>
    <h5>Forma alternativa</h5>
    <?php
        $i = 1;
        echo "<ul>";
        while($i < 31):
            if ($i%3==0):
                echo "<li>$i</li>";
            endif;
            $i++;
        endwhile;
        echo "</ul>"
    ?>
    <h3>Lista con do while</h3>
    <?php /*Do while */
        $i = 1;
        echo "<ul>";
        do {
            echo "<li>$i</li>";
            $i++;
        }while($i <= 10);
        echo "</ul>"
    ?>
    <h3>Lista con for</h3>
    <?php /*for */
        $i = 1;
        echo "<ul>";
        for($i = 1; $i <= 10; $i++){
            echo "<li>$i</li>";
        }
        echo "</ul>"
    ?>
    <h5>For incompletos</h5>
    <?php /*for incompleto*/
        $i = 1;
        echo "<ul>";
        for($i = 1; ;$i++){
            if($i > 10) break;
            echo "<li>$i</li>";
        }
        echo "</ul>";
        /*For varias condiciones */
        
        $var = true;
        echo "<ul>";
        for($l = 1; $l <= 10 && $var == true; $l++){
            echo "<li>$l</li>";
        }
        echo "</ul>";
        /*Comillas sobles*/
        $w=1;
        echo "<ul>";
        for(;;){
            if($w > 10) break;
            echo "<li>$w</li>";
            $w++;
        }
        echo "</ul>"

    ?>
</body>
</html>