<!DOCTYPE html>
<?php session_start();
?>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        $dbuser = 'root';
        $dbpass = '';
        $db = new PDO("mysql:host=localhost;dbname=ten", $dbuser,$dbpass);
        $zap="CREATE TABLE IF NOT EXISTS Person (
            Person_ID INT PRIMARY KEY AUTO_INCREMENT,
            Person_firstname VARCHAR(255) NOT NULL,
            Person_secondname VARCHAR(255) NOT NULL
          )";

          $zap2="CREATE TABLE IF NOT EXISTS Cars (
            Cars_ID INT PRIMARY KEY AUTO_INCREMENT,
            Cars_model VARCHAR(255) NOT NULL,
            Cars_price FLOAT NOT NULL,
            Cars_day_of_buy DATETIME,
            Person_ID INT,
            FOREIGN KEY (Person_ID) REFERENCES Person(Person_ID)
          )";

        if ($db->query($zap) && $db->query($zap2)) {
                    
            printf("Databases crated succesfully.<br />");
            
        } else {
            printf("Could not create databases <br />", $db->error);
        }

        if (isset($_POST['edit_person_id']))
        {
        echo  '<form method="POST">
        <input type="text" name="imie" placeholder="First Name" value='.$_SESSION['imionko'].'><br>
        <input type="text" name="nazwisko" placeholder="Last Name" value='.$_SESSION['nazwiskoo'].'><br>
        <input type="submit" name="add" value="Add Person">
    </form>';
        }
        else
        {
          echo '<form method="POST">
          <input type="text" name="imie" placeholder="First Name"><br>
          <input type="text" name="nazwisko" placeholder="Last Name"><br>
          <input type="submit" name="add" value="Add Person">
      </form>';
        }
        
    ?>
  
    

    <?php
        if (isset($_POST['add'])) {
          $imie = $_POST['imie'];
          $nazwisko = $_POST['nazwisko'];
    
          
            $zap4 = "INSERT INTO Person (Person_firstname, Person_secondname) VALUES ('$imie', '$nazwisko')";
            $db->query($zap4);    
            var_dump($modelik);
        }    
            if (isset($_POST['edit_car_id']))
            {
              echo '<form method="POST">
              <input type="text" name="model" placeholder="Model" value='.$_SESSION['modelik'].' required><br>
              <input type="text" name="rok" placeholder="Year" value='.$_SESSION['roczek'].' pattern="[0-9]{4}" title="Please enter a valid 4-digit year" required><br>
              <select name="persons">';
              echo '<option value='.$_SESSION['osobka'].'>';
              echo '</select><br>
                <input type="submit" name="add2" value="Add Car">
              </form>';
            }
            else
            {
                echo '<form method="POST">
                <input type="text" name="model" placeholder="Model" required><br>
                <input type="text" name="rok" placeholder="Year" pattern="[0-9]{4}" title="Please enter a valid 4-digit year" required><br>
                <select name="persons">';
                $zap3 = "SELECT Person_ID, Person_firstname, Person_secondname FROM Person";
                $result = $db->query($zap3);

                if (!$result) {
                  throw new PDOException("Error fetching owners: " . $db->errorInfo()[2]);
                }

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='". $row['Person_ID']."'>".$row['Person_firstname']." ". $row['Person_secondname']."</option>";
                }
                echo '</select><br>
                <input type="submit" name="add2" value="Add Car">
              </form>';
            }
        
    ?>

    
  <?php
      if (isset($_POST['add2'])) {
        $model = $_POST['model'];
        $year = $_POST['rok'];
        $ownerId = $_POST['persons'];
  
          $zap5 = "INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_ID)
                            VALUES ('$model', '', NOW(), '$ownerId')";
  
          $db->query($zap5);
      }


  ?>
  
  <?php
        
        echo "<h2>Persons</h2>";
        echo '<form method="POST">
        <select name="sortp">
          <option value="Person_ID">Person_ID</option>
          <option value="Person_firstname">Person_firstname</option>
          <option value="Person_secondname">Person_lastname</option>
      </select>
      <input type="submit" value="sortuj" name="sortuj"><br>
      <input type="text" name="czego">
      <input type="submit" value="szukaj" name="szukaj">
      </form>';
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last name</th>";
        echo "<th>Action</th>";
        $sortp="Person_ID";
        if (isset($_POST['sortuj']))
        {
          $sortp=$_POST['sortp'];
        }
        
        $zap3 = "SELECT Person_ID, Person_firstname, Person_secondname FROM Person ORDER BY ".$sortp;
        if (isset($_POST['szukaj']))
        {
          $sortp=$_POST['sortp'];
          $czego=$_POST['czego'];
          $zap3 = "SELECT Person_ID, Person_firstname, Person_secondname FROM Person WHERE $sortp LIKE '$czego'";
        }
        $result = $db->query($zap3);
        if (!$result) {
          throw new PDOException("Error fetching owners: " . $db->errorInfo()[2]);
        }

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>".$row['Person_ID']."</td><td>".$row['Person_firstname']."</td><td>". $row['Person_secondname']."</td>";
          echo "<form method='POST'>";
          echo "<td><input type='hidden' name='delete_person_id' value='$row[Person_ID]'><input type='submit' value='usun' name='usun'>";
          echo "</form>";
          echo "<form method='POST'>";
          echo "<input type='hidden' name='edit_person_id' value='$row[Person_ID]'><input type='submit' value='edytuj'></td>";
          echo "</form>";
        }
        echo "<table>";

        
        echo "<h2>Cars</h2>";
        echo '<form method="POST">
        <select name="sortc">
          <option value="Cars_ID">Cars_ID</option>
          <option value="Cars_model">Cars_model</option>
          <option value="Cars_day_of_buy">Cars_day_of_buy</option>
          <option value="Person_ID">Person_ID</option>
      </select>
      <input type="submit" value="sortuj" name="sortujc"><br>
      <input type="text" name="czegoc">
      <input type="submit" value="szukaj" name="szukajc">
      </form>';
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Model</th>";
        echo "<th>Cars day of buy</th>";
        echo "<th>Person_ID</th>";
        echo "<th>Action</th>";
        $sortc="Cars_ID";
        if (isset($_POST['sortujc']))
        {
          $sortc=$_POST['sortc'];
        }
        
        $zap6 = "SELECT Cars_ID, Cars_model, Cars_day_of_buy, Person_ID FROM Cars ORDER BY ".$sortc;
        if (isset($_POST['szukajc']))
        {
          $sortc=$_POST['sortc'];
          $czegoc=$_POST['czegoc'];
          $zap6 = "SELECT Cars_ID, Cars_model, Cars_day_of_buy, Person_ID FROM Cars WHERE $sortc LIKE '$czegoc'";
        }
        $result2 = $db->query($zap6);
        if (!$result2) {
          throw new PDOException("Error fetching owners: " . $db->errorInfo()[2]);
        }

        while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>".$row2['Cars_ID']."</td><td>".$row2['Cars_model']."</td><td>". $row2['Cars_day_of_buy']."</td><td>".$row2['Person_ID']."</td>";
          echo "<form method='POST'>";
          echo "<td><input type='hidden' name='delete_car_id' value='$row2[Cars_ID]'><input type='submit' value='usun' name='usun'>";
          echo "</form>";
          echo "<form method='POST'>";
          echo "<input type='hidden' name='edit_car_id' value='$row2[Cars_ID]'><input type='submit' value='edytuj'></td>";
          echo "</form>";
        }
        echo "<table>";

        if (isset($_POST['delete_person_id']))
        {
          $PersonIdToDelete = (int)$_POST['delete_person_id'];
          $zap9="DELETE FROM Person WHERE Person_ID='$PersonIdToDelete'";
          $db->query($zap9);
          echo "usunieto";
        }

        if (isset($_POST['edit_person_id']))
        {
          $PersonIdToEdit = (int)$_POST['edit_person_id'];
          $zap10="SELECT Person_ID, Person_firstname, Person_secondname FROM Person WHERE Person_ID='$PersonIdToEdit'";
          $result4=$db->query($zap10);
          $row4 = $result4->fetch(PDO::FETCH_ASSOC);
          $_SESSION['imionko']=$row4['Person_firstname'];
          $_SESSION['nazwiskoo']=$row4['Person_secondname'];
          
        }

        if (isset($_POST['delete_car_id']))
        {
          $carIdToDelete = (int)$_POST['delete_car_id'];
          $zap7="DELETE FROM Cars WHERE Cars_ID='$carIdToDelete'";
          $db->query($zap7);
          echo "usunieto";
        }

        if (isset($_POST['edit_car_id']))
        {
          $carIdToEdit = (int)$_POST['edit_car_id'];
          $zap8="SELECT Cars_ID, Cars_model, Cars_day_of_buy, Person_ID FROM Cars WHERE Cars_ID='$carIdToEdit'";
          $result3=$db->query($zap8);
          $row3 = $result3->fetch(PDO::FETCH_ASSOC);
          $_SESSION['modelik']=$row3['Cars_model'];
          $_SESSION['roczek']=$row3['Cars_day_of_buy'];
          $_SESSION['osobka']=$row3['Person_ID'];
        }
  ?>
</body>
</html>    