<?php

$titel = $_POST['titel'];
if (empty($titel)) {
    die("Titel is verplicht");
}
$beschrijving = $_POST['beschrijving'];
if (empty($beschrijving)) {
    die("Beschrijving is verplicht");
} 
$afdeling = $_POST['afdeling'];
if (empty($afdeling)) {
    die("Afdeling is verplicht");
}
echo $titel . " / " . $beschrijving . " / " . $afdeling;
require_once 'conn.php';

$query = "INSERT INTO taken (titel, beschrijving, afdeling)
VALUES(:titel, :beschrijving, :afdeling)";

$statement = $conn->prepare($query);

$statement->execute([
":titel" => $titel,
":beschrijving" => $beschrijving,
":afdeling" => $afdeling
]);
header("Location: ../index.php?msg=Melding aangepast");

