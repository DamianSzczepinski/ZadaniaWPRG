<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form name="formularz1" method="POST">
        <input type="text" name="pierwsza">
        <br>
        <input type="text" name="druga">
        <br>
        <select name="operacja">
            <option value=1 selected>read</option>
            <option value=2>delete</option>
            <option value=3>create</option>
        </select>
        <button type="submit">Działaj</button>
    </form>
    <?php
        if (isset($_POST['pierwsza']))
        {
            if (isset($_POST['pierwsza']))
        {
            $a=$_POST['pierwsza'];
            $b=$_POST['druga'];
            $d=$_POST['operacja'];
            if ($a[strlen($a)-1]!="/")
            {
                $a=$a."/";
            }
            $c=$a.$b."/";
            

            
        

            switch ($d)
            {
                case '1':
                    if (!file_exists($c)){
                        echo "Katalog nieistniejacy_katalog nie istnieje\n";
                        return;
                    }
                    if (!($fd = opendir($c))){
                        exit("Nie mogę otworzyć katalogu $c");
                    }
                    while (($file = readdir($fd)) !== false)
                    {
                        echo "$file<br/>";
                    }   
                    closedir($fd); 
                    break;
                case '2':
                    if (!file_exists($c)){
                        echo "Katalog nieistniejacy_katalog nie istnieje\n";
                        return;
                    }
                    chdir($a);
                    $resDir = opendir($c);
                    while( $strFile = readdir( $resDir ) )
                    {
                        $arrFiles[] = $strFile;
                    }
                    if( sizeof( $arrFiles ) <= 2 )
                    {
                        echo 'katalog jest pusty';
                        rmdir($b);  
                    } 
                    else
                    {
                        echo 'katalog nie jest pusty';
                    }
                    break;
                case '3':
                    chdir($a);
                    if (!file_exists($c)){
                        mkdir($b);
                        
                    }
                    
                    break;
            }
            
            
            

            

        }

            
        }
    ?>
</body>
</html>