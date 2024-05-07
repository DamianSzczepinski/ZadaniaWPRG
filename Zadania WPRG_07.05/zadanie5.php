
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form name="formularz1" method="POST">
        <input type="text" name="pierwsza">
        <button type="submit">Działaj</button>
    </form>
    <?php
        if (isset($_POST['pierwsza']))
        {
            if (isset($_POST['pierwsza']))
        {
            $a=$_POST['pierwsza'];
            $b=explode('.',$a);
            if (count($b)!= 1)
            {
                echo strlen($b[1]);
            }
            else
            {
                echo '0';
            }
            
        }

            
        }
    ?>
</body>
</html>
