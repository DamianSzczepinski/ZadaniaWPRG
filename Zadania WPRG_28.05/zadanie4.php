<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method=POST>
        Imie:<input type="text" name="imie"><br>
        Nazwisko:<input type="text" name="nazwisko"><br>
        e-mail:<input type="text" name="e-mail"><br>
        Hasło:<input type="text" name="hasło"><br>
        <input type="submit" name="zarejestruj" value="zarejestuj">
    </form>

    <?php
        $plik=fopen("dane.txt", "c+");
        if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['e-mail']) && isset($_POST['hasło']))
        {
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
            $email=$_POST['e-mail'];
            $haslo=$_POST['hasło'];
            $nie=0;
            
            if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/',$haslo))
            {
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid email format";
                }
                else
                {
                    $dane=$imie.";".$nazwisko.";".$email.";".$haslo."\n";
                    while(!feof($plik))
                    {
                        
                        $str = fgets($plik);
                        $str = trim($str);
                        
                        
                        if ($str!="")
                        {
                            $tab=explode(";",$str);
                            
                            if ($tab[2]==$email)
                            {
                                echo "Podany e-mail jest juz zajety";
                                $nie=1;
                            }
                        }
                        else
                        {
                            echo "puste";
                        }
                        
                         
                    }
                    if ($nie==0)
                    {
                        fwrite($plik, $dane);
                        echo "zarejestrowano<br>";
                        
                    }
                    
                }
            }
            else
            {
                echo "Zle haslo";
            }

            
        }
        
        fclose($plik);
        
        
    ?>
    <form action='zadanie4_2.php'>
        <input type="submit" value='Logowanie'>
    </form>
</body>
</html>