<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form name="formularz1" method="POST">
        <input type="text" name="pierwsza">
        <button type="submit">Działaj</button>
    </form>
    <?php
        if (isset($_POST['pierwsza']))
        {
            $a=$_POST['pierwsza'];
            $find=array('+','\\','/',':','*','?','"','<','>','|','-');
            echo str_replace($find, '', $a);

            
        }
    ?>
</body>
</html>