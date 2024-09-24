<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $i = 1;
        echo "<ul>";
        while($i < 10){
            echo "<li>$i</li>";
            $i++;
        }
        echo "</ul>"

    ?>
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
</body>
</html>