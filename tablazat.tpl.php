 <?php
 try {
          
            $dbh = new PDO('mysql:host=localhost;dbname=db_kapcsolat', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        

            $result = $dbh->query("SELECT nev, email, uzenet, datum FROM uzenetek ORDER BY datum desc;")->fetchAll();
       
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      

?>

<h2>Beérkezett üzenetek</h2>
<table>
<tr>
<th>Küldő neve</th>
<th>Email címe</th>
<th>Üzenete</th>
<th>Küldés dátuma</th>
</tr>
<?php foreach ($result as $r) {
echo '<tr><td>' . $r['nev'] . "</td><td>" . $r['email'] . "</td><td>" . $r['uzenet'] . "</td><td>" . $r['datum'] . "</td></tr>";
} ?>
</table>