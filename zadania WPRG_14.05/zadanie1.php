<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form name="formularz1" method="GET">
        <input type="date" name="pierwsza">
        <button type="submit">Działaj</button>
    </form>
    <?php
        if (isset($_GET['pierwsza']))
        {
            if (isset($_GET['pierwsza']))
        {
            $a=$_GET['pierwsza'];
            echo date('l', strtotime($a));
            echo("<br>");
            $data1=date('Y');
            $data2=date('F');
            $data3=date('d');

            if ($data2==date('F', strtotime($a)) && $data3>=date('d', strtotime($a)))
            {
                echo (date('Y')-date('Y', strtotime($a)));
            }
            else if ($data2==date('F', strtotime($a)) && $data3<date('d', strtotime($a)))
            {
                echo (date('Y')-date('Y', strtotime($a))-1);
            }
            else if ($data2<date('F', strtotime($a)))
            {
                echo (date('Y')-date('Y', strtotime($a))-1);
            }
            else
            {
                echo (date('Y')-date('Y', strtotime($a)));
            }

            if (date('L', strtotime($a))==0)
            {
                $data4=(date('z')-1);
            }
            else
            {
                $data4=date('z');
            }
            
            echo("<br>");
            if ($data4>=date('z', strtotime($a)))
            {
                echo ($data4-date('z', strtotime($a)));
            }
            else
            {
                $dzien=($data4-date('z', strtotime($a)));
                $dzien+=365;
                echo $dzien;
            }

        }

            
        }
    ?>
</body>
</html>