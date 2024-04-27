
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a=3;
    $c= 7;
    $b= 5; 
    $d= 9;

    $tablica=array();
    for ($i= $a; $i<=$b; $i++)
    {
        $tablica[$i]=$c;
        $c++;
    }
    print_r($tablica);
    ?>
</body>
</html>
