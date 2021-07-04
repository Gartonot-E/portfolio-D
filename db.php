<?
try {
    $db = new PDO('mysql:host=localhost;dbname=parasij3_rexol', 'parasij3_rexol', 'Qwerty123#');
} catch (PDOExeption $e) {
    print $e->getMEssage();
    die();
}