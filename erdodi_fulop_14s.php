<?php
    $oldalA = $_POST["oldal_a"] ?? "";
    $oldalB = $_POST["oldal_b"] ?? "";
    $elkuldve = isset($_POST["kuldve"]);
    $hibaA = false;
    $hibaB = false;
    $uzenetA = "";
    $uzenetB = "";
    $ki= "";
    if ($elkuldve){
        $ki = "k cs";
        if($oldalA === ""){
            $hibaA = true;
            $uzenetA .= "Meg kell adni az a oldalt!";
        } elseif (!is_numeric($oldalA)){
            $hibaA = true;
            $hibaA .= "Az oldal hosszának számnak kell lennie!";
        } elseif ($oldalA == 0){
            $hibaA = true;
            $hibaA .= "Az oldal hossza nem lehet nulla!";
        }
    }
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Téglalapos számonkérés</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <?php echo $ki?>
    <form method="POST">
        <div>
            <label>
                A téglalap egyik oldala: <br />
                <input type='text' name='oldal_a'>
            </label>
            <div class='hibauzenet'></div>
        </div>
        <div>
            <label>
                A téglalap másik oldala: <br />
                <input type='text' name='oldal_b'>
            </label>
            <div class='hibauzenet'></div>
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
