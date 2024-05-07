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
            $a=$_POST['pierwsza'];
            $b;
            $find=array('a','e','i','o','u');
            str_replace($find, '', $a,$b);
            echo $b;

        }
    ?>
</body>
</html>