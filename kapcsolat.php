<?php
/*
    //szerver oldali ellenőrzés nem mukodik

    if(!isset($_POST['nev']) || strlen($_POST['nev']) < 5)
    {
        exit("Hibás név: ".$_POST['nev']);
    }

    $re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
    {
        exit("Hibás email: ".$_POST['email']);
    }

    if(!isset($_POST['szoveg']) || empty($_POST['szoveg']))
    {
        exit("Hibás szöveg: ".$_POST['szoveg']);
    }

    echo "Kapott értékek: ";
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

  
    /* feltoltes db

    
        try {
           
            $dbh = new PDO('mysql:host=localhost;dbname=db_kapcsolat', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
           
                $sqlInsert = "insert into uzenetek(id, nev, email, uzenet, datum)
                              values(0, :nev, :email, :uzenet, :datum)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'],
                                     ':uzenet' => $_POST['szoveg'],':datum' => date("Y.m.d")));
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "Az üzenet feltöltése sikeres.<br>Azonosítója: {$newid}";                     
                    $ujra = false;
                }
                else {
                    $uzenet = "Az üzenet feltöltése nem sikerült.";
                    $ujra = true;
                }
            }
        
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    

    echo "Küldött értékek: ";
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
 */
       
?>

