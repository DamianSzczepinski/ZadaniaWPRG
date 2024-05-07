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
            echo strtoupper($a."<br>");
            echo strtolower($a."<br>");
            echo ucfirst($a."<br>");
            echo ucwords($a);

            
        }
    ?>
</body>
</html>