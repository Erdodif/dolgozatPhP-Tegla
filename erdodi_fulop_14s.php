<?php
    $oldalA = $_POST["oldal_a"] ?? "";
    $oldalB = $_POST["oldal_b"] ?? "";
    $elkuldve = isset($_POST["kuldve"]);
    $hibaA = false;
    $hibaB = false;
    function hibauzenetKreator($oldal){
        if($oldal === ""){
            return "Meg kell adni az a oldalt!";
        }
        if (!is_numeric($oldal)){
            return "Az oldal hosszának számnak kell lennie!";
        }
        if ($oldal == 0){
            return "Az oldal hossza nem lehet nulla!";
        }
    }
    function vanhiba($oldal){
        if ($oldal === "" || !is_numeric($oldal) || $oldal == 0){
            return true;
        }
        return false;
    }
    function ki($uzenet){
        return htmlspecialchars($uzenet,ENT_QUOTES);
    }
    if ($elkuldve){
        $hibaA = vanhiba($oldalA);
        $hibaB = vanhiba($oldalB);
        if($hibaA){
            $uzenetA = hibauzenetKreator($oldalA);
        }
        if($hibaB){
            $uzenetB = hibauzenetKreator($oldalB);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Téglalapos számonkérés</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <div>
            <label>
                A téglalap egyik oldala: <br />
                <input type='text' name='oldal_a' value="<?ki($oldalA)?>">
            </label>
            <div class='hibauzenet'><?echo $hibaA?$uzenetA:"";?></div>
        </div>
        <div>
            <label>
                A téglalap másik oldala: <br />
                <input type='text' name='oldal_b' value="<?ki($oldalB)?>">
            </label>
            <div class='hibauzenet'><?echo $hibaB?$uzenetB:"";?></div>
        </div>
        <input type="submit" value="feldolgoz">
        <input name="kuldve" value="true" hidden>
    </form>
</body>
</html>
<!--
NEVEM: Erdődi Fülöp Gábriel
OSZTÁLYOM: 14S
1. feladatrész:
 - szerepel az űrlapban mindkét oldal bekérése 1 pont/1 pont
 - szerepel az oldalban submit gomb: 1 pont/1 pont
 - a submit felírata: "feldolgoz" 1 pont/1 pont
 - az űrlap POST metódussal küldi tovább a adatokat 1 pont/1 pont
 
2. feladatrész:
 - csak akkor fut le a kód, ha a formot elküldted 1 pont/1 pont
 - elkészültek a validációk  3 pont/x pont
 - hibaüzenet csak akkor jelenjen meg, ha ténylegesen is történt validációs hiba 1 pont/x pont
 - a "Sikeres" üzenet csak akkor jelenjen meg, ha nincs hiba. Ekkor a form ne jelenjen meg. 1 pont/x pont
 - sikertelen validáció esetén a form-ba töltsük vissza az adatokat 1 pont/x pont
 
3. feladatrész:
 - sikeres az eredmény kiíratása: 3 pont/x pont
 - helyesen számoltad a kerületet, területet: 1 pont/x pont
-->
