<?php 
    $a = 3;
    $b = 4;   
    $c = 5;
    $suma1=0;
    $suma2=0;

    for ($i = 0; $i < $c; $i++) 
    {
        
        echo ($a),", ";
        $suma1+= $a;
        $a+=$b;
    }
    echo "<br>";
    echo $suma1;

    echo "<br>";

    for ($i = 0; $i < $c; $i++) 
    {
        
        echo ($a),", ";
        $suma2+= $a;
        $a*=$b;
    }
    echo "<br>";
    echo $suma2;
    