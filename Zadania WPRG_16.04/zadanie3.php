<?php
$tablica = array();
for ($i = 0; $i < 3; $i++) 
{
    for ($j = 0; $j < 3; $j++)
    {
        $tablica[$i][$j] = $i;
        echo $tablica[$i][$j],", ";
        
    }
    echo "<br>";
}
echo "<br>";
$tablica2 = array();
for ($i = 0; $i < 3; $i++) 
{
    for ($j = 0; $j < 3; $j++)
    {
        $tablica2[$i][$j] = $j;
        echo $tablica2[$i][$j],", ";
        
    }
    echo "<br>";
}
echo "<br>";
for ($i = 0; $i < 3; $i++) 
{
    for ($j = 0; $j < 3; $j++)
    {
        $tablica[$i][$j]*= $tablica2[$i][$j];
        echo $tablica[$i][$j],", ";
        
    }
    echo "<br>";
}
