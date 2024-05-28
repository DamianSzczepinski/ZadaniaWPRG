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
    var_dump($_SESSION);
    if(isset($_POST["login"]) && isset($_POST["hasło"]))
        {
            if(($_POST["login"])=="123" && ($_POST["hasło"])=="123")
            {
                $_SESSION['logging']=true;
                echo "zalogowano<br>";
                
            }
            else
            {
                echo "zle";
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
            Login:<input type="text" name="login"><br>
            Hasło:<input type="text" name="hasło"><br>
            <input type="submit" name="zaloguj">
        </form>';
        }
        else
        {
            
                
                echo "<form method='POST' action=''>
                <input type='submit' value='wyloguj' name='wyloguj'>
            </form>";
        }
            
        
        

        
        
    ?>
</body>
</html>