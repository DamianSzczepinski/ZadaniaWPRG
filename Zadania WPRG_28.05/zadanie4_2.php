<!DOCTYPE html>
<?php session_start();
    if (!isset($_SESSION['logging']))
    {
        $_SESSION['logging']=false;
    }
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    
    
    <?php
        $plik=fopen("dane.txt", "c+");
        $nie=0;      
        if(isset($_POST["login"]) && isset($_POST["hasło"]))
        {
        while(!feof($plik))
        {                
            $str = fgets($plik);
            $str = trim($str);
                                       
            if ($str!="")
            {
                $tab=explode(";",$str);
                            
                if ($tab[2]==$_POST["login"] && $tab[3]==$_POST["hasło"])
                {
                    $_SESSION['logging']=true;
                    echo " zalogowałeś się<br>";
                    
                    $nie=1;
                }
            }
            else
            {   
                if ($nie==0)
                {
                    echo "puste";
                }
                
            } 
        } 
            
        
        }

        if(isset($_POST['wyloguj']))
        {
            $_SESSION['logging']=false;
            session_destroy();
            setcookie(session_name(),"",time()-360);
        }
        if ($_SESSION['logging']==false)
        {
            echo '<form method="POST" action="">
            E-mail:<input type="text" name="login"><br>
            Hasło:<input type="text" name="hasło"><br>
            <input type="submit" name="zaloguj" value="zaloguj">
        </form>';
        }
        else
        {
            
                
                echo "<form method='POST' action=''>
                <input type='submit' value='wyloguj' name='wyloguj'>
            </form>";
        }
            
        
        fclose($plik);

        
        
    ?>
</body>
</html>