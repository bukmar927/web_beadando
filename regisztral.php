<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        
        $dbh = new PDO('mysql:host=localhost;dbname=db_kapcsolat', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        
        $sqlSelect = "select id from felhasznalok where felhasznalonev = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
        }
        else {
           
            $sqlInsert = "insert into felhasznalok(id, vnev, knev, felhasznalonev, jelszo)
                          values(0, :vnev, :knev, :felhasznalonev, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':vnev' => $_POST['vezeteknev'], ':knev' => $_POST['utonev'],
                                 ':felhasznalonev' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo']))); 
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                $ujra = false;
                
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>
