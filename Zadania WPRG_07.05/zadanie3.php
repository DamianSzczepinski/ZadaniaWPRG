
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form name="formularz1" method="POST">
        <input type="text" name="pierwsza">
        <select name="operacja">
            <option value=1 selected>Odwrócenie ciągu znaków.</option>
            <option value=2>Zamiana wszystkich liter na wielkie.</option>
            <option value=3>Zamiana wszystkich liter na małe.</option>
            <option value=4>Liczenie liczby znaków.</option>
            <option value=5>Usuwanie białych znaków z początku i końca ciągu.</option>
        </select><br>
        <button type="submit">Wykonaj</button>

    </form>
    <?php
        if (isset($_POST['pierwsza']))
        {
            $a=$_POST['pierwsza'];
            $b=$_POST['operacja'];
            if ($a == '')
            {
                echo 'brak tekstu';
            }
            else
            {

            switch ($b)
            {
                case '1':
                    echo strrev($a);
                    break;
                case '2':
                    echo strtoupper($a);
                    break;
                case '3':
                    echo strtolower($a);
                    break;
                case '4':
                    echo strlen($a);
                    break;
                case '5':
                    echo trim($a);
                    break;

            }
            }
            

            
        }
    ?>
</body>
</html>
