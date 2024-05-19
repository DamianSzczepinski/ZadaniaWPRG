<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        if (!$plik=fopen('adresy.txt','r+')){
            
            echo "Nie można otworzyć pliku test.txt";
        }
        else
        {
            
        while(!feof($plik)){
            $str = fgets($plik);
            $tab=explode(";",$str);
            
            echo "<a href=".$tab[0].">$tab[0]</a> $tab[1]";
            echo '<br>';
        }

        }
        fclose($plik);
        
    ?>
</body>
</html>