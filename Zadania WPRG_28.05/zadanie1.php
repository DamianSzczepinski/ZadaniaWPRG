<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    
    <?php
    if ($_COOKIE["licznik"]>=0)
    {
        
        setcookie("licznik", $_COOKIE["licznik"]+=1, time()+60*60);
        echo $_COOKIE["licznik"];

        if($_COOKIE["licznik"]==12)
        {
            echo ("jestes na 12");
        }
    }
    else
    {
        setcookie("licznik", 1, time()+60*60);
        echo $_COOKIE["licznik"];
    }
    ?>
    
    <form method="POST" action="">
        <button type="submit" name="jeden">reset</button>
    </form>
    <?php
        if(isset($_POST['jeden']))
        {
            setcookie("licznik", 0, time()+60*60);
        }
        
    ?>
</body>
</html>