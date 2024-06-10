<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        <input type="text" name="imie" placeholder="imie"><br>
        <input type="text" name="nazwisko" placeholder="nazwisko"><br>
        <input type="text" name="wiek" placeholder="wiek"><br>
        <input type="text" name="e-mail" placeholder="e-mail"><br>
        <input type="text" name="haslo" placeholder="hasło"><br>
        <input type="submit" name="rej" value="zarejestruj">
    </form>
    <?php
        $con=mysqli_connect("localhost","root","","ile");
        $zap="CREATE TABLE IF NOT EXISTS klient (
            klient_ID INT PRIMARY KEY AUTO_INCREMENT,
            klient_imie VARCHAR(255) NOT NULL,
            klient_nazwisko VARCHAR(255) NOT NULL,
            klient_wiek INT,
            klient_email VARCHAR(255) NOT NULL,
            klient_haslo VARCHAR(255) NOT NULL
        )";
        mysqli_query($con, $zap);
        $zap2="SELECT COUNT(klient_ID) FROM klient";
        $wynik=mysqli_query($con, $zap2);
        $row=mysqli_fetch_array($wynik);
        echo $row['COUNT(klient_ID)'];
        
        if (isset($_POST['rej']))
        {
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
            $wiek=$_POST['wiek'];
            $email=$_POST['e-mail'];
            $haslo=$_POST['haslo'];
            
            $hash=password_hash($haslo, PASSWORD_DEFAULT);
            $zap3="INSERT INTO klient (klient_imie, klient_nazwisko, klient_wiek, klient_email, klient_haslo) VALUES ('$imie', '$nazwisko', '$wiek', '$email', '$hash')";
            mysqli_query($con, $zap3);
            
            mysqli_close($con);
        }
        
    ?>
</body>
</html>